<?php
//by Samuel Parente
 
//Unidimensional array
echo '<h2><b>Unidimensional array</b></h2>';

$cars = array('porsche','bugatti','ferrari','lamborghini','pagani');

foreach ($cars as $temp){

    echo '<h3>' . $temp . '</h3>';

}

//Multidimensional array
echo '<h2><b>Multidimensional array</b></h2>';

$cars = array(
    array('porsche',12,'250K'),
    array('bugatti',4,'5.5M'),
    array('ferrari',10,'380K'),
    array('lamborghini',2,'1.1M'),
    array('pagani',7,'830K')
);

for ($i = 0; $i < sizeof($cars); $i++){

    echo '<p>Brand: ' . $cars[$i][0] . ' | Stock: ' . $cars[$i][1] . ' | Price:' . $cars[$i][2] . '</p>';

}

?>