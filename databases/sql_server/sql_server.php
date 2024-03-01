<?php
//by Samuel Parente

//Variables
$server_name = 'DESKTOP-9EME76R\SQLEXPRESS';
$username = 'sa';
$password = 'sa123';
$db_name = 'mysql_db_test';
$table_name = 'table_test';

//Connect to server
echo '<h2><b>Connect to SQL Server</b></h2>';

$connection_info = array("UID" => $username, "PWD" => $password);
$connection = sqlsrv_connect($server_name, $connection_info);

//Verify connection
if(!$connection) {

    die('Failed to connect.');

}
else{
    
    echo '<p>Connected successfully.</p>';
    
}

//Verify if database exists. If not, create it.
echo '<h2><b>Create database</b></h2>';

//Query to check if it exists
$sql = "SELECT database_id FROM sys.databases WHERE name = '$db_name'";
$result = sqlsrv_query($connection, $sql);

if($result){

    if(sqlsrv_has_rows($result)){

        echo "<p>Database * $db_name * not created. Already exists.</p>";

    }
    else{

        //Query to create database
        $sql = 'CREATE DATABASE ' .$db_name;
        $result = sqlsrv_query($connection, $sql);

        if($result){

            echo "<p>Database * $db_name * created successfully.</p>";

        }
        else{

            echo "<p>Database * $db_name * not created.</p>";

        }

    }

}
else{

    echo "<p>Database * $db_name * not created.</p>";

}

//Select database where to create the table
$sql = "USE ". $db_name;
$result = sqlsrv_query($connection, $sql);

//Verify if table exists. If not, create it.
echo '<h2><b>Create table</b></h2>';

//Query to check if it exists
$sql = "SELECT * FROM sys.tables WHERE name = 'dbo.$table_name'";

$result = sqlsrv_query($connection, $sql);

if($result){

    if(sqlsrv_has_rows($result)){

        echo "<p>Table * $table_name * not created. Already exists.</p>";

    }
    else{

        //Query to create table
        $sql = "CREATE TABLE $table_name (
                                            id INT IDENTITY(1,1) PRIMARY KEY,
                                            firstname VARCHAR(30) NOT NULL,
                                            lastname VARCHAR(30) NOT NULL,
                                            email VARCHAR(50),
                                            reg_date DATETIME DEFAULT CURRENT_TIMESTAMP
                                            )";

        $result = sqlsrv_query($connection, $sql);

        if($result){

            echo "<p>Table * $table_name * created successfully.</p>";

        }
        else{

            echo "<p>Table * $table_name * not created. Error: " . "</p>";

            if( ($errors = sqlsrv_errors() ) != null) {

                foreach( $errors as $error ) {
                    
                    echo "message: ".$error[ 'message']."<br />";

                }
            }
        }

    }

}
else{

    echo "<p>Table * $table_name * not created.</p>";

}

//Insert some values in tha created table. I use prepared statements to prevent SQL injection (for example when reading forms)
echo '<h2><b>Insert new entry in the table</b></h2>';

$firstname = "Samuel";
$lastname = "Parente";
$email = "myemail@gmail.com";

$sql = "INSERT INTO dbo.$table_name (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
$result = sqlsrv_query($connection, $sql);

//Execute statement
if ($result) {
    
    echo "<p>New entry added successfully.</p>";

} else {

    echo "<p>Error adding new entry.</p>";
}

//Read data from the table
echo '<h2><b>Read data from the table</b></h2>';

$sql = "SELECT * FROM $table_name";
$result = sqlsrv_query($connection, $sql);

if ($result) {

    if(sqlsrv_has_rows($result)) {

        //Output data of each row
        echo "<table border='1'><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";
       
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td></tr>";
        
        }

        echo "</table>";
    } 
    else {

        echo "0 results";

    }
} 
else {

    echo "Error retrieving data.";

}

//Close connection
sqlsrv_close($connection);

?>
