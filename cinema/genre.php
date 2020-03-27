<?php

class Genre extends FilmAbstract {
  private $name;

  function getName() { return $this->$name; }

  function __construct($name) { $this->name = $name; }

  function __tostring() {
    return "$this->name";
  }
}

?>
