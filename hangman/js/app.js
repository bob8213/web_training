
function load() {
  document.addEventListener('keydown', function(event) {
    input(event.keyCode);
  });
}

function input(keyCode) {
  let value = String.fromCharCode(keyCode);
  let regex = /[A-Z]/;

  if (value.match(regex)) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "game.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`char=${value}`);

    xhr.onload = () => {
      console.log(xhr.responseText);
    }
  } else {
    //TODO
  }
}
