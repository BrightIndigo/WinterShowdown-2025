<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: event.php');
    exit();
}


$host = 'localhost';
$db_username = 'ah5muzaw737';
$db_password = 'N7d@-*32y-7CHV-NbbR';
$db_name = 'ah5muzaw737_';

$conn = new mysqli($host, $db_username, $db_password, $db_name);
//$conn = new mysqli('localhost', 'root', '', 'users');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("INSERT INTO users (username, password, is_active) VALUES (?, ?, 1)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            header('Location: login.php');
            echo "Rejestracja zakończona sukcesem. Możesz się zalogować.";
        } else {
            echo "Wystąpił błąd: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Proszę wypełnić wszystkie pola.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
    <style>
      body {
        background-color: rgb(20, 19, 19);
      }
      .container {
        width: 80vw;
        background: rgba(47, 44, 44, 0.72);
        padding: 2vh;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      }
      .container h2 {
        color: azure;
      }
      button[type="submit"],
      .login-button {
        background-color: #e42a2a; /* Kolor zielony */
        color: white;
        border: none;
        cursor: pointer;
      }

      input[type="text"],
      input[type="password"] {
        background-color: black;
        border-color: rgb(91, 90, 90);
        color: white;
      }

      button[type="submit"]:hover,
      .login-button:hover {
        background-color: #ff0000; /* Ciemniejszy zielony przy najechaniu */
      }
      a {
        color: #e42a2a;
        text-decoration: none;
      }

      .container p {
        color: white;
      }

      @media (min-width: 600px) {
        .container {
          max-width: 600px;
          margin: 2vh 10vw 2vh 10vw;
        }
        body {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
        }
      }
    </style>
</head>
<body>
    <div class="baner">
    <img
        src="../images/Winter_Showdown_napis.png"
        style="width: 40vh; height: 40vh"
      />
    </div>
    <div class="container">
        <h2>Rejestracja</h2>
        <form method="POST" action="">
            <div class="input-group">
                <input type="text" name="username" placeholder="Nazwa użytkownika" required>
                <input type="password" name="password" placeholder="Hasło" required>
                <button type="submit">Zarejestruj się</button>
            </div>
        </form>
        <p>Masz już konto? <a href="login.php">Zaloguj się</a></p>
        <a href="event.php"><p>Powrót do strony Winter Showdown</p></a>
    </div>
</body>
</html>
