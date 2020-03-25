<<?php

function exo_n($i, $content) {
  $r =
    '<p>
      <strong>'.'Exo '.$i.':</strong><br>'.$content.
    '</p>'
    ;
  return $r;
}

//Exo 5, 10
function displayFields(...$inputs) {
  $f = '';
  foreach ($inputs as $input) {
    $low = strtolower($input);
    $f .= '<form>
      <label for="'.$low.'">'.$input.'</label>
      <input type="text" value="'.$low.'"></input>
    </form>';
  }
  return $f;
}

//Exo 6, 10
function displayList($array) {
  $list = '<select>';
  foreach ($array as $item) {
    $list .= '<option value="'.strtolower($item).'">'.$item.'</option>';
  }
  return $list.'</select>';
}

//Exo 13, 14
class Car {
  private $brand;
  private $series;
  private $doors;

  private $speed = 0;
  private $start;

  public function getBrand() { return $this->brand; }
  public function getName() { return $this->series; }
  public function getDoors() { return $this->doors; }
  public function getSpeed() { return $this->speed; }

  public function __construct($brand, $series, $doors) {
    $this->brand = $brand;
    $this->series = $series;
    $this->doors = $doors;
  }

  public function __tostring() {
    $state = $this->start ? "démarré" : "à l'arret";
    return "
      Nom et modèle du véhicule : $this->brand $this->series<br>
      Nombre de portes : $this->doors<br>
      Le véhicule $this->brand est $state.<br>
      Sa vitesse actuelle est de $this->speed km / h<br>
    ";
  }

  public function start() {
    $this->start = true;
    echo "Le véhicule $this->brand $this->series démarre.<br>";
  }

  public function stop() {
    $this->start = false;
    $this->speed = 0;
    echo "Le véhicule $this->brand $this->series est stoppé.<br>";
  }

  public function accelerate($a) {
    echo "Le véhicule $this->brand $this->series veut accélérer de $a km / h.<br>";
    if(!$this->start) {
      echo "Pour accélérer, il faut démarrer le véhicule $this->brand $this->series !<br>";
      return;
    }
    $this->speed += $a;
    echo "Le véhicule $this->brand $this->series accélère de $a km / h.<br>";
  }

  public function decelerate($a) {
    echo "Le véhicule $this->brand $this->series veut ralentir de $a km / h.<br>";
    if(!$this->start) {
      echo "Pour ralentir, il faut démarrer le véhicule $this->brand $this->series !<br>";
      return;
    }
    $this->speed -= $a;
    if ($this->speed < 0) $this->speed = 0;
    echo "Le véhicule $this->brand $this->series ralenti de $a km / h.<br>";
  }

}

?>
