<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banque</title>
</head>

<body>

<?php

include 'account.php';
include 'client.php';

$client = new Client("John", "Kevin", "20-07-1987", "Paris", []);
$client->addAccount(new Account("Compte courant", 0.56, "euros", $client));
$client->addAccount(new Account("Livret A", 5000, "dallars", $client));

echo $client;
echo "======================================<br>";
echo implode($client->getAccounts());

?>

</body>

</html>
