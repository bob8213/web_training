<?php
include 'exo.php';

$age = 32;
$sex = 'F';
$imposable =
  ($age >= 20 && $sex == 'M') || ($age >= 18 && $age <= 35 && $sex == 'F')
    ? "imposable"
    : "non imposable";

echo exo_n(9,
  'Age : '.$age.'<br>'.
  'Sexe : '.$sex.'<br>'.
  'La personne est '.$imposable.'.'
);

?>
