<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj</title>
    <script src="powrot.js"></script>
</head>
<body>
<button onclick="admin()">Powrót do menu</button>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "artykuly";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Sprawdzenie, czy przesłano ID artykułu
    if (isset($_POST['article_id']) && is_numeric($_POST['article_id'])) {
        $id = (int)$_POST['article_id'];

        // Pobranie artykułu o podanym ID
        $stmt = $conn->prepare("SELECT * FROM artykul1 WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$article) {
            die("Nie znaleziono artykułu!");
        }
    } else {
        die("Nieprawidłowe ID artykułu!");
    }
} catch (PDOException $e) {
    die("Błąd połączenia: " . $e->getMessage());
}

$conn = null;
?>
<form method="POST" enctype="multipart/form-data">
      <div class="box">
      <p>Dodaj zdjęcie artykułu ukazujące się na stronie głównej:</p>
      <input type="file" name="zdj_glowne" id="zdj_glowne"/>
      </div>
      <div class="box">
      <p>Dodaj tytuł artykułu:</p>
      <input type="text" id="tytul" name="tytul" value="<?php echo htmlspecialchars($article['tytul']); ?>" required/>
      </div>
      <div class="box">
      <p>Dodaj podtytuł artykułu:</p>
      <input type="text" id="podtytul" name="podtytul" value="<?php echo htmlspecialchars($article['podtytul']); ?>" required/>
      </div>
      <div class="box">
      <p>Data wysłania artykułu:</p>
      <input type="date" id="godzina" name="godzina" value="<?php echo htmlspecialchars($article['data']); ?>" required/>
      </div>
      <div class="box">
      <p>Dodaj zdjęcie do pierwszej części tekstu artykułu:</p>
      <input type="file" name="zdj_t1" id="zdj_t1" />
      </div>
      <div class="box">
      <p>Dodaj pierwszą część tekstu artykułu:</p>
      <textarea rows="8" cols="50" id="tekst_a1" name="tekst_a1" required><?php echo htmlspecialchars($article['tekst1']); ?></textarea>
      </div>
      <div class="box">
      <p>Dodaj zdjęcie do drugiej części tekstu artykułu:</p>
      <input type="file" name="zdj_t2" id="zdj_t2" />
      </div>
      <div class="box">
      <p>Dodaj drugą część tekstu artykułu:</p>
      <textarea rows="8" cols="50" id="tekst_a2" name="tekst_a2" required><?php echo htmlspecialchars($article['tekst2']); ?></textarea>
      </div>
      <div class="box">
      <p>Dodaj podsumowanie:</p>
      <textarea rows="8" cols="50" id="podsumowanie" name="podsumowanie" required><?php echo htmlspecialchars($article['podsumowanie']); ?></textarea>
      </div>
      <div class="box">
      <p>Dodaj autora/ów tekstu:</p>
      <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($article['autor']); ?>" required/>
      </div>
      <br /><br />
      <input type="submit" value="Wyślij artykuł" name="submit" />
    </form>    
</body>
</html>

