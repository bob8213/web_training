<?php
include 'exo.php';

$array = [
  "Monsieur",
  "Madame",
  "Mademoiselle",
];

function displayRadios($array) {
  $boxes = '';
  foreach ($array as $item) {
    $low = strtolower($item);
    $boxes .= "
      <div>
        <input onclick='tick(this)' type='radio' id='$low'>
        <label for='$low'>$item</label>
      </div>
    ";
  }

  $boxes .= "
    <script type='text/javascript'>
      function tick(element) {
        var previous = document.getElementById('lastChecked');
        if (previous != null) {
          previous.id = '';
          previous.checked = false;
        }
        element.id = 'lastChecked';
      }
    </script>
  ";

  return $boxes;
}

echo exo_n(9, displayRadios($array));

?>
