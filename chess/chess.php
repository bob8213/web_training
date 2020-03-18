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
  for ($i=7; $i >= 0; $i--) $whiteRow[$i] = $blackRow[7-$i];

  $black = array_merge($blackRow, $row2);
  $white = array_merge($row2, $whiteRow);

  //Add color information
  for ($i=0; $i < 16; $i++) {
    $black[$i] .= ' NOIR';
    $white[$i] .= ' BLANC';
  }

  return [$black, $white];
}

function createGrid($pieces, $cellSize)
{
  $grid = "<main>";
  $i = 0;
  $isWhite = true;

  for ($x=0; $x < 8; $x++) {

    for ($y=0; $y < 8; $y++) {
      $text = "";
      if ($i < 16) $text = $pieces[0][$i];
      elseif ($i >= 48) $text = $pieces[1][$i-48];

      $grid .= "<div class='".($isWhite ? "white" : "black")."'>".
        $text.
      "</div>";

      $i++;
      $isWhite = !$isWhite;
    }

    $isWhite = !$isWhite;
  }

  // Close table and add style
  $grid .= "
    <style type='text/css'>
      * {
        box-sizing: border-box;
        text-align: center;
      }

      main {
        display: flex;
        flex-wrap: wrap;
        width: ".($cellSize*8).";
      }

      .white, .black {
        border: 2px solid black;
        min-width: ".$cellSize.";
        min-height: ".$cellSize.";
        flex: 0 0 ".(1/8*100)."%;
        padding: 20px;
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

  return $grid."</main>";
}

$pieces = createPieces();
$cells = createGrid($pieces, 100);

echo $cells;

?>
