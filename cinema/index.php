<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema</title>
</head>

<body>

<?php

require_once 'film_abstract.php';
require_once 'film_worker_abstract.php';

require_once 'actor.php';
require_once 'director.php';
require_once 'film.php';
require_once 'genre.php';
require_once 'role.php';

require_once 'db.php';

$db = new Db();

$db->addActor(new Actor("John", "Kevin", "12-03-1969"));
$db->addActor(new Actor("Arthur", "Tutur", "12-03-1969"));
$db->addActor(new Actor("Silvie", "Vivi", "12-03-1969"));
$db->addActor(new Actor("Martin", "Tintin", "12-03-1969"));

$db->addDirector(new Director("Alphonse", "Blbl", "12-03-1969"));
$db->addDirector(new Director("Tristan", "hmhmhm", "21-04-854"));

$db->addGenre(new Genre("Genre1"));
$db->addGenre(new Genre("Genre2"));

$db->addFilm(
  "Film1", "02-05-2018", "01:20", $db->getGenre(0), "blbbblb1", $db->getDirector(0),
  ["Role1" => $db->getActor(0), "Role2" => $db->getActor(2), "Role3" => $db->getActor(3)]
);

$db->addFilm(
  "Film2", "02-05-2017", "01:20", $db->getGenre(1), "blbbblb2", $db->getDirector(1),
  ["Role4" => $db->getActor(0), "Role3" => $db->getActor(1)]
);

$db->addFilm(
  "Film3", "02-05-2010", "01:20", $db->getGenre(0), "blbbblb3", $db->getDirector(0),
  ["Role2" => $db->getActor(1), "Role4" => $db->getActor(2)]
);

echo $db;
echo "<br><br>=======================================<br><br>";
echo $db->fullDescription();

// TODO fix roles
// remove hardcorded stuf in Db
// display interface

?>

</body>

</html>
