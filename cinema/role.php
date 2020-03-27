<?php

require_once 'film_abstract.php';

class Role extends FilmAbstract{
  private $name;
  private $actors = [];

  function getName() { return $this->$name; }

  function __construct($name) { $this->name = $name; }

  function __tostring() {
    return $this->name;
  }

  function getActors() { return $this->roles; }

  function addActor($actor) {
    array_push($this->actors, $actor);
  }
}

?>
