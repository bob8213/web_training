<?php
include 'exo.php';

$grades = [
  10,
  12,
  8,
  19,
  3,
  16,
  11,
  13,
  9,
];

$mean = 0;
foreach ($grades as $grade) {
  $mean += $grade;
}
$mean /= count($grades);
$mean = number_format($mean, 2);

echo exo_n(13,
  'Les notes obtenues par l’élève sont : '.implode(', ', $grades).'<br>'.
  'Sa moyenne générale est donc de : '.$mean
);

?>
