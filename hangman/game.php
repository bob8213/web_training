<?php

class Game {
  const DEBUG = true;

  private $words = [];
  public $word;

  private $characters = "";
  private $score = 0;

  private $tryCount = 10;
  private $tries = 0;

  function __construct() {
    $json = json_decode(file_get_contents('data/words.json'));
    foreach ($json as $prop) {
      foreach ($prop as $key => $word) {
        array_push($this->words, transliterator_transliterate('Latin-ASCII',mb_strtolower($word)));
      }
    }
    $this->setWord();
  }

  function input(&$response, $char) {
    if ($this->tries < $this->tryCount) {

      if (strpos($this->characters, $char) === false) {
        $this->characters .= $_POST['char'];

        $positions = [];
        $lastPos = 0;
        while (($lastPos = strpos($this->word, strtolower($char), $lastPos))!== false) {
          $positions[] = $lastPos;
          $lastPos++;
        }

        $points = count($positions);
        if ($points > 0) {
          $this->score += $points;
          $indices = implode($positions, ',');
          $indices = "[$indices]";
          array_push($response, '"indices":'.$indices);
        }else{
          $this->tries++;
        }
      }

      if ($this->score == strlen($this->word)) {
        array_push($response, '"win":true');
        $this->replay($response);
      }else {
        $remainingTries = $this->tryCount - $this->tries;
        array_push($response, '"tryCount":'.$remainingTries);
        if ($remainingTries == 0) {
          array_push($response, '"win":false');
          $this->replay($response);
        }
      }
    }

    array_push($response, '"characters":"'.$this->characters.'"');
  }

  function setWord() {
    $this->word = &$this->words[random_int(0, count($this->words))];
  }

  function victory($score) { return $score == strlen($this->word); }
  function letterCount() { return strlen($this->word); }
  function tryCount() { return $this->tryCount; }

  function replay(&$response) {
    $this->setWord();
    $this->characters = "";
    $this->score = 0;
    $this->tries = 0;

    $letterCount = $this->letterCount();
    array_push($response, '"letterCount":'.$letterCount);
    array_push($response, '"tryCount":'.$this->tryCount);

    if (self::DEBUG) array_push($response, '"debugWord":"'.$this->word.'"');
  }
}

session_start();

$response = [];

if (empty($_SESSION["game"])) {
  $_SESSION['game'] = new Game();
  $letterCount = $_SESSION['game']->letterCount();
  $tryCount = $_SESSION['game']->tryCount();
  array_push($response, '"letterCount":'.$letterCount);

  $word = $_SESSION['game']->word;
  if (Game::DEBUG) array_push($response, '"debugWord":"'.$word.'"');

  array_push($response, '"tryCount":'.$tryCount);
}
if (!empty($_POST["char"])) $_SESSION['game']->input($response, $_POST["char"]);

echo '{'.implode($response, ",").'}';

?>
