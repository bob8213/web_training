<?php
include 'exo.php';

$url = 'http://my.mobirise.com/data/userpic/764.jpg';

function repeatImg($url, $n) {
  $img = base64_encode(file_get_contents($url));
  return str_repeat("<img src='data:image/jpeg;base64,$img'>", $n);
}

echo exo_n(8, repeatImg($url, 4));

?>
