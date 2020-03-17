<?php
include 'exo.php';

echo exo_n(13, '');
$car = new Car("Peugeot", "408", 5);
$car->accelerate(50);
$car->start();
$car->accelerate(50);
$car->stop();
echo "<br>$car";

?>
