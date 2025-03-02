<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./style/admin.css">
  </head>
  <body>
    <div id="page">
    <h1 class="ope">Wybierz operację:</h1>
    <button onclick="dodaj()" class="btn">Dodaj artykuł</button>
    <button onclick="edytuj()" class="btn">Edytuj artykuł</button>
    <button onclick="usun()" class="btn">Usuń artykuł</button>
    <button onclick="skrzynka()" class="btn">Skrzynka odbiorcza</button>
    </div>
    <script>
      function dodaj() {
        if (
          window.location.hostname === "localhost" ||
          window.location.hostname === "127.0.0.1"
        ) {
          window.location.replace("http://localhost/kod/Event/admin/dodaj.php");
        } else {
          window.location.replace("https://5muza.waw.pl/admin/dodaj.php");
        }
      }

      function edytuj() {
        if (
          window.location.hostname === "localhost" ||
          window.location.hostname === "127.0.0.1"
        ) {
          window.location.replace(
            "http://localhost/kod/Event/admin/edytuj.php"
          );
        } else {
          window.location.replace("https://5muza.waw.pl/admin/edytuj.php");
        }
      }

      function usun() {
        if (
          window.location.hostname === "localhost" ||
          window.location.hostname === "127.0.0.1"
        ) {
          window.location.replace("http://localhost/kod/Event/admin/usun.php");
        } else {
          window.location.replace("https://5muza.waw.pl/admin/usun.php");
        }
      }
      function skrzynka() {
        if (
          window.location.hostname === "localhost" ||
          window.location.hostname === "127.0.0.1"
        ) {
          window.location.replace("http://localhost/kod/Event/admin/skrzynka.php");
        } else {
          window.location.replace("https://5muza.waw.pl/admin/skrzynka.php");
        }
      }
    </script>
  </body>
</html>
