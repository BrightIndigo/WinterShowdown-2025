<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
  </head>
  <body>
    <h1>Wybierz operację:</h1>
    <button onclick="dodaj()">Dodaj artykuł</button>
    <button onclick="edytuj()">Edytuj artykuł</button>
    <button onclick="usun()">Usuń artykuł</button>

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
    </script>
  </body>
</html>
