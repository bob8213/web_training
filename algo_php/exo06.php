<?php
include 'exo.php';

$price = 9.99;
$quantity = 5;
$vat = .2;
$total = $price * $quantity;
$total *= 1 + $vat;

echo exo_n(6,
'Prix unitaire de l’article : '.$price.' €<br>'.
'Quantité : '.$quantity.'<br>'.
'Taux de TVA : '.$vat.'<br>'.
'Le montant de la facture à régler est de : '.$total.' €'
);

?>
