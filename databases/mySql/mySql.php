<?php
//by Samuel Parente

//Variables
$server_name = 'localhost';
$username = 'root';
$password = '';
$db_name = 'mysql_db_test';
$table_name = 'table_test';

//Connect to server
echo '<h2><b>Connect to MySql</b></h2>';

$connection = new mysqli($server_name,$username,$password);

//Verify connection
if($connection -> connect_error){

    die('Failed to connect ' . $connection -> connect_error);
}
else{

    echo '<p>Connected successfully.</p>';
    echo '<p>Server info: ' . $connection->server_info . '</p>';
    echo '<p>Host info: ' . $connection->host_info . '</p>';
    echo '<p>Protocol version: ' . $connection->protocol_version . '</p>';

}

//Verify if database exists. If not, create it.
echo '<h2><b>Create database</b></h2>';

//Query to check if it exists
$my_sql = "SHOW DATABASES LIKE '". $db_name . "'";
$result = $connection -> query($my_sql);

if($result){

    if($result -> num_rows > 0){

        echo "<p>Database * $db_name * not created. Already exists.</p>";

    }
    else{

        //Query to create database
        $my_sql = 'CREATE DATABASE ' .$db_name;
        $result = $connection -> query($my_sql);

        if($result){

            echo "<p>Database * $db_name * created successfully.</p>";

        }
        else{

            echo "<p>Database * $db_name * not created. Error: " . $connection -> error . "</p>";

        }
        
    }
    
}
else{

    echo "<p>Database * $db_name * not created. Error: " . $connection -> error . "</p>";

}

//Select database where to create the table
$my_sql = "USE ". $db_name;
$result = $connection -> query($my_sql);

//Verify if table exists. If not, create it.
echo '<h2><b>Create table</b></h2>';

//Query to check if it exists
$my_sql = "SHOW TABLES FROM $db_name LIKE '". $table_name . "'";
$result = $connection -> query($my_sql);

if($result){

    if($result -> num_rows > 0){

        echo "<p>Table * $table_name * not created. Already exists.</p>";

    }
    else{

        //Query to create table
        $my_sql = "CREATE TABLE $table_name (
                                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                            firstname VARCHAR(30) NOT NULL,
                                            lastname VARCHAR(30) NOT NULL,
                                            email VARCHAR(50),
                                            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                            )";

        $result = $connection -> query($my_sql);
        
        if($result){

            echo "<p>Table * $table_name * created successfully.</p>";

        }
        else{

            echo "<p>Table * $table_name * not created. Error: " . $connection -> error . "</p>";
            
        }

    }
    
}
else{

    echo "<p>Table * $table_name * not created. Error: " . $connection -> error . "</p>";

}

//Insert some values in tha created table. I use prepared statements to prevent SQL injection (for example when reading forms)
echo '<h2><b>Insert new entry in the table</b></h2>';
$stmt = $connection->prepare("INSERT INTO $table_name (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

$firstname = "Samuel";
$lastname = "Parente";
$email = "myemail@gmail.com";

//Execute statement
if ($stmt->execute() === TRUE) {
    
    echo "<p>New entry added successfully.</p>";

} else {

    echo "<p>Error adding new entry: " . $stmt->error . "</p>";
}

//Read data from the table
echo '<h2><b>Read data from the table</b></h2>';

$my_sql = "SELECT * FROM $table_name";
$result = $connection -> query($my_sql);

if ($result->num_rows > 0) {

    // Output data of each row
    echo "<table border='1'><tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";
   
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td></tr>";
    }

    echo "</table>";

} 
else {

    echo "0 results";

}

//Close statement
$stmt -> close();

//Close connection
$connection -> close();

?>