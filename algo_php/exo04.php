<?php
include 'exo.php';

$s = "Engage le jeu que je le gagne";
$str = str_replace(" ", "", strtolower($s));
$str_rev = strrev($str);
$r = $str == $str_rev
  ? "est un palindrome"
  : "n'est pas un palindrome";

echo exo_n(4,
  "La phrase '".$s."' ".$r
);

?>
