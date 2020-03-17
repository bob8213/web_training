<?php
include 'exo.php';

$t = 'MON TEXTE EN PARAMETRE';
echo exo_n(1, '<span style="color: red">'.strtoupper($t).'</span>');

?>
