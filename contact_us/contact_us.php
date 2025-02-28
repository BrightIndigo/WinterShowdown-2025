<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our team</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="contact_us.css" />
    <script src="./contact_us.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div id="page">
      <div id="media">
        <a href="https://www.facebook.com/profile.php?id=61571712183895"><img src="../images/icon1.png" alt="Icon 1" /></a>
        <a href="link2.html"><img src="../images/icon2.png" alt="Icon 2" /></a>
        <a href="https://discord.gg/3w6U9hZMe4"><img src="../images/icon3.png" alt="Icon 3" /></a>
        <a href="link4.html" id="last_icon"
          ><img src="../images/icon4.png" alt="Icon 4" />
        </a>
      </div>
      <div class="segment1">
        <img id="baner" src="../images/new_horizon.png" />



      <div class="menu" dropdown>
        <div class="menu-item">
          <a href="../index.php">STRONA GŁÓWNA</a>
        </div>
        <div class="menu-item">
            <a href="../contact_us/contact_us.php">KONTAKT</a>
        </div>
        <div class="menu-item" dropdown>
          <a class="link" dropdown-btn>WIĘCEJ</a>
          <div class="links">
            <a href="../our_team/our_team.php" class="link">NASZ ZESPÓŁ</a>
          </div>
        </div>
      </div>

        <img id="magnifier" src="../images/icon5.png" />
      </div>
      <div class="segment2">
        <div class="box1">
          <p>
            Chcesz dowiedzieć się więcej o naszych usługach, nawiązać współpracę
            lub podzielić się swoją opinią? Jesteśmy otwarci na rozmowę!
            Skontaktuj się z nami, a nasz zespół z przyjemnością odpowie na
            Twoje pytania i pomoże w realizacji Twoich projektów, lub pójdziemy
            na wojnę z hejtem, który zauważyłeś
          </p>
        </div>
        <div class="box2">
          <p>Adres e-mail: kontakt@newgenerationmedia.com</p>
          <p>
            Active Structure Adrian Sznel ul. Kościuszki 29a 16-300 Augustów
          </p>
          <p class="b2">
            Jesteśmy również obecni w mediach społecznościowych, gdzie możesz
            śledzić naszą działalność i być na bieżąco z najnowszymi projektami.
          </p>
        </div>
        <div class="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2353.79361631323!2d22.96775699411832!3d53.84653456612196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e051073a33d039%3A0x54e5fb1d6cfcba0c!2sKo%C5%9Bciuszki%2029A%2C%2016-300%20August%C3%B3w!5e0!3m2!1spl!2spl!4v1735405868713!5m2!1spl!2spl"
            width="100%"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
      <div class="segment3">
        <h1>Lub skontatuj się z nami przez formularz:</h1>
        <form>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adres email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nie udostępnimy twojego adresu e-mail nikomu innemu.</div>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pytanie</label>
            <input type="text" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Wiadomość</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Wyślij</button>

          <div id="emailHelp2" class="form-text">Skontaktujemy się z tobą tak szybko jak to możliwe!</div>
        </form>
      </div>
    </div>
  </body>
</html>
