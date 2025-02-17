function edytuj() {
  let host = window.location.hostname;
  if (host == "localhost") {
    window.location.replace("http://localhost/kod/Event/admin/edytuj.php");
  } else {
    window.location.replace("https://5muza.waw.pl/admin/edytuj.php");
  }
}

function img_change(id, id_preview) {
  let user_select = document.getElementById(id);
  if (user_select.files.length > 0) {
    let file = user_select.files[0];
    console.log("File name:", file.name);
    console.log("File size:", file.size);
    console.log("File type:", file.type);

    let preview = document.getElementById(id_preview);

    if (user_select.files && user_select.files[0]) {
      let reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result; // Ustawienie źródła zdjęcia na wybrany plik
      };
      reader.readAsDataURL(file); // Odczytanie pliku jako URL w formacie DataURL
    }
  } else {
    console.log("No file selected.");
  }
}
