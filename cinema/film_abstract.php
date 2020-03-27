<?php

abstract class FilmAbstract {
  private $films = [];

  function getFilms(){ return $this->films;}

  function addFilm($film) {
    array_push($this->films, $film);
  }
}

?>
