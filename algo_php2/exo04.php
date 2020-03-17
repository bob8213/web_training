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
    $wiki = "https://fr.wikipedia.org/wiki/$capitale";

    $rows .= '<tr>'.
      '<td>'.strtoupper($capitale).'</td>'.
      "<td>$city</td>".
      "<td><a href='$wiki'>$wiki</a></td>".
    '</tr>';
  }

  $disp = '
  <table border="1">
    <thead>
      <tr>
        <th>Capitale</th>
        <th>City</th>
        <th>Wiki</th>
      </tr>
    </thead>
    <tbody>'.
      $rows.
    '</tbody>
  </table>';

  return $disp;
}

echo exo_n(4, displayTable($capitales));

?>
