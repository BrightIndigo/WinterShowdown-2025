function edytuj() {
  let host = window.location.hostname;
  if (host == "localhost") {
    window.location.replace("http://localhost/kod/Event/admin/edytuj.php");
  } else {
    window.location.replace("https://5muza.waw.pl/admin/edytuj.php");
  }
}
