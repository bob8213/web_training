<?php
include 'exo.php';

function mul_table_a($n) {
  $ra = 'A). Table de '.$n.' :';
  for ($i = 1; $i <= 10; $i++) {
    $r = $i * $n;
    $ra = $ra.'<br>'.$i.' x '.$n.' = '.$r;
  }
  return $ra;
}

function mul_table_b($n) {
  $rb = 'B). Table de '.$n.' :';
  $i = 1;
  while ($i <= 10) {
    $r = $i * $n;
    $rb = $rb.'<br>'.$i.' x '.$n.' = '.$r;
    $i++;
  }
  return $rb;
}

echo exo_n(8,
  mul_table_a(8).'<br>'.
  mul_table_b(8)
);

?>
