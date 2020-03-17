<?php
include 'exo.php';

$mail1 = "elan@elan-formation.fr";
$mail2 = "contact@elan";

function validateEmail($mail) {
  $r = filter_var($mail, FILTER_VALIDATE_EMAIL)
    ? "est une adresse e-mail valide<br>"
    : "n' est pas une adresse e-mail valide<br>";
  return "L’adresse $mail $r";
}

$r1 = "L’adresse $mail1 est une adresse e-mail valide";

echo exo_n(15, validateEmail($mail1).validateEmail($mail2));

?>
