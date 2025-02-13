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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "artykuly";
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM artykul1");
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        foreach ($result as $row) {
            echo "<div class='large-box' style='background-image: url(". htmlspecialchars($row["zdj_m"]) .")'>";
            echo "<div class='content'>";
            echo "<div class='duze'>News</div>";
            echo "<p class='b'>".htmlspecialchars($row["tytul"])."</p>";
            echo "<p class='autor'>" . htmlspecialchars($row["autor"]) . "</p>";
            echo "<form method='POST' action='edytuj_input.php'>";
            echo "<input type='hidden' name='article_id' value='". htmlspecialchars($row["id"]) ."'>";
            echo "<button type='submit' class='d'>Edytuj</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
    }
}
    

    } catch(PDOException $e) {
        echo "Connection failed" . $e->getMessage(); 
    }
    $conn = null;
    ?>
    </div>
</body>
</html>