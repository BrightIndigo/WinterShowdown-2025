<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('SERVER', 'SERVER', 'SERVER', 'SERVER');
    //$conn = new mysqli('localhost', 'root', '', 'users');

    if ($conn->connect_error) {
        die("Połączenie nieudane: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header('Location: event.php');
            exit();
        } else {
            echo "<p>Nieprawidłowe hasło.</p>";
        }
    } else {
        echo "<p>Użytkownik nie istnieje.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css" />
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
      <h2>Logowanie</h2>
      <form method="POST" action="">
        <div class="input-group">
          <input
            type="text"
            name="username"
            placeholder="Nazwa użytkownika"
            required
          />
          <input type="password" name="password" placeholder="Hasło" required />
          <button type="submit" class="login-button">Zaloguj się</button>
        </div>
      </form>
      <p>Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
		<a href="event.php"><p>Powrót do strony Winter Showdown</p></a>
    </div>
  </body>
</html>
