<?php

function accordion() {
  //Since there's no actual database.
  include 'modules/accordion/db.php';

  $accordion = "";

  foreach ($sections as $title => $text) {
    $accordion .= "
      <button class='accordion'>$title</button>
      <div class='panel'>
        <p>$text</p>
      </div>
    ";
  }

  $accordion .= '
    <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="modules/accordion/style.css">
    <script type="text/javascript" src="modules/accordion/script.js"></script>
  ';

  return $accordion;
}

?>
