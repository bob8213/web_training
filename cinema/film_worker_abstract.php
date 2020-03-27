<?php

abstract class FilmWorkerAbstract extends FilmAbstract{
  private $firstName;
  private $lastName;
  private $dob;

  function getFirstName() { return $this->firstName; }
  function getLastName() { return $this->lastName; }
  function getDob() { return $this->dob; }

  function __construct(
    $firstName,
    $lastName,
    $dob
  ) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->dob = $dob;
  }

  function __tostring() {
    return "$this->firstName $this->lastName";
  }
}

?>
