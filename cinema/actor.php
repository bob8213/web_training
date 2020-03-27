<?php

require_once 'film_worker_abstract.php';

class Actor extends FilmWorkerAbstract {
  private $roles = [];

  function getRoles() {return $this->roles;}

  function addRole($role) {
    array_push($this->roles, $role);
  }
}

?>
