<?php
include 'exo.php';

$capitales = [
  "France"=>"Paris",
  "Allemagne"=>"Berlin",
  "USA"=>"Washington",
  "Italie"=>"Rome",
];

function displayTable($capitales) {
  $rows = "";

  ksort($capitales);
  foreach ($capitales as $capitale => $city) {
    $rows .= '<tr>'.
      '<td>'.strtoupper($capitale).'</td>'.
      '<td>'.$city.'</td>'.
    '</tr>';
  }

  $disp = '
  <table border="1">
    <thead>
      <tr>
        <th>Capitale</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>'.
      $rows.
    '</tbody>
  </table>';

  return $disp;
}

echo exo_n(2, displayTable($capitales));

?>
