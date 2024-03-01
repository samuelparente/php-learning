<?php
//by Samuel Parente

$string1 = 'SAMUEL';
$string2 = 'FILIPE';
$string3 = 'DA';
$string4 = 'SILVA';
$string5 = 'PARENTE';

//CONCATENATE strings
echo '<h2><b>CONCATENATE strings</b></h2>';
$string_full = '<p>' . $string1 . ' ' . $string2 . ' ' . $string3 . ' ' . $string4 . ' ' . $string5 . '</p>';
echo $string_full;

//String length
echo '<h2><b>LENGTH of the string</b></h2>';
echo '<p>String length is:' . strlen($string_full) . '</p>';

//String in LOWERCASE
echo '<h2><b>LOWERCASE</b></h2>';
echo strtolower($string_full);

//String EXPLODE
echo '<h2><b>String EXPLODE</b></h2>';
$string_exploded = explode(' ',$string_full);
print_r($string_exploded);
?>