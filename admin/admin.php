<!DOCTYPE html>
<html lang="en">
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
        window.location.replace("http://localhost/kod/Event/admin/dodaj.php");
        //window.location.replace("https://5muza.waw.pl/admin/dodaj.php");
      }

      function edytuj() {}

      function usun() {
        window.location.replace("http://localhost/kod/Event/admin/usun.php");
        //window.location.replace("https://5muza.waw.pl/admin/usun.php");
      }
    </script>
  </body>
</html>
