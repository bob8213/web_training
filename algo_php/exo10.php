<?php
include 'exo.php';

$price = 152;
$paid = 200;
$owed = $paid - $price;

$r = $owed;
$o_10_n = intdiv($r, 10);
$r -= 10 * $o_10_n;
$o_5_n = intdiv($r, 5);
$r -= 5 * $o_5_n;
$o_2_n = intdiv($r, 2);
$r -= 2 * $o_2_n;
$o_1_n = intdiv($r, 1);
$r -= 1 * $o_1_n;

echo exo_n(10,
  'Montant à payer : '.$price.' €<br>'.
  'Montant versé : '.$paid.' €<br>'.
  'Reste à payer : '.$owed.' €<br>'.
  '***************************************************<br>'.
  'Rendue de monnaie :<br>'.
  $o_10_n.'billets de 10 € - '.
  $o_5_n.'billet de 5 € - '.
  $o_2_n.'pièce de 2 € - '.
  $o_1_n.'1 pièce de 1 €'
);

?>
