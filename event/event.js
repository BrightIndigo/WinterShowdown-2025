let x = 0;
function zmien() {
  x = x + 1;
  console.log(x.toString());
  if (x % 2 != 0) {
    document.getElementById("zmien").innerHTML =
      "W dniach od 30 stycznia do 2 lutego 2025 roku Augustów stanie się centrum różnorodnych form rozrywki, dedykowanych zarówno młodszym, jak i starszym uczestnikom. Augustów Winter Showdown to wyjątkowe wydarzenie, które łączy aktywności takie jak e-sport, szachy, wędkarstwo, strzelectwo oraz atrakcje dla dzieci. Dzięki wsparciu lokalnych władz, Politechniki Białostockiej oraz licznych partnerów, organizatorzy przygotowują największe tego rodzaju wydarzenie w regionie, które przyciągnie zawodników, rodziny oraz entuzjastów z całej Polski.";
    document.getElementById("zmien2").innerText = "Zwiń";
  } else {
    document.getElementById("zmien").innerHTML =
      "W dniach od 30 stycznia do 2 lutego 2025 roku Augustów...";
    document.getElementById("zmien2").innerText = "Czytaj dalej";
  }
}

function redirect(url) {
  window.location.href = url;
}
