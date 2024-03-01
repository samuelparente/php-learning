<?php
//by Samuel Parente
 
//FOR loop
echo '<h2><b>FOR loop</b></h2>';

for ($counter = 0; $counter < 10; $counter++){

    echo '<p>Line: ' . $counter . '</p>';

}

//WHILE loop
echo '<h2><b>WHILE loop</b></h2>';

$counter = 10;
while ($counter < 20){

    echo '<p>Line: ' . $counter . '</p>';
    $counter++;
}

//DO WHILE loop
echo '<h2><b>DO WHILE loop</b></h2>';

$counter = 20;
do {

    echo '<p>Line: ' . $counter . '</p>';
    $counter++;
}
while ($counter < 30);

//FOR EACH loop
echo '<h2><b>FOR EACH loop</b></h2>';

$numbers_strings = array('one','two','three','four','five');

foreach ($numbers_strings as $temp){

    echo '<p>Line ' . $temp . '</p>';

}

?>