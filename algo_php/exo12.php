<?php
include 'exo.php';

$names = [
  "Michael" => "FRA",
  "Virgile" => "ESP",
  "Marie-Claire" => "ENG",
];

$words = [
  "FRA" => "Salut",
  "ESP" => "Hola",
  "ENG" => "Hello",
];

$r12 = "";
ksort($names);
foreach ($names as $name => $lang) {
  $r12 .= $words[$lang].' '.$name.'<br>';
}

echo exo_n(12, $r12);

?>
