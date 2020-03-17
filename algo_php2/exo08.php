<?php
include 'exo.php';

$url = 'http://my.mobirise.com/data/userpic/764.jpg';

function repeatImg($url, $n) {
  $img = base64_encode(file_get_contents($url));
  $repeat = "";
  for ($i=0; $i < $n; $i++) {
    $repeat .= "<img src='data:image/jpeg;base64,$img'>";
  }
  return $repeat;
}

echo exo_n(8, repeatImg($url, 4));

?>
