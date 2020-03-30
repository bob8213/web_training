<?php

class Film implements iDisplay {
  private $title;
  private $release;
  private $length;
  private $genre;
  private $synopsis;
  private $director;
  private $actors;

  function getTitle() { return $this->title; }
  function getRelease() { return $this->release; }
  function getLength() { return $this->length; }
  function getGenre() { return $this->genre; }
  function getSynopsis() { return $this->synopsis; }
  function getDirector() { return $this->director; }
  function getActors() { return $this->actors; }

  function __construct(
    $title,
    $release,
    $length,
    $genre,
    $synopsis,
    $director,
    $actors
  ) {
    $this->title = $title;
    $this->release = $release;
    $this->length = $length;
    $this->genre = $genre;
    $this->synopsis = $synopsis;
    $this->director = $director;
    $this->actors = $actors;
  }

  function __tostring() { return "$this->title"; }

  function display() {
    $actors = implode($this->actors, "<br>");
    return "
      <strong>$this->title</strong> ($this->release) - Durée : $this->length - Genre $this->genre<br>
      Synopsis : $this->synopsis<br>
      <strong>Acteurs : </strong><br>
      $actors<br>
      <strong>Réalisateur :  </strong><br>
      $this->director
    ";
  }

}


?>
