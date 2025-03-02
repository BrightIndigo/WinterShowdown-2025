<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skrzynka odbiorcza</title>
    <link rel="stylesheet" href="./style/skrzynka.css">
    <script src="./scripts/powrot.js"></script>
</head>
<body>
    <div id="page">
    <button onclick="admin()" class="btn">Powrót do menu</button>
    <div id="table">
        <div class="col">
    <h1>Emalie</h1>
<?php
require "./config.php";

if ($_SERVER['REMOTE_ADDR'] == '::1') {
    $conn = new mysqli('localhost', 'root', '', 'artykuly');
} else {
    $conn = new mysqli($p_servername, $p_username, $p_password, $p_db);
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "SELECT id, email FROM contact";
$emails = $conn->query($sql1);

if($emails->num_rows > 0) {
    while($row = $emails->fetch_assoc()) {
        echo $row['id'] . ". ";
        echo $row['email'];
        echo "<br>";
    }
} else {
    echo "Brak danych w bazie";
}
?>
</div>
<div class="col">
    <h1>Pytania</h1>
<?php
$sql2 = "SELECT id, pytanie FROM contact";

$questions = $conn->query($sql2);
if ($questions->num_rows > 0) {
    while($row = $questions->fetch_assoc()) {
        echo $row['id'] . ". ";
        echo $row['pytanie'];
        echo "<br>";
    }
} 
?>
</div>
<div class="col">
    <h1>Wiadomości</h1>
<?php
$sql3 = "SELECT id, wiadomosc FROM contact";

$messages = $conn->query($sql3);
if ($messages->num_rows > 0) {
    while($row = $messages->fetch_assoc()) {
        echo $row['id'] . ". ";
        echo $row['wiadomosc'];
        echo "<br>";
    }
}

$conn->close();
?>
</div>
</div>
    </div>
</body>
</html>