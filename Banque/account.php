<?php
class Account {

  private $label;
  private $balance;
  private $currency;
  private $client;

  function getLabel() { return $label; }
  function getBalance() { return $balance; }
  function getCurrency() { return $currency; }
  function getClient() { return $client; }

  function __construct(
    $label,
    $balance,
    $currency,
    $client
  ) {
    $this->label = $label;
    $this->balance = $balance;
    $this->currency = $currency;
    $this->client = $client;
  }

  function __tostring() {
    $fn = $this->client->getFirstName();
    $ln = $this->client->getLastName();
    return "$this->label de $fn $ln - solde : $this->balance $this->currency<br>";
  }

  function credit($sum) {
    $this->balance += $sum;
  }

  function debit($sum) {
    $this->balance -= $sum;
  }

  function send($sum, $account) {
    $account->add($sum);
  }

}
 ?>
