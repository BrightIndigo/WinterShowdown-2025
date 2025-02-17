function admin() {
  if (window.location.hostname == "localhost") {
    window.location.replace("http://localhost/kod/Event/admin/admin.php");
  } else {
    window.location.replace("https://5muza.waw.pl/admin/admin.php");
  }
}
