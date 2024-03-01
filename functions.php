<?php
//by Samuel Parente
 

//FUNCTIONS: Arguments:none, Returns: none
echo '<h2><b>FUNCTIONS: Arguments:none, Returns: none</b></h2>';
echo '<p>a:37, b:62</p>';

function addNumbers(){

    $a = 37;
    $b = 62;

    $result = $a + $b;
    echo 'a + b = ' . $result;

}

addNumbers();

//FUNCTIONS: Arguments:variables to sum, Returns: none
echo '<h2><b>FUNCTIONS: Arguments:variables to sum, Returns: none</b></h2>';
echo '<p>a:112.4, b:41.39</p>';

function addNumbers2($a,$b){

    $result = $a + $b;
    echo 'a + b = ' . $result;

}

$a = 112.4;
$b = 41.39;

addNumbers2($a,$b);

//FUNCTIONS: Arguments:variables to sum, Returns: sum of the two variables
echo '<h2><b>FUNCTIONS: Arguments:variables to sum, Returns: sum of the two variables</b></h2>';
echo '<p>a:7541.854, b:9856.1325</p>';

function addNumbers3($a,$b){

    $result = $a + $b;
    return $result;

}

$a = 7541.854;
$b = 9856.1325;

$result = addNumbers3($a,$b);
echo 'a + b = ' . $result;

?>