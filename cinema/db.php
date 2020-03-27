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

  }

  function addActor($actor) { array_push($this->actors, $actor); }
  function addDirector($director) { array_push($this->directors, $director); }
  function addGenre($genre) { array_push($this->genres, $genre); }
  // X Not role
  function addFilm($film) { array_push($this->films, $film); }

}

?>
