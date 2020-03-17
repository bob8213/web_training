<?php
include 'exo.php';

$francs = 20;
$euros = 20 * .1524;
$f_f = number_format($francs, 2, ',', ' ');
$f_e = number_format($euros, 2, ',', ' ');

echo exo_n(5,
  "Montant en francs : ".$f_f.'<br>'.
  $f_f." francs = ".$f_e." €"
);

?>
