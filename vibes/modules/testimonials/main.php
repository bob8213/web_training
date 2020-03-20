<?php

function testimonials($count) {
  //Since there's no actual database.
  include 'modules/testimonials/db.php';

  $testimonials = '
  <section id="testimonials" class="chunk">
    <h1 class="underlined caps center">CLIENT TESTIMONIALS</h1>
    <div class="underline center"></div>
  ';

  $left = true;
  for ($i=0; $i < $count; $i++) {
    $testimonials .= "
      <div class='testimonial'>
        <div class='".($left ? "left" : "right")."'>
          <img src='$imgs[$i]' alt=''>
          <p>$texts[$i]</p>
          $names[$i]
        </div>
      </div>
    ";

    $left = !$left;
  }

  $testimonials .= "</section>";

  $testimonials .= '
    <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="modules/testimonials/style.css">
  ';

  return $testimonials;
}

?>
