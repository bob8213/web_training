<?php

class Film {
  private $title;
  private $release;
  private $length;
  private $synopsis;
  private $director;
  private $genre;
  private $actors;

  function getTitle() { return $this->title; }
  function getRelease() { return $this->release; }
  function getLength() { return $this->length; }
  function getGenre() { return $this->genre; }
  function getSynopsis() { return $this->synopsis; }
  function getActors() { return $this->actors; }
  function getDirector() { return $this->director; }

  function __construct(
    $title,
    $release,
    $length,
    $genre,
    $synopsis,
    $actors,
    $director
  ) {
    $this->title = $title;
    $this->release = $release;
    $this->length = $length;
    $this->genre = $genre;
    $this->synopsis = $synopsis;
    $this->actors = $actors;
    $this->director = $director;
  }

  function __tostring() {
    $actorsStr = implode($this->actors, "<br>");
    return "
      $this->title ($this->release) - Durée : $this->length - Genre $this->genre<br>
      Synopsis : $this->synopsis<br>
      Acteurs : <br>
      $actorsStr<br>
      Réalisateur : <br>
      $this->director
    ";
  }

}


?>
