<?php
include 'exo.php';

$brands = [
  "Peugeot",
  "Renault",
  "BMW",
  "Mercedes",
];

$text = "";
foreach ($brands as $brand) {
  $text .= "<li>".$brand."</li>";
}

echo exo_n(11,
  'Il y a '.count($brands).' marques de voitures dans le tableau :'.$text
);

?>
