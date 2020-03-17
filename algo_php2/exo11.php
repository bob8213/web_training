<?php
include 'exo.php';

$date1 = "2018-02-23";
$date2 = date("l d M Y", strtotime($date1));

echo exo_n(11, $date2);

?>
