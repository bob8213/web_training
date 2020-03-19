<?php

function testimonials($count) {
  // 'Database'
  $imgs = [
    "images/todo.png",
    "images/todo.png",
    "images/todo.png",
    "images/todo.png",
  ];

  $texts = [
    "Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced. Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced.",
    "Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced. Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced.",
    "Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced. Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced.",
    "Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced. Words can be like X-rays, if you use them properly—they’ll go through anything. You read and you’re pierced.",
  ];

  $names = [
    "Aldous Huxley, Brave New World",
    "Aldous Huxley, Brave New World",
    "Aldous Huxley, Brave New World",
    "Jean Nafficheplus",
  ];
  // =====================================

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

  return $testimonials.
  '<style type="text/css">
    .testimonial {
      padding: 30px 0 30px 0;
    }

    .testimonial img {
      max-width: 60px;
    }

    .left , .right {
      display: flex;
    }

    .right {
      flex-direction: row-reverse;
    }
  </style>';
}

?>
