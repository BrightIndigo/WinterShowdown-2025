let dotknij_elements = document.getElementsByClassName("dotknij");
for (i = 0; i < dotknij_elements.length; i++) {
  if (
    navigator.userAgent.match(/iPhone/i) ||
    navigator.userAgent.match(/iPad/i) ||
    navigator.userAgent.match(/Android/i)
  ) {
    console.log("Mobile");
    dotknij_elements[i].innerText = "Dotknij aby dowiedzieć się więcej!";
  } else {
    console.log("PC");
    dotknij_elements[i].innerText = "Kliknij aby dowiedzieć się więcej!";
  }
}

function wyswietl(imagePath) {
  const image = document.getElementById("imageDisplay");
  image.src = imagePath;
  image.style.display = "block";
  const close = document.getElementById("close");
  close.style.display = "block";
}

function ukryj() {
  const image = document.getElementById("imageDisplay");
  image.style.display = "none";
  const close = document.getElementById("close");
  close.style.display = "none";
}
