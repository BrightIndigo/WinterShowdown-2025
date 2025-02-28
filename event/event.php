<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Winter Showdown</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="event.css">
    <script src="event.js"></script>
  </head>
  <body>
    <div class="page">
      <div id="media">
        <a href="https://www.facebook.com/profile.php?id=61571712183895"><img src="../images/icon1.png" alt="Icon 1" /></a>
        <a href="link2.html"><img src="../images/icon2.png" alt="Icon 2" /></a>
        <a href="https://discord.gg/3w6U9hZMe4"><img src="../images/icon3.png" alt="Icon 3" /></a>
        <a href="link4.html"><img src="../images/icon4.png" alt="Icon 4" /></a>
      </div>
      <div class="segment1">
        <img
          src="../images/Winter Showdown FB_BANNER.png"
          style="width: 100%; height: auto"
        />
      </div>
      <div class="segment2">
        <div class="h-sep"></div>
        <div class="btns">
          <button class="btn" onclick="redirect('regulamin.php')">Regulamin</button>
          <button class="btn" onclick="redirect('../index.php')">Główna</button>
          <?php if (isset($_SESSION['username'])): ?>
            <button class="btn" onclick="redirect('login.php?action=logout')">Wyloguj się</button>
        </div>
          <h1 style="color: white; font-family: Roboto, serif;  
        font-weight: 500;
        font-style: normal;">
        Witaj,
        <?php echo htmlspecialchars($_SESSION['username']); ?>!
        </h1>
        <?php else: ?>
          <button class="btn" onclick="redirect('login.php')">Zaloguj się</button>
          </div>
          <?php endif; ?>
        
        <div class="h-sep"></div>
      </div>
      <div class="info_event">
        <div class="address">
          <div class="address_icon"></div> 
          <p>Nadrzeczna 147, Augustów</p>
        </div>
        <div class="email">
          <div class="email_icon"></div>
          <p>aug.wintershowdown@gmail.com</p>
        </div>
      </div>
      <div class="naglowek">
        <h1 id="zmien">W dniach od 30 stycznia do 2 lutego 2025 roku Augustów...</h1> 
        <button onclick='zmien()' id="zmien2">Czytaj dalej</button>
      </div>
      <div class="segment3">
        <div class="kafelek">
          <p>Szachy</p>
          <img src="../images/szachy_info.jpg" style="width: 100%; height: auto" />
          <p>
          W ramach Augustów Winter Showdown 2025, za niespełna miesiąc rozpocznie się cykl wydarzeń dla wszystkich miłośników królewskiej gry.
          </p>
          <a href="../kafelki_info/szachy/szachy.html"><button class="k_btn">Więcej</button></a>
        </div>
        <div class="kafelek">
          <p>League of Legends</p>
          <img
            src="../images/kafelek2.webp"
            style="width: 100%; height: auto"
          />
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s.
          </p>
          <a href="../kafelki_info/lol.html"><button class="k_btn">Więcej</button></a>
        </div>
        <div class="kafelek">
          <p>Teamfight Tactics</p>
          <img src="../images/kafelek3.png" style="width: 100%; height: auto" />
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s.
          </p>
          <a href="../kafelki_info/tft.html"><button class="k_btn">Więcej</button></a>
        </div>
        <div class="kafelek">
          <p>Dart</p>
          <img src="../images/kafelek4.jpg" style="width: 100%; height: auto" />
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s.
          </p>
          <a href="../kafelki_info/dart.html"><button class="k_btn">Więcej</button></a>
        </div>
        <div class="kafelek">
          <p>Kafelek5</p>
          <img
            src="../images/our_team3.jpg"
            style="width: 100%; height: auto"
          />
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s.
          </p>
          <a href="../kafelki_info/tft.html"><button class="k_btn">Więcej</button></a>
        </div>
        <div class="kafelek">
          <p>Kafelek6</p>
          <img
            src="../images/kafelek1.webp"
            style="width: 100%; height: auto"
          />
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s.
          </p>
          <a href="../kafelki_info/tft.html"><button class="k_btn">Więcej</button></a>
        </div>
      </div>
      <div class="sponsorzy" style="--duration:30000ms; --direction:normal;" >
          <div class="zawartosc">
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>

            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span></span></div>
            <div class="sponsor"><span> </span></div>
          </div>
          <div class="fade"></div>
      </div>
    </div>
  </body>
</html>
