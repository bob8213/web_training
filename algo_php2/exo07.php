<?php
include 'exo.php';

$array = [
  "Choix 1" => false,
  "Choix 2" => true,
  "Choix 3" => false,
];

function displayCheckBoxes($array) {
  $boxes = '';
  foreach ($array as $key => $value) {
    $low = strtolower($key);
    $boxes .= "<div><input type='checkbox' id='$low'";
    $boxes .= $value ? 'checked>' : '>';
    $boxes .= "<label for='$low'>$key</label></div>";
  }
  return $boxes;
}

echo exo_n(7, displayCheckBoxes($array));

?>
