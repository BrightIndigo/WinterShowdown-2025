<?php
include 'config.php';

if (isset($_GET['code'])) {
    $activation_code = $_GET['code'];

    // Sprawdzenie kodu aktywacyjnego
    $sql = "SELECT id FROM users WHERE activation_code = ? AND is_active = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $activation_code);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Aktywacja konta
        $sql = "UPDATE users SET is_active = 1, activation_code = NULL WHERE activation_code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $activation_code);
        if ($stmt->execute()) {
            echo "Konto zostało pomyślnie aktywowane! Możesz teraz <a href='login.php'>zalogować się</a>.";
        } else {
            echo "Błąd podczas aktywacji konta.";
        }
    } else {
        echo "Nieprawidłowy kod aktywacyjny lub konto już zostało aktywowane.";
    }

    $stmt->close();
} else {
    echo "Brak kodu aktywacyjnego.";
}

$conn->close();
?>
