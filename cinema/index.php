<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema</title>
</head>

<body>

<?php

require_once 'actor.php';
require_once 'director.php';
require_once 'film.php';
require_once 'genre.php';
require_once 'role.php';
require_once 'film_abstract.php';
require_once 'film_worker_abstract.php';

$actors = [
  new Actor("John", "Kevin", "12-03-1969"),
  new Actor("Arthur", "Tutur", "12-03-1969"),
  new Actor("Silvie", "Vivi", "12-03-1969"),
  new Actor("Martin", "Tintin", "12-03-1969"),
];

$directors = [
   new Director("Alphonse", "Blbl", "12-03-1969"),
   new Director("Tristan", "hmhmhm", "21-04-854"),
];

$genres = [
  new Genre("Genre1"),
  new Genre("Genre2"),
];

$films = [
  new Film(
    "Film1", "02-05-2018", "01:20", $genres[0], "blbbblb",
    [
      $actors[0],
      $actors[2],
      $actors[3],
    ],
    $directors[0]
  ),

  new Film(
    "Film2", "02-05-1536", "01:20", $genres[1], "blbbblb",
    [
      $actors[1],
      $actors[3],
    ],
    $directors[0]
  ),

  new Film(
    "Film3", "02-05-2015", "01:20", $genres[0], "blbbblb",
    [
      $actors[0],
      $actors[1],
    ],
    $directors[0]
  ),
];

$directors[0]->addFilm($films[0]);
$directors[1]->addFilm($films[1]);
$directors[1]->addFilm($films[2]);

$actors[0]->addFilm($films[0]);
$actors[1]->addFilm($films[1]);
$actors[1]->addFilm($films[2]);

$roles = [
  new Role("Role1"),
  new Role("Role2"),
  new Role("Role3"),
  new Role("Role4"),
];

$roles[0]->addActor($actors[0]);
$roles[1]->addActor($actors[1]);
$roles[3]->addActor($actors[2]);

$actors[0]->addRole($actors[0]);
$actors[1]->addRole($actors[1]);
$actors[2]->addRole($actors[3]);

// echo implode($actors, "<br>");

echo "films du réalisateur $directors[0] :<br>";
echo implode($directors[0]->getFilms(), '<br>');

echo "<br><br>films de l'acteur $actors[0] :<br>";
echo implode($actors[0]->getFilms(), '<br>');

?>

</body>

</html>
