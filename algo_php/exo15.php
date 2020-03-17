<?php
include 'exo.php';

class Person {
  private $first_name;
  private $last_name;
  private $dob;

  public function getFirstName() { return $this->first_name; }
  public function getLastName() { return $this->last_name; }
  public function getDateOfBirth() { return $this->dob; }

  public function __construct($first_name, $last_name, $dob) {
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->dob = $dob;
  }

  public function __tostring() {
    return $this->first_name.' '.$this->last_name.' a '.$this->age().' ans';
  }

  public function age() {
    $now = new DateTime('NOW');
    $dob = new DateTime($this->dob);
    $diff = $now->diff($dob);
    return $diff->y;
  }

}

$p1 = new Person("Michel", "DUPONT", "1980-02-19") ;
$p2 = new Person("Alice", "DUCHEMIN", "1985-01-17") ;

echo exo_n(15, $p1.'<br>'.$p2);

?>
