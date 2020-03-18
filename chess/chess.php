<?php

function createPieces()
{
  //Build an array for each player
  $blackRow = [
    "tour", "cavalier", "fou", "reine", "roi", "fou", "cavalier", "tour",
  ];
  $row2 = [
    "pion", "pion", "pion", "pion", "pion", "pion", "pion", "pion",
  ];

  //Reverse order for white player
  $whiteRow = [];
  for ($i=7; $i >= 0; $i--) {
    $whiteRow[$i] = $blackRow[7-$i];
  }

  $black = array_merge($blackRow, $row2);
  $white = array_merge($row2, $whiteRow);

  //Add color information
  for ($i=0; $i < 16; $i++) $white[$i] .= ' BLANC';
  for ($i=0; $i < 16; $i++) $black[$i] .= ' NOIR';

  return [$black, $white];
}

function createCells($pieces, $cellSize)
{
  $table = "<table><tbody>";
  $i = 0;
  $isWhite = true;

  for ($x=0; $x < 8; $x++) {
    $row = "<tr>";

    for ($y=0; $y < 8; $y++) {

      $text = "";
      if ($i < 16) $text = $pieces[0][$i];
      elseif ($i >= 48) $text = $pieces[1][$i-48];

      //Add cell to row
      $row .= "<td class='".($isWhite ? "white" : "black")."'>".
        $text.
      "</td>";

      $i++;
      $isWhite = !$isWhite;
    }

    $isWhite = !$isWhite;
    $row .= "</tr>";
    $table .= $row;
  }

  // Close table and add style
  $table .= "</tbody></table>";
  $table .= "
    <style type='text/css'>
      * {
        box-sizing: border-box;
        text-align: center;
      }

      table {
        border-collapse: collapse;
      }

      td {
        border: 2px solid black;
        width: $cellSize;
        height: $cellSize;
      }

      .white {
        background: white;
        color: black;
      }

      .black {
        background: black;
        color: white;
      }
    </style>
  ";

  return $table;
}

$pieces = createPieces();
$cells = createCells($pieces, 100);

echo $cells;

?>
