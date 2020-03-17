<?php
include 'exo.php';

$array = [
  true,
  "texte",
  10,
  25.369,
  array("valeur1","valeur2")
];

echo exo_n(12, "");
foreach ($array as $item) {
  var_dump($item);
  echo "<br>";
}

?>
