<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Charakterystyka Polskiego Rynku VC cz.1</title>
    <link rel="stylesheet" href="news.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
  <div class="page">
      <div id="media">
      <a href="https://www.facebook.com/profile.php?id=61571712183895"><img src="./images/icon1.png" alt="Icon 1" /></a>
        <a href="link2.html"><img src="./images/icon2.png" alt="Icon 2" /></a>
        <a href="https://discord.gg/3w6U9hZMe4"><img src="./images/icon3.png" alt="Icon 3" /></a>
        <a href="link4.html"><img src="./images/icon4.png" alt="Icon 4" /></a>
      </div>
    <?php
      session_start();
    require "./admin/config.php";
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['article_id'])) {
    $article_id = intval($_POST['article_id']);

    if ($_SERVER['REMOTE_ADDR'] == '::1') {
      $conn = new mysqli('localhost', 'root', '', 'artykuly'); 
    } else {
      $conn = new mysqli($p_servername, $p_username, $p_password, $p_db); 
    }
    
    if ($conn->connect_error) {
        die('Błąd połączenia: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM artykul1 WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $article_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $article = $result->fetch_assoc();
            echo "<div class='tytol'>";
            echo"<h1>".htmlspecialchars($article["tytul"])."</h1>";
            echo "</div>";
            echo "<div class='podtytol'>";
            echo "<h2>".htmlspecialchars($article["podtytul"])."</h2>";
            echo "<p>".htmlspecialchars($article["czas"])."</p>";
            echo "</div>";
            echo "<div class='content'>";
            echo "<div class='tresc'>";
            echo "<div class='box'>";
            echo "<img src='".htmlspecialchars(substr($article["zdj1"], 3))."' />";
            echo "<p>".htmlspecialchars($article["tekst1"])."</p>";
            echo "</div>";
            echo "<div class='box'>";
            echo "<img src='".htmlspecialchars(substr($article["zdj2"], 3))."' />";
            echo "<p>".htmlspecialchars($article["tekst2"])."</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class='podsumowanie'>";
            echo "<p>".htmlspecialchars($article["podsumowanie"])."</p>";
            echo "</div>";
            echo "<div class='autor'><p>".htmlspecialchars($article["autor"])."</p></div>";
            echo "</div>";
            echo "<div class='powrot'>";
            echo "<a href='./index.php'><button class='btn'>Powrót do strony głównej</button></a>";
            echo "</div>";
        } else {
            echo "Artykuł nie został znaleziony.";
        }
        $stmt->close();
    } else {
        echo "Błąd zapytania: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
</div>

    