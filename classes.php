<?php
//by Samuel Parente

//Classes
echo '<h2><b>Classes and objects</b></h2>';

class car{

    //Properties
    public $brand;
    public $color;
    public $price;

    //Methods
    function set_brand($brand){

        $this -> brand = $brand;

    }

    function get_brand(){

        return $this -> brand;

    }

    function set_color($color){

        $this -> color = $color;
        
    }

    function get_color(){

        return $this -> color;

    }

    function set_price($price){

        $this -> price = $price;
        
    }

    function get_price(){

        return $this -> price;

    }

}

//Create an object - car
$ferrari = new car();
$ferrari -> set_brand('ferrari');
$ferrari -> set_color('red');
$ferrari -> set_price('250K');

//Show the attributes of the created car
echo '<p>Brand of the car: ' . $ferrari -> get_brand() . '</p>';
echo '<p>Color of the car: ' . $ferrari -> get_color() . '</p>';
echo '<p>Price of the car: ' . $ferrari -> get_price() . '</p>';

?>