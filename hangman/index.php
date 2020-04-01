<?php
// require_once "db.php";
// require_once "game.php";
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My HTML Page</title>
  <link rel="stylesheet" type="text/css" title="Cool stylesheet" href="css/style.css">
</head>

<body onload="load()">
  <div id="wrapper">

    <div id="hangman"></div>

  </div>

  <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
