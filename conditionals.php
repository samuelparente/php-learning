<?php
//by Samuel Parente

$a = 8;
$b = 13;
$c = 25;
$d = 36;

//Print variables
echo "<h2><b>" . "a:$a, " . "b:$b, " . "c:$c, " . "d:$d" . "</b></h2>";

//a bigger than b?
echo "<h2><b>Is a bigger than b?</b></h2>";

if($a > $b) {

    echo 'yes, a is bigger than b.';
}
else{

    echo 'no, b is bigger than a.';

}

//d bigger than a?
echo "<h2><b>Is d bigger than a?</b></h2>";

if($d > $a) {

    echo 'yes, d is bigger than a.';
}
else{

    echo 'no, a is bigger than d.';

}

//c bigger than b and lower than d?
echo "<h2><b>Is c bigger than b and lower than d?</b></h2>";

if($c > $b && $c < $d) {

    echo 'yes, c is bigger than b and lower than d.';
}
else{

    echo 'no, c is not bigger than b and lower than d at the same time.';

}

//d lower than a?
echo "<h2><b>Is d lower than a?</b></h2>";

if($d < $a) {

    echo 'yes, d is lower than a.';
}
else{

    echo 'no, a is lower than d.';

}

?>