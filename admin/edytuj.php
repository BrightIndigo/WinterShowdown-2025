<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj</title>
    <link rel="stylesheet" href="artykuly.css">
    <script src="powrot.js"></script>
</head>
<body>
<button onclick="admin()">Powrót do menu</button>
<h1>Wybierz artykuł do edycji:</h1>
<div class='container'>
    <?php
    session_start();
    if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "artykuly";
    } else {
        $servername = "localhost";
        $username = "ah5muzaw737";
        $password = "N7d@-*32y-7CHV-NbbR";
        $db = "ah5muzaw737_";
    }
    
    
    // Połączenie z bazą danych
    $conn = new mysqli($servername, $username, $password, $db);
    
    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM artykul1";
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='large-box' style='background-image: url(../". htmlspecialchars(substr($row["zdj_m"], 3)) .")'>";
            echo "<div class='content'>";
            echo "<div class='duze'>News</div>";
            echo "<p class='b'>".htmlspecialchars($row["tytul"])."</p>";
            echo "<p class='autor'>" . htmlspecialchars($row["autor"]) . "</p>";
            echo "<form action='edytuj_input.php' method='POST'>";
            echo "<input type='hidden' name='article_id' value='". intval(htmlspecialchars($row["id"])) ."'>";
            echo "<button type='submit' class='d'>Edytuj</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    }
    $result -> free_result();
    $conn->close();

    ?>
</div>
</body>
</html>
