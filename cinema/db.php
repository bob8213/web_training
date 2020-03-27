<?php

class Db {
  private $actors = [];
  private $directors = [];
  private $genres = [];
  private $roles = [];
  private $films = [];

  function getActors() { return $this->actors; }
  function getDirectors() { return $this->directors; }
  function getGenres() { return $this->genres; }
  function getRoles() { return $this->roles; }
  function getFilms() { return $this->films; }

  function getActor($i) { return $this->actors[$i]; }
  function getDirector($i) { return $this->directors[$i]; }
  function getGenre($i) { return $this->genres[$i]; }
  function getRole($i) { return $this->roles[$i]; }
  function getFilm($i) { return $this->films[$i]; }

  function __tostring() {
    $actors = implode($this->actors, '<br>');
    $directors = implode($this->directors, '<br>');
    $genres = implode($this->genres, '<br>');
    $roles = implode($this->roles, '<br>');
    $films = implode($this->films, '<br>');

    return "
    ACTEURS :<br>
    $actors<br>

    <br>REALISATEURS :<br>
    $directors<br>

    <br>GENRES :<br>
    $genres<br>

    <br>ROLES :<br>
    $roles<br>

    <br>FILMS :<br>
    $films<br>
    ";
  }

  function fullDescription() {
    $description = "<strong>DESCRIPTIONS DES REALISATEURS</strong><br>";
    foreach ($this->directors as $director) {
      $films = implode($director->getFilms(), '<br>');
      $description .= "<br><strong>$director</strong><br>$films<br>";
    }
    $description .= "<br><strong>DESCRIPTIONS DES ACTEURS</strong><br>";
    foreach ($this->actors as $actor) {
      $films = implode($actor->getFilms(), '<br>');
      $description .= "<br><strong>$actor</strong><br>$films<br>";
    }
    $description .= "<br><strong>DESCRIPTIONS DES GENRES</strong><br>";
    foreach ($this->genres as $genre) {
      $films = implode($genre->getFilms(), '<br>');
      $description .= "<br><strong>$genre</strong><br>$films<br>";
    }
    $description .= "<br><strong>DESCRIPTIONS DES ROLES D'UN ACTEUR</strong><br>";
    foreach ($this->actors as $actor) {
      $roles = implode($actor->getRoles(), '<br>');
      $description .= "<br><strong>$actor</strong><br>$roles<br>";
    }
    $description .= "<br><strong>DESCRIPTIONS DES FILMS</strong><br>";
    foreach ($this->films as $film) {
      $filmDesc = $film->fullDescription();
      $description .= "<br>$filmDesc<br><br>";
    }
    $description .= "<br><strong>DESCRIPTIONS DES ACTEURS D'UN ROLE</strong><br>";
    foreach ($this->roles as $role) {
      $actors = implode($role->getActors(), '<br>');
      $description .= "<br><strong>$role</strong><br>$actors<br>";
    }
    return $description;
  }

  function addActor($actor) { array_push($this->actors, $actor); }
  function addDirector($director) { array_push($this->directors, $director); }
  function addGenre($genre) { array_push($this->genres, $genre); }
  function addFilm(
    $title,
    $release,
    $length,
    $genre,
    $synopsis,
    $director,
    $roleActorKVPs
  ) {
    $actors = [];
    foreach ($roleActorKVPs as $roleName => $actor) {
      array_push($actors, $actor);
      $role = array_search($roleName, $this->roles);
      if ($role != false) {
        $role = $this->roles[$role];
      }else{
        $role = new Role($roleName);
        array_push($this->roles, $role);
      }
      $actor->addRole($role);
    }
    $film = new Film($title, $release, $length, $genre, $synopsis, $director, $actors);
    array_push($this->films, $film);

    $director->addFilm($film);
    $genre->addFilm($film);
    foreach ($actors as $actor) {
      $actor->addFilm($film);
      $role->addActor($actor);
    }
  }

}

?>
