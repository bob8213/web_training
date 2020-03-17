<?php
include 'exo.php';

$category = "Autre";
$age = 10;
if ($age >= 12) { $category = "Cadet"; }
elseif ($age >= 10 && $age <= 11) { $category = "Minime"; }
elseif ($age >= 8 && $age <= 9) { $category = "Pupille"; }
elseif ($age >= 6 && $age <= 7) { $category = "Poussin"; }

echo exo_n(7,
  "L’enfant qui a ".$age." ans appartient à la catégorie '".$category."'"
);

?>
