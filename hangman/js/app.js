
var hangman;

var tries;
var triesHTML;
var triesSet = false;

var letters;
var lettersHTML;
var letterCount;

var letterButtons;
var letterButtonsHTML;

var started = false;
var playing = false;
var gameOver = false;

var lastInput;
var characters = "";

var waiting = false;
var queue = [];

var audio;
var click;
var nope;
var yes;
var yay;
const audioVolume = .3;

//TODO fix audio pause error

function load() {
  audio = new Audio("data/mop.mp3");
  click = new Audio("data/click.wav");
  nope = new Audio("data/nope.wav");
  yes = new Audio("data/yes.wav");
  yay = new Audio("data/yay.mp3");

  audio.volume = .1;
  audio.loop = true;

  click.volume = audioVolume;
  nope.volume = audioVolume;
  yes.volume = audioVolume;

  yay.volume = .5;
  yay.playbackRate = 2;

  let wrapper = document.getElementById("wrapper");
  let w = window.innerWidth;
  let h = window.innerHeight;
  window.onresize = () => resizeWrapper(w, h, wrapper);
  resizeWrapper(w, h, wrapper);

  document.addEventListener('keydown', function(event) {
    input(event.keyCode);
  });

  hangman = fromTemplate(document.getElementById("hangman"));

  tries = document.getElementById("tries");
  triesHTML = tries.innerHTML;
  letters = document.getElementById("letters");
  lettersHTML = letters.innerHTML;
  letterButtons = document.getElementById("letterButtons");
  letterButtonsHTML = letterButtons.innerHTML;

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "game.php");
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send();

  xhr.onload = () => {
    console.log(xhr.responseText);
    let response = JSON.parse(xhr.responseText);
    setLetters(response.letterCount);
    setTries(response.tryCount);
    loadGame();
  }

  setLetterButtons();

  started = true;
}

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function loadGame() {
  await sleep(500);
  let load = document.getElementById("load");
  load.innerHTML = `<h5>
    Ce jeu se joue avec les touches du clavier,
    ou en cliquant sur les boutons.
  </h5>`;

  await sleep(3000);
  load.innerHTML = "<h5>Cliquer pour démarrer!</h5>";
}

async function play() {
  if (gameOver) {
    location.reload();
  }else{
    if(!started || playing) return;
  }
  playing = true;

  audio.play();
  console.log("play")

  let load = document.getElementById("load");
  load.style.opacity = 0;
  await sleep(1000);
}

function fromTemplate(element) {
  let newElement = document.createElement("div");
  newElement.innerHTML = element.innerHTML;
  newElement.classList = element.classList;
  newElement.id = element.id;

  let parent = element.parentNode;
  parent.insertBefore(newElement, element);
  parent.removeChild(element);

  return newElement;
}

function input(input) {
  if (!started) return;

  if (isNaN(input)) {
    //Input comes from a button
    sendInput(input);
  }else {
    //Input is a keyCode
    let value = String.fromCharCode(input);
    if (value.match(/[A-Z]/)) {
      sendInput(value);
    }
  }
}

function sendInput(value) {
  if(queue.length == 0) {
    queue.unshift(value);
    waiting = true;
  }else if (waiting && (value != null)){
    queue.unshift(value);
    return;
  }

  if (characters.includes(queue[queue.length-1])) {
    queue.pop();
    if (queue.length > 0) {
      sendInput(null);
    }
    return;
  }

  lastInput = queue[queue.length-1];
  const char = lastInput.toLowerCase();
  document.getElementById(`letterButton_${char}`).style.color = "gray";

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "game.php");
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send(`char=${lastInput}`);

  click.pause();
  click.currentTime = 0;
  click.play();

  xhr.onload = () => {
    console.log(xhr.responseText);

    document.getElementById(`letterButton_${lastInput.toLowerCase()}`).hidden = true;
    let response = JSON.parse(xhr.responseText);

    if (response.characters != undefined) characters = response.characters;

    let indices = response.indices;
    if (indices != undefined) {
      yes.pause();
      yes.currentTime = 0;
      yes.play();
      for (var i = 0; i < indices.length; i++) {
        document.getElementById(`letter${indices[i]}`).innerText = lastInput.toUpperCase();
      }
    }else{
      nope.pause();
      nope.currentTime = 0;
      nope.play();
    }

    let win = response.win;
    if (win != undefined) {
      queue = [];
      waiting = false;

      if (win) {
        yay.pause();
        yay.currentTime = 0;
        yay.play();

        setLetters(response.letterCount);
        setTries(response.tryCount);
        setLetterButtons();
      }else{
        audio.pause();
        audio.currentTime = 0;
        let load = document.getElementById("load");
        load.style.opacity = 1;
        playing = false;
        gameOver = true;
      }
    }else {
      setTries(response.tryCount);
      queue.pop();
      if (queue.length > 0) {
        sendInput(null);
      }else{
        waiting = false;
      }
    }
  }
}

function setTries(count) {
  if (!triesSet) {
    let html = "";
    for (var i = 0; i < count; i++) {
      html += triesHTML.replace('{{id}}', i);
    }
    tries.innerHTML = html;
    triesSet = true;
  }else {
    const length = document.getElementsByClassName("tp").length;
    for (var i = 0; i < length; i++) {
      let tp = document.getElementById(`tp${i}`);
      if (i < count) {
        if (tp.getAttribute("style")!=null) tp.removeAttribute("style");
      }
      else {
        tp.style.width = 0;
      }
    }
  }
}

function setLetters(count) {
  let html = "";
  for (var i = 0; i < count; i++) {
    html += lettersHTML.replace('{{index}}', i);
  }
  letters.innerHTML = html;
}

function setLetterButtons() {
  let html = "";
  let characters = "azertyuiopqsdfghjklmwxcvbn";
  for (var i = 0; i < characters.length; i++) {
    if (i == 20) html += "<div class='letterRow'>";
    html += letterButtonsHTML
      .replace('{{deg}}', (Math.random() - .5) * 2 * 10)
      .replace('{{letter}}', characters.charAt(i))
      .replace('{{letter}}', characters.charAt(i))
      .replace('{{letter}}', characters.charAt(i).toUpperCase());
    if (i == 25) html += "</div>";
  }
  letterButtons.innerHTML = html;
}

function resizeWrapper(width, height, wrapper) {
  let min = Math.min(width, height);
  wrapper.style.maxWidth = `${min}px`;
}
