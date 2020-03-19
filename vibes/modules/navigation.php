<?php

function navigation($logo, ...$nav) {
  $navigation = "<nav>
    <img src='$logo' alt='' id='logo'>
    <span>
    ";

  foreach ($nav as $link) $navigation .= "<a href='#' class='nav-link caps'>$link</a>";

  $navigation .= "
    </span>
  </nav>";

  return $navigation;
}

?>
