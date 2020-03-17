<?php
include 'exo.php';

$s = "Notre formation DL commence aujourd'hui";
echo exo_n(3, str_replace("aujourd'hui", "demain", $s));

?>
