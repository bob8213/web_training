<?php
include 'exo.php';

$array = [
  "Monsieur",
  "Madame",
  "Mademoiselle",
];

function displayCheckBoxes($array) {
  $boxes = '';
  foreach ($array as $item) {
    $low = strtolower($item);
    $boxes .= '<div><input type="radio" id="'.$low.'">';
    $boxes .= '<label for="'.$low.'">'.$item.'</label></div>';
  }
  return $boxes;
}

echo exo_n(9, displayCheckBoxes($array));

?>
