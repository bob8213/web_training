<?php
include 'exo.php';

$s = "Notre formation DL commence aujourd'hui";
$content = "La phrase '".$s."' contient ";

echo exo_n(1, $content.strlen($s)." caractères.");

?>
