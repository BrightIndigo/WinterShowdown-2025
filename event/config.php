<?php
// Tworzenie połączenia
$conn = new mysqli('localhost', 'ah5muzaw737', 'N7d@-*32y-7CHV-NbbR', 'ah5muzaw737_');
$conn = new mysqli('localhost', 'root', '', 'users');

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}
echo "Połączenie z bazą danych powiodło się.";

?>
