<?php

function gallery($rows) {
  //Since there's no actual database.
  include dirname(__FILE__).'/db.php';

  $imgElements = "";
  for ($i=0; $i < $rows * 4; $i++) {
    $imgElements .= "<img src='$imgs[$i]' alt='' class='thumbnail'>";
  }

  $gallery = "
  <section id='gallery' class='chunk'>
    <div id='thumbnails'>
      $imgElements
    </div>
    <div id='thumbnails-nav'>
      <span class=''>
        <a href='#' class='gallery-link caps selected'>ALL</a>
        <a href='#' class='gallery-link caps'>AUDIO</a>
        <a href='#' class='gallery-link caps'>IMAGE</a>
        <a href='#' class='gallery-link caps'>VIDEO</a>
      </span>
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
