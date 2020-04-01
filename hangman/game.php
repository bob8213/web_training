<?php

class Game {
  private $words = [];
  private $word;

  private $characters = "";
  private $score = 0;

  function __construct() {
    $json = json_decode(file_get_contents('data/words.json'));
    foreach ($json as $prop) {
      foreach ($prop as $key => $word) {
        array_push($this->words, transliterator_transliterate('Latin-ASCII',mb_strtolower($word)));
      }
    }
    $this->setWord();
  }

  function input($char) {
    if (strpos($this->characters, $char) === false) {
      $points = substr_count($this->word, strtolower($char));
      if ($points > 0) {
        $this->characters .= $_POST['char'];
        $this->score += $points;
      }
      echo "$this->word\n[$this->characters]: $points ($this->score)";
    }

    if ($this->score == strlen($this->word)) {
      echo "\nYAAAAA";
      $_SESSION["game"]->replay();
    }
  }

  function setWord() {
    $this->word = &$this->words[random_int(0, count($this->words))];
  }

  function victory($score) {
    return $score == strlen($this->word);
  }

  function replay() {
    $this->setWord();
    $this->characters = "";
    $this->score = 0;
  }
}

session_start();
if (empty($_SESSION["game"])) $_SESSION['game'] = new Game();
if (!empty($_POST["char"])) $_SESSION['game']->input($_POST["char"]);

?>
