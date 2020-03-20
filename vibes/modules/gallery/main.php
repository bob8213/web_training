<?php

function gallery($rows) {
  //Since there's no actual database.
  include dirname(__FILE__).'/db.php';

  $imgElements = "";
  for ($i=0; $i < $rows * 4; $i++) {
    $color = 'color'.(random_int(0, 3));
    $imgElements .= "<img src='$imgs[$i]' alt='' class='thumbnail img-border $color'>";
  }

  $gallery = "
  <section id='gallery' class='banner'>
    <div id='thumbnails'>
      $imgElements
    </div>
    <div id='thumbnails-nav'>
      <a href='#' class='border-button caps'>LOAD MORE</a>
    </div>
  </section>
  ";

  $gallery .= '
    <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="modules/gallery/style.css">
  ';

  return $gallery;
}

?>
