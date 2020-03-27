
var blackRow = [
  "b-rook", "b-knight", "b-bishop", "b-queen", "b-king", "b-bishop", "b-knight", "b-rook",
];

var whiteRow = [
  "w-rook", "w-knight", "w-bishop", "w-queen", "w-king", "w-bishop", "w-knight", "w-rook",
];

var blackPawn = "b-pawn";
var whitePawn = "w-pawn";

function loadChess() {
  let chess = document.getElementById("chess");
  let white = true;
  let index = 0;

  // Create cells with the right colors and subscribe them to 'onclick'
  for (let i = 0; i < 8; i++) {
    for (let j = 0; j < 8; j++) {
        let cell = document.createElement("div");
        cell.id = "x"+j+"y"+i;
        cell.classList.add("cell");
        cell.classList.add(white ? "white" : "black");
        cell.onclick = () => clickCell(cell.id, j, i);

        if (index < 16 || index >= 48) {
          let img = document.createElement("img");

          // if ($i < 16) $text = $pieces[0][$i];
          if (index < 8) src = blackRow[index];
          else if (index < 16) src = blackPawn;
          else if (index >= 48 && index < 56) src = whitePawn;
          else src = whiteRow[index-56];

          img.src = "images/"+src+".png";
          img.classList.add("piece");
          cell.appendChild(img);
        }

        chess.appendChild(cell);
        if (j != 7) white = !white;
        index++;
    }
  }

  // Subscribe to 'onresize' and resize on load to fit inside the window.
  let wrapper = document.getElementById("wrapper");
  window.onresize = () => resizeChess(window.innerWidth, window.innerHeight, wrapper);
  resizeChess(window.innerWidth, window.innerHeight, wrapper);

}

function clickCell(_element, x, y) {
  alert(`${x}, ${y}`);
}

function resizeChess(width, height, wrapper) {
  let min = Math.min(width, height);
  wrapper.style.width = `${min}px`;
  wrapper.style.height = `${min}px`;
}
