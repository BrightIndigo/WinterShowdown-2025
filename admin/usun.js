function Overflowing(element) {
  return element.scrollHeight > element.clientHeight;
}

document.addEventListener("DOMContentLoaded", function () {
  const contentElements = document.getElementsByClassName("large-box");
  let quantity = contentElements.length;

  console.log("Liczba elementów:", quantity);

  for (let i = 0; i < quantity; i++) {
    if (Overflowing(contentElements[i])) {
      console.log(`Element ${i + 1} ma overflow.`);
      contentElements[i].style.border = "2px solid red"; // Podświetlenie problematycznych elementów
    } else {
      console.log(`Element ${i + 1} mieści tekst.`);
    }
  }
});
