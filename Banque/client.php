<?php

class Client {

  private $firstName;
  private $lastName;
  private $dob;
  private $city;
  private $accounts;

  function getFirstName() { return $this->firstName; }
  function getLastName() { return $this->lastName; }
  function getDob() { return $this->dob; }
  function getCity() { return $this->city; }
  function getAccounts() { return $this->accounts; }

  function __construct(
    $firstName,
    $lastName,
    $dob,
    $city,
    $accounts
  ) {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->dob = $dob;
    $this->city = $city;
    $this->accounts = $accounts;
  }

  function __tostring() {
    $age = $this->age();
    $acc = implode($this->accounts);
    return "$this->firstName $this->lastName ($age ans) à $this->city : <br>$acc<br>";
  }

  function age() {
    $dob = new DateTime($this->dob);
    $now = new Datetime('NOW');
    return $now->diff($dob)->y;
  }

  function addAccount($account) {
    array_push($this->accounts, $account);
  }

}

?>
