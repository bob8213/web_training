<?php
include 'exo.php';

$date1 = "2018-02-23";
setlocale(LC_TIME, 'fr_FR');
$date2 = ucfirst(utf8_encode(strftime("%A %d %B %G", strtotime($date1))));

echo exo_n(11, $date2);

?>
