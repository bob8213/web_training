<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vibes</title>
  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/style.css">

  <?php include 'modules.php' ?>
</head>

<body>
<div id="wrapper">

  <header id="main-header">
    <?php echo navigation(); ?>
  </header>

<main>
  <section class="banner">
    <h1 class="caps">HTML TEMPLATE FOR CREATIVE FOLKS AND DESIGN AGENCIES</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem coronavirus ullam officia esse perspiciatis dolorem repudiandae.
    </p>
    <a href="#" class="border-button-inv caps">READ MORE</a>
  </section>

  <section id="description" class="chunk">
    <article class="split3">
      <h2>Why choose us?</h2>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis quisquam voluptatibus sequi saepe ipsam
      <div class="text-s">
        Neque nisi maiores excepturi ad omnis, asperiores. Numquam quae autem et tempore fuga doloremque laudantium aspernatur?
      </div>
    </article>

    <article class="split3">
      <h2>What you get?</h2>
      <div class="img-title-text">
        <img src="images/todo.png" alt="">
        <h3 class="caps">COLORFUL & COMPACT</h3>
        Je ne sais plus ce que je dois écrire
      </div>
      <div class="img-title-text">
        <img src="images/todo.png" alt="">
        <h3 class="caps">RAPIDE & PAS CHER</h3>
        Je ne sais plus ce que je dois écrire
      </div>
      <div class="img-title-text">
        <img src="images/todo.png" alt="">
        <h3 class="caps">BEAVIS & BUTTHEAD</h3>
        Je ne sais plus ce que je dois écrire
      </div>
    </article>

    <article class="split3">
      <?php
        echo accordion();
      ?>
    </article>
  </section>

  <section id="gallery" class="chunk">
    <div id="thumbnails">
      <img src="images/todo.png" alt="" class="thumbnail">
      <img src="images/todo.png" alt="" class="thumbnail">
      <img src="images/todo.png" alt="" class="thumbnail">
      <img src="images/todo.png" alt="" class="thumbnail">
      <img src="images/todo.png" alt="" class="thumbnail">
      <img src="images/todo.png" alt="" class="thumbnail">
      <img src="images/todo.png" alt="" class="thumbnail">
      <img src="images/todo.png" alt="" class="thumbnail">
    </div>
    <div id="thumbnails-nav">
      <span class="">
        <a href="#" class="nav-link small caps selected">ALL</a>
        <a href="#" class="nav-link small caps">AUDIO</a>
        <a href="#" class="nav-link small caps">IMAGE</a>
        <a href="#" class="nav-link small caps">VIDEO</a>
      </span>
      <a href="#" class="border-button caps">LOAD MORE</a>
    </div>
  </section>

  <?php echo testimonials(3); ?>

  <section class="banner">
    <h1 class="caps">NEW HORIZONS AWAIT</h1>
    <div class="underline center"></div>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem coronavirus ullam officia esse perspiciatis dolorem repudiandae.
    </p>
    <a href="#" class="border-button-inv caps">BUY VIBES THEME</a>
  </section>

  <section id="contact" class="chunk">
    <h1 class="caps center">GET IN TOUCH</h1>
    <div class="underline center"></div>
    <form id="contact-form" action="index.html" method="post">
      <div id="contact-info">
        <label for="name" class="caps">your name <span class="colored">*</span></label>
        <input type="text" name="name" value="">
        <label for="name" class="caps">your email <span class="colored">*</span></label>
        <input type="text" name="email" value="">
        <label for="name" class="caps">your phone</label>
        <input type="text" name="phone" value="">
      </div>

      <div id="contact-message">
        <label for="name" class="caps">subject</label>
        <input type="text" name="subject" value="">
        <label for="name" class="caps">message <span class="colored">*</span></label>
        <input type="text" name="message" value="">
      </div>
    </form>
  </section>

</main>

<footer>

  <section id="about" class="chunk">
    <div class="split3">
      <h2 class="caps">ABOUT VIBES</h2>
      <div class="underline"></div>
      <p>
        VIBES is an ideal theme for creative folks or design agencies. Ease of use and top-notch web design techniques are wrapped with several gorgeous color schemes.
      </p>
      <p>
        You can buy this responsive WordPress theme on ThemeForest.
      </p>
    </div>

    <div class="split3">
      <h2 class="caps">NEWSLETTER</h2>
      <div class="underline"></div>
      <p>
        VIBES contains fully working MailChimp subscribe form.
      </p>
      <input type="text" name="email" value="Your Email Adress">
      <a href="#" class="border-button-inv caps">SUBSCRIBE</a>
    </div>

    <div class="split3">
      <h2 class="caps">TWITTER FEED</h2>
      <div class="underline"></div>
    </div>
  </section>

</footer>

</div>
</body>

</html>
