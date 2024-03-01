<?php
//by Samuel Parente
 
//Open and read file
$file = 'data.json';

$data = fopen ($file,'r') or die ('Error opening the file.');

$decoded_json = json_decode( fread ($data,filesize($file)) , true);

echo "<h2><b>Read Json from file</b></h2>";

foreach ($decoded_json as $item){

    echo "Nome: " . $item['nome'] . "<br>";
    echo "Idade: " . $item['idade'] . "<br>";
    echo "Altura: " . $item['altura'] . "<br>";
    echo "Peso: " . $item['peso'] . "<br>";
    echo "<br>";

}

fclose ($data);

?>