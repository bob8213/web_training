<?php
include 'exo.php';

class ElectricCar extends Car {
  private $autonomy;

  public function getAutonomy() { return $this->autonomy; }

  public function __construct($brand, $series, $doors, $autonomy) {
    parent::__construct($brand, $series, $doors);
    $this->autonomy = $autonomy;
  }

  public function __tostring() {
    return parent::__tostring().
    "Le véhicule a une autonomie de $this->autonomy heures.";
  }

}

$car1 = new Car("Peugeot", "408", 5);
$car2 = new ElectricCar("BMW", "i3", 5, 100);

echo exo_n(14, "
  $car1<br>
  $car2<br
");

?>
