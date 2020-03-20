<?php

function navigation() {
  //Since there's no actual database.
  include 'modules/navigation/db.php';

  $navigation = "<nav>
    <img src='$logo' alt='' id='logo'>
    <span>
    ";

  foreach ($nav as $link) $navigation .= "<a href='#' class='nav-link caps'>$link</a>";

  $navigation .= "
    </span>
  </nav>";

  $navigation .= '
    <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="modules/navigation/style.css">
  ';

  return $navigation;
}

?>
