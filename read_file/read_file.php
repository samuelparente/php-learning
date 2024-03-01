<?php
//by Samuel Parente
 
//Open and read file
$file = 'data.txt';

$data = fopen ($file,'r') or die ('Error opening the file.');

echo fread ($data,filesize($file));

fclose ($data);

?>