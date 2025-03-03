<?php
require 'config.php';
// Połączenie z bazą danych
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
    die('Błąd połączenia: ' . $conn->connect_error);
}

// Sprawdzenie, czy użytkownik potwierdził usunięcie
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_delete'])) {
    $id = intval($_POST['article_id']);
    $del = "DELETE FROM artykul1 WHERE id=?";
    
    if ($stmt = $conn->prepare($del)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "Artykuł o ID $id został usunięty.";
        $stmt->close();
    } else {
        echo "Błąd podczas usuwania.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń</title>
    <script src="./scripts/powrot.js"></script>
    <link rel="stylesheet" href="./style/artykuly.css"> 

</head> 
<body>
    
    <div id="page">
    <div class="box1">
    <button onclick="admin()" class="exit">Powrót do menu</button>
    <h1 class="option">Wybierz artykuł do usunięcia:</h1>
    </div>
    <div class='container'>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['article_id']) && !isset($_POST['confirm_delete'])) {
            $id = intval($_POST['article_id']);
            echo "<p>Czy na pewno chcesz usunąć ten artykuł?</p>";
            echo "<form method='POST'>";
            echo "<input type='hidden' name='article_id' value='$id'>";
            echo "<button type='submit' name='confirm_delete' value='yes'>Tak, usuń artykuł</button>";
            echo "<button type='button' onclick='window.location.href=\"usun.php\"'>Nie</button>";
            echo "</form>";
        } else {
            $sql = "SELECT * FROM artykul1";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->execute();
                $articles = $stmt->get_result();
                
                if ($articles->num_rows > 0) {
                    while ($article = $articles->fetch_assoc()) {
                        echo "<div class='large-box' style='background-image: url(". htmlspecialchars($article["zdj_m"]) .")'>";
                        echo "<div class='content'>";
                        echo "<div class='duze'>News</div>";
                        echo "<p class='b'>".htmlspecialchars($article["tytul"])."</p>";
                        echo "<p class='autor'>" . htmlspecialchars($article["autor"]) . "</p>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='article_id' value='". htmlspecialchars($article["id"]) ."'>";
                        echo "<button type='submit' class='d'>Usuń</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "Brak artykułów do wyświetlenia.";
                }
                $stmt->close();
            } else {
                echo "Błąd zapytania: " . $conn->error;
            }
        }
        $conn->close();
        ?>
    </div>
    </div>
</body>
</html>

        