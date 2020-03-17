<?php
include 'exo.php';

$form = '<form>';
$form .= displayFields(
  "Nom",
  "Prénom",
  "E-mail",
  "Ville",
  "Sexe"
);

$list = [
  "Développeur Logiciel",
  "Designer web",
  "Intégrateur",
  "Chef de projet",
];
$form .= displayList($list).'<input type="submit" value="Envoyer">';

echo exo_n(10, $form);

?>
