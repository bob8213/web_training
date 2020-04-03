<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hangman</title>
  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/style.css">
</head>

<body onload="load()">

  <div id="load" onclick='play()'></div>

  <div id="wrapper">

    <template id="hangman">
      <div id="tries">
        <img id="tp{{id}}" class="tp" src="data/tp.png" alt="">
      </div>
      <div id="letters">
        <div class="letter"><div id="letter{{index}}">_</div></div>
      </div>
      <div id="letterButtons">
        <div class="letterButton" style="transform:rotate({{deg}}deg)">
          <a id="letterButton_{{letter}}" href="javascript:input('{{letter}}')">{{letter}}</a>
        </div>
      </div>
      <div id="sun3"><div id="sun2"><img id="sun1" src="data/sun.png" alt=""></div></div>
    </template>

  </div>

  <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
