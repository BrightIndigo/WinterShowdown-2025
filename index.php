<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Główna</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="smallmobileindex.css" />
    <script src="index.js"></script>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <div id="page">
      <div id="media">
        <a href="link1.html"><img src="./images/icon1.png" alt="Icon 1" /></a>
        <a href="link2.html"><img src="./images/icon2.png" alt="Icon 2" /></a>
        <a href="link3.html"><img src="./images/icon3.png" alt="Icon 3" /></a>
        <a href="link4.html" id="last_icon"
          ><img src="./images/icon4.png" alt="Icon 4"
        /></a>
      </div>
      <div class="segment1">
        <img id="baner" src="./images/new_horizon.png" />



      <div class="menu" dropdown>
        <div class="menu-item">
          <a href="index.php">STRONA GŁÓWNA</a>
        </div>
        <div class="menu-item">
            <a href="./contact_us/contact_us.php">KONTAKT</a>
        </div>
        <div class="menu-item" dropdown>
          <a class="link" dropdown-btn>WIĘCEJ</a>
          <div class="links">
            <a href="./our_team/our_team.php" class="link">NASZ ZESPÓŁ</a>
          </div>
        </div>
      </div>

        <img id="magnifier" src="./images/icon5.png" />
      </div>

      <div class="separator2">
        <div class="sep"></div>
        <h3>Wydarzenia</h3>
      </div>

      <div id="segment3">
          <div class="box1">
            <div class="d_c_position">
              <p class="date">30 Sty - 2 Lut 2025</p>
              <div class="categories">
                <div class="row">
                  <div class="category"><p class="violet">E-sport</p></div>
                  <div class="category"><p class="violet">Rozrywka</p></div>
                </div>
                <div class="row">
                  <div class="category"><p class="violet">Event</p></div>
                  <div class="category"><p class="violet">Info</p></div>
                </div>
              </div>
            </div>
            <h2 class="violet">Winter Showdown</h2>
            <h3 class="violet">Augustów</h3>
            <p class="violet">
              Za niespełna miesiąc Augustów stanie się<br />
              centrum różnorodnych form rozrywki!
            </p>
            <button class="btn" onclick="goToEvent()">Więcej</button>
          </div>

        <div class="sep2"></div>
        <div class="box2">
          <div class="d_c_position">
            <p class="date">05 Cze 2024</p>
            <div class="categories2">
              <div class="row">
                <div class="category"><p class="violet">VC</p></div>
                <div class="category"><p class="violet">University</p></div>
              </div>
              <div class="row">
                <div class="category"><p class="violet">Course</p></div>
                <div class="category"><p class="violet">Mod</p></div>
              </div>
            </div>
          </div>

          <h2 class="violet">EEC Startup Challenge</h2>
          <h3 class="violet">Online</h3>
          <p class="violet">
            Więcej informacji  <br />
            wkrótce!
          </p>
          <button class="btn">Więcej</button>
        </div>
      </div>

      <div class="separator2">
        <div class="sep"></div>
        <h3>Artykuły</h3>
      </div>
      <div class='container'>
      <?php 

        // Połączenie z bazą danych
        //$conn = new mysqli('localhost', 'ah5muzaw737', 'N7d@-*32y-7CHV-NbbR', 'ah5muzaw737_'); 
        $conn = new mysqli('localhost', 'root', '', 'artykuly'); 
        if ($conn->connect_error) {
            die('Błąd połączenia: ' . $conn->connect_error);
        }

        // Zapytanie, aby pobrać artykuły z tabeli artykul1
        $sql = "SELECT * FROM artykul1";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->execute();
            $articles = $stmt->get_result();
            $count = $articles->num_rows;

            if ($count > 0) {
                // Iteracja po artykułach i wyświetlanie
                while ($article = $articles->fetch_assoc()) {
                  echo "<div class='large-box' style='background-image: url(". htmlspecialchars(substr($article["zdj_m"], 3)) .")'>";
                  echo "<div class='content'>";
                  echo "<div class='duze'>News</div>";
                  echo "<p class='b'>".htmlspecialchars($article["tytul"])."</p>";
                  echo "<p class='autor'>" . htmlspecialchars($article["autor"]) . "</p>";
                  echo "<form action='artykul.php' method='POST'>";
                  echo "<input type='hidden' name='article_id' value='". htmlspecialchars($article["id"]) ."'>";
                  echo "<button type='submit' class='d'>ZOBACZ CAŁOŚĆ</button>";
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

        $conn->close();
      ?>
        </div>
      <div class="autor_strony">
        <img src="./images/programmer.png">
        <button id="autor_strony">Autor strony</button>
      </div>
    </div>
  </body>
</html>
