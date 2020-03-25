<?php

function testimonials($count) {
  //Since there's no actual database.
  include dirname(__FILE__).'/db.php';

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
          <div>
            <p>$texts[$i]</p>
            <strong>$names[$i]</strong>
          </div>
        </div>
      </div>
    ";

    $left = !$left;
  }

  $testimonials .= "</section>";

  return $testimonials;
}

?>
