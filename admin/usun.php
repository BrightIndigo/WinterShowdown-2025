<?php
// Połączenie z bazą danych
$conn = new mysqli('localhost', 'root', '', 'artykuly');
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
</head>
<body>
<button onclick="admin()">Powrót do menu</button>
    <h1>Wybierz artykuł do usunięcia:</h1>
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
                        echo "<div class='large-box' style='background-image: url(../images/". htmlspecialchars($article["zdj_m"]) .")'>";
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
    <style>
              .container {
    display: grid;
    grid-template-columns: repeat(
      auto-fill,
      minmax(300px, 1fr)
    ); /* Adjust columns based on available space */
    gap: 1rem; /* Space between items */
    align-items: stretch;
    height: 100%; /* Adjust height as needed */
    margin-left: 10vw;
    margin-right: 10vw;
  }

  .large-box,
  .small-box {
    background-size: cover; /* Ensure the image covers the entire container */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Prevent the image from repeating */
    color: white;
  }

  .large-box {
    background-color: #5d1464;
    height: 300px; /* Adjust as needed */
  }

  .large-box .content {
    height: 80%;
    width: 90%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    padding-left: 10%;
    color: rgb(255, 255, 255);
    text-shadow: #000000 1px 1px 2px;
    gap: 3%;
  }

  .large-box .content .duze {
    margin: 0;
    padding: 1vh;
    font-size: 1.5vw;
    background-color: #740c7e;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .large-box .content .b {
    margin: 0;
    padding: 0;
    font-size: 2.5vw;
    text-wrap: wrap;
  }

  .large-box .content .autor {
    margin: 0;
    padding: 0;
    font-size: 1.1vw;
  }

  .large-box .content .d {
    padding: 2vh;
    font-size: 1.2vw;
    background-color: #740c7e;
    border: none;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .large-box .content button {
    margin-bottom: 10%;
  }

  .small-container {
    flex: 2; /* Smaller boxes fit into the remaining space */
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Two columns */
    grid-gap: 1rem; /* Space between smaller boxes */
  }

  .small-box {
    background-color: #dbdada;
    height: 18rem;
  }

  .small-box .content {
    height: 100%;
    width: 90%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    padding-left: 10%;
    color: white;
    text-wrap: wrap;
  }

  .small-box .content .duze {
    text-wrap: wrap;
    font-size: 150%;
    margin-bottom: 4%;
  }

  .small-box .content .autor {
    margin: 0;
    padding: 0;
    font-size: 80%;
    margin-bottom: 10%;
  }

        </style>
<script>
      function admin() {
        window.location.replace("http://localhost/kod/Event/admin/admin.php");
        //window.location.replace("https://5muza.waw.pl/admin/dodaj.php");
      }
    </script>

</body>
</html>

        