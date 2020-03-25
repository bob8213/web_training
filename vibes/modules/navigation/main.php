<?php

function navigation() {
  //Since there's no actual database.
  include dirname(__FILE__).'/db.php';

  $navigation = "<nav>
    <img src='$logo' alt='' id='logo'>
    <span>
    ";

  for ($i=0; $i < count($nav); $i++) {
    $navigation .= "<a href='#$links[$i]' class='nav-link caps'>$nav[$i]</a>";
  }

  $navigation .= "
    </span>
  </nav>";

  $navigation .= '
    <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="modules/navigation/style.css">
  ';

  return $navigation;
}

?>
