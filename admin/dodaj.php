<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logowanie</title>
    <script src="./scripts/powrot.js"></script>
    <link rel="stylesheet" href="./style/dodaj.css">
    <script src="./scripts/dodaj.js"></script>
  </head>
  <body onload="info()">
    <div id="page">
  <button onclick="admin()" class="btn">Powrót do menu</button>
    <?php
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      if ($_SERVER['REMOTE_ADDR'] == '::1') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "artykuly";
    } else {
        $servername = $p_servername;
        $username = $p_username;
        $password = $p_password;
        $db = $p_db;
    }
      $conn = new mysqli($servername, $username, $password, $db); 
      
      if ($conn->connect_error) {
          die("Błąd połączenia: " . $conn->connect_error);
      }

      // Handle file uploads
      $upload_dir = '../images/';

      
      $zdj_glowne = $upload_dir . basename($_FILES['zdj_glowne']['name']);
      $zdj_t1 = $upload_dir . basename($_FILES['zdj_t1']['name']);
      $zdj_t2 = $upload_dir . basename($_FILES['zdj_t2']['name']);

      move_uploaded_file($_FILES['zdj_glowne']['tmp_name'], $zdj_glowne);
      move_uploaded_file($_FILES['zdj_t1']['tmp_name'], $zdj_t1);
      move_uploaded_file($_FILES['zdj_t2']['tmp_name'], $zdj_t2);
      
      $sql = "INSERT INTO artykul1 (id, zdj_m, tytul, autor, podtytul, czas, zdj1, tekst1, zdj2, tekst2, podsumowanie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
              $_POST['czas'],
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
    <form action="dodaj.php" method="POST" enctype="multipart/form-data">
      <div class="box">
      <p>Dodaj zdjęcie artykułu ukazujące się na stronie głównej:</p>
      <img src="" id="img_g" class="img_preview"> 
      <input type="file" name="zdj_glowne" id="zdj_glowne" onchange="change_img('zdj_glowne', 'img_g')"/> 
      </div>
      <div class="box">
      <p>Dodaj tytuł artykułu:</p>
      <input type="text" id="tytul" name="tytul" class="s_input" required/>
      </div>
      <div class="box">
      <p>Dodaj podtytuł artykułu:</p>
      <input type="text" id="podtytul" name="podtytul" class="s_input" required/>
      </div>
      <div class="box">
      <p>Data wysłania artykułu:</p>
      <input type="date" id="czas" name="czas" required/>
      </div>
      <div class="box">
      <p>Dodaj zdjęcie do pierwszej części tekstu artykułu:</p>
      <img src="" id="img_t1" class="img_preview" >
      <input type="file" name="zdj_t1" id="zdj_t1" onchange="change_img('zdj_t1', 'img_t1')"/>
      </div>
      <div class="box">
      <p>Dodaj pierwszą część tekstu artykułu:</p>
      <textarea id="tekst_a1" name="tekst_a1" required></textarea>
      </div>
      <div class="box">
      <p>Dodaj zdjęcie do drugiej części tekstu artykułu:</p>
      <img src="" id="img_t2" class="img_preview">
      <input type="file" name="zdj_t2" id="zdj_t2" onchange="change_img('zdj_t2', 'img_t2')"/>
      </div>
      <div class="box">
      <p>Dodaj drugą część tekstu artykułu:</p>
      <textarea id="tekst_a2" name="tekst_a2" required></textarea>
      </div>
      <div class="box">
      <p>Dodaj podsumowanie:</p>
      <textarea id="podsumowanie" name="podsumowanie" required></textarea>
      </div>
      <div class="box">
      <p>Dodaj autora/ów tekstu:</p>
      <input type="text" id="autor" name="autor" class="s_input" required/>
      </div>
      <input type="submit" value="Wyślij artykuł" name="submit" class="btn"/>
    </form>
    </div>
  </body>
</html>
