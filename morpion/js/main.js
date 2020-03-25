
var Cell = {
  NONE: 0,
  PLAYER_ONE: 1,
  PLAYER_TWO: 2,
};

var grid = [];
var turn = Cell.PLAYER_ONE;

var done = false;

var symbol = [
  "images/cross.png",
  "images/circle.png",
];

var count = 0;

function createGrid() {
  var element = document.getElementById("grid");

  var html = "";
  for (var i = 0; i < 3; i++) {
    grid.push([]);
    for (var j = 0; j < 3; j++) {
      grid[i].push(Cell.NONE);
      var pos = j + "," + i;
      var id = "x"+j+"y"+i;
      html += "<div onclick='play(" + pos + ", this.id)' class='cell' id='" + id + "'></div>";
    }
  }

  element.innerHTML = html;

  var icon = document.getElementById("symbol-icon1");
  icon.setAttribute("src", symbol[0]);
  var icon = document.getElementById("symbol-icon2");
  icon.setAttribute("src", symbol[1]);
}

function play(x, y, id) {
  // Is the cell available?
  if (grid[x][y] == Cell.NONE && !done) grid[x][y] = turn;
  else return;

  var element = document.getElementById(id);
  element.innerHTML = "<img src='"+ symbol[turn-1] +"' alt='' class='symbol'>";

  if (checkLines(turn, x, y)) {
    done = true;
    var winner = document.getElementById("winner"+turn);
    winner.classList.remove("hidden");
  }

  // Show replay button
  if (++count >= 9 || done) {
    var gameOver = document.getElementById("game-over");
    gameOver.classList.remove("hidden");
    return
  }

  // Highlight the current player
  var player = document.getElementById("player"+turn);
  player.classList.remove("playing");
  if (turn == Cell.PLAYER_ONE) turn = Cell.PLAYER_TWO;
  else if (turn == Cell.PLAYER_TWO) turn = Cell.PLAYER_ONE;
  var player = document.getElementById("player"+turn);
  player.classList.add("playing");
}

function checkLines(turn, x, y) {
  var neighbors = [];

  for (var i = x-1; i <= x+1; i++) {
    for (var j = y-1; j <= y+1; j++) {
      // If index is in bounds and is not the cell itself, it is a neighbor of the cell
      if (i < 0 || j < 0 || i > 2 || j > 2 || (i==x && j==y)) continue;
      if (grid[i][j] == turn) neighbors.push([i, j]);
    }
  }

  for (var i = 0; i < neighbors.length; i++) {
    // Offset between neighbor and cell
    var dir = [neighbors[i][0] - x, neighbors[i][1] - y];

    //Check a line of 5 with the cell in the middle to handle all cases
    var line = 1;
    for (var j = -2; j <= 2; j++) {
      if (j==0) continue;
      var index = [x + dir[0] * j, y + dir[1] * j];
      if (index[0] < 0 || index[1] < 0 || index[0] > 2 || index[1] > 2) continue;
      if (grid[index[0]][index[1]] == turn) line++;
    }

    if (line >= 3) return true;
  }

  return false;
}

function replay() {
  for (var i = 0; i < 3; i++) {
    for (var j = 0; j < 3; j++) {
      grid[i][j] = Cell.NONE;
      var id = "x"+j+"y"+i;
      document.getElementById(id).innerHTML = "";
    }
  }

  var winner = document.getElementById("winner"+turn);
  winner.classList.add("hidden");

  turn = Cell.PLAYER_ONE;
  count = 0;
  done = false;

  var player = document.getElementById("player1");
  player.classList.add("playing");
  var player = document.getElementById("player2");
  player.classList.remove("playing");

  var gameOver = document.getElementById("game-over");
  gameOver.classList.add("hidden");
}
