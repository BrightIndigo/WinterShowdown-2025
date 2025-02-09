<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logowanie</title>
  </head>
  <body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      //$conn = new mysqli('localhost', 'ah5muzaw737', 'N7d@-*32y-7CHV-NbbR', 'ah5muzaw737_'); 
      $conn = new mysqli('localhost', 'root', '', 'artykuly'); 
      if ($conn->connect_error) {
          die("Błąd połączenia: " . $conn->connect_error);
      }


      // Handle file uploads
      $upload_dir = './images/';
      $zdj_glowne = $upload_dir . basename($_FILES['zdj_glowne']['name']);
      $zdj_t1 = $upload_dir . basename($_FILES['zdj_t1']['name']);
      $zdj_t2 = $upload_dir . basename($_FILES['zdj_t2']['name']);

      move_uploaded_file($_FILES['zdj_glowne']['tmp_name'], $zdj_glowne);
      move_uploaded_file($_FILES['zdj_t1']['tmp_name'], $zdj_t1);
      move_uploaded_file($_FILES['zdj_t2']['tmp_name'], $zdj_t2);

      $sql = "INSERT INTO artykul1 (id, zdj_m, tytul, autor, podtytul, data, zdj1, tekst1, zdj2, tekst2, podsumowanie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $sql2 = "SELECT MAX(id) FROM artykul1";
      if ($id = mysqli_query($conn, $sql2)) {
        $id = mysqli_fetch_row($id)[0] + 1;
      } else {
        $id = 1;
      }
      if ($stmt) {
          $stmt->bind_param(
              "issssssssss",
            $id,
              $zdj_glowne,
              $_POST['tytul'],
              $_POST['podtytul'],
              $_POST['autor'],
              $_POST['godzina'],
              $zdj_t1,
              $_POST['tekst_a1'],
              $zdj_t2,
              $_POST['tekst_a2'],
              $_POST['podsumowanie']
          );

          if ($stmt->execute()) {
              echo "Artykuł został dodany.";
          } else {
              echo "Błąd: " . $stmt->error;
          }

          $stmt->close();
      } else {
          echo "Błąd przygotowania zapytania: " . $conn->error;
      }

      $conn->close();
  }
    ?>
    <style>
      form {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    </style>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
      <p>Dodaj zdjęcie artykułu ukazujące się na stronie głównej:</p>
      <input type="file" name="zdj_glowne" id="zdj_glowne" />
      <p>Dodaj tytuł artykułu:</p>
      <input type="text" id="tytul" name="tytul" required/>
      <p>Dodaj podtytuł artykułu:</p>
      <input type="text" id="podtytul" name="podtytul" required/>
      <p>Data wysłania artykułu:</p>
      <input type="date" id="godzina" name="godzina" required/>
      <p>Dodaj zdjęcie do pierwszej części tekstu artykułu:</p>
      <input type="file" name="zdj_t1" id="zdj_t1" />
      <p>Dodaj pierwszą część tekstu artykułu:</p>
      <textarea rows="8" cols="50" id="tekst_a1" name="tekst_a1" required></textarea>
      <p>Dodaj zdjęcie do drugiej części tekstu artykułu:</p>
      <input type="file" name="zdj_t2" id="zdj_t2" />
      <p>Dodaj drugą część tekstu artykułu:</p>
      <textarea rows="8" cols="50" id="tekst_a2" name="tekst_a2" required></textarea>
      <p>Dodaj podsumowanie:</p>
      <textarea rows="8" cols="50" id="podsumowanie" name="podsumowanie" required></textarea>
      <p>Dodaj autora/ów tekstu:</p>
      <input type="text" id="autor" name="autor" required/>
      <br /><br />
      <input type="submit" value="Wyślij artykuł" name="submit" />
    </form>
  </body>
</html>
