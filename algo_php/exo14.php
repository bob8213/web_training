<?php
include 'exo.php';

$dob = new DateTime('17.01.1985');
$now = new Datetime('NOW');
$diff = $now->diff($dob);

echo exo_n(14,
  'Age de la personne : '.$diff->y.' ans '.$diff->m.' mois '.$diff->d.' jours'
);

?>
