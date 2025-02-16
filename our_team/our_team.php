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
    <link rel="stylesheet" href="our_team.css" />
  </head>
  <body>
    <script defer>
      document.addEventListener("click", (e) => {
        const isDropdownButton = e.target.matches("[dropdown-btn]");
        if (!isDropdownButton && e.target.closest("[dropdown]") != null) return;

        let currentDropdown;
        if (isDropdownButton) {
          currentDropdown = e.target.closest("[dropdown]");
          currentDropdown.classList.toggle("active");
        }

        document.querySelectorAll("[dropdown].active").forEach((dropdown) => {
          if (dropdown === currentDropdown) return;
          dropdown.classList.remove("active");
        });
      });
    </script>

    <div id="page">
      <div id="media">
        <a href="link1.html"><img src="../images/icon1.png" alt="Icon 1" /></a>
        <a href="link2.html"><img src="../images/icon2.png" alt="Icon 2" /></a>
        <a href="link3.html"><img src="../images/icon3.png" alt="Icon 3" /></a>
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
      <div class="separator1">
        <div class="sep"></div>
        <h3>About us</h3>
      </div>
      <div class="segment2">
        <h2>Czym jesteśmy?</h2>
        <div class="row">
          <p>
            New Generation Media to agencja medialna, która łączy lokalne
            korzenie z globalnymi ambicjami. Działamy w oparciu o zrozumienie
            specyfiki naszego regionu, jednocześnie pomagając markom i projektom
            wyjść poza lokalny rynek. Dzięki kreatywnym rozwiązaniom i
            znajomości nowoczesnych technologii wspieramy rozwój zarówno
            lokalnie, jak i na szerszym rynku.
          </p>
          <div class="city-night"></div>
        </div>
        <p>
          Walczymy z hejtem i dezinformacją, tworząc przestrzeń dla pozytywnego
          i rzetelnego przekazu. Korzystamy z innowacyjnych narzędzi, by tworzyć
          treści, które są wiarygodne, angażujące i docierają do właściwych
          odbiorców.
          <br /><br />
          Wspólnie budujemy mosty między tym, co bliskie, a tym, co dalekie – z
          pasją, technologią i odpowiedzialnością.
        </p>
        <h2>Dlaczego z tego korzystamy?</h2>
        <p>
          W New Generation Media korzystamy z nowoczesnych technologii i
          innowacyjnych strategii, aby wzmocnić Twój przekaz i dotrzeć do
          właściwych odbiorców. W szybko zmieniającym się cyfrowym świecie
          zaawansowane narzędzia i platformy medialne pozwalają nam tworzyć
          treści, które są nie tylko angażujące, ale także skuteczne i
          dopasowane do potrzeb.
          <br /><br />
          Wierzymy, że technologia może być narzędziem do wprowadzania
          pozytywnych zmian – promowania autentyczności, walki z dezinformacją i
          budowania prawdziwych więzi. Jednocześnie stawiamy na kontakt
          interpersonalny, który jest dla nas kluczowy w procesie tworzenia i
          współpracy. Dzięki temu łączymy innowacje z ludzkim podejściem,
          pomagając Twojej marce wyróżniać się na rynku, pozostając wierną swoim
          wartościom.
        </p>
        <h2>Skąd to się wzięło?</h2>
        <p>
          New Generation Media powstało jako odpowiedź na tradycyjne media,
          które często nie nadążają za dynamicznie zmieniającym się światem.
          Nasz projekt jest dziełem młodego, ambitnego zespołu, który nie czeka
          na okazje, ale sam je tworzy. Chcemy stawić czoła utartym schematom,
          wprowadzając świeże spojrzenie na komunikację i media.
          <br /><br />
          Zespół New Generation Media to ludzie, którzy nie boją się wyzwań i
          szukają innowacyjnych rozwiązań. Jesteśmy grupą pasjonatów, którzy
          wierzą, że przyszłość mediów należy do tych, którzy nie boją się wyjść
          poza utarte ramy. Nie czekamy na zmiany – to my je kreujemy,
          dostosowując się do potrzeb współczesnych odbiorców oraz współczesnego
          rynku.
        </p>
      </div>
      <div class="segment3"></div>
      <div class="segment4">
        <div class="person">
          <div class="img" id="adrian"></div>
          <div class="opis">
            <h3>Adrian Sznel</h3>
            <i>Redaktor naczelny, ojciec projektu</i>
            <p>
              Adrian to wizjoner i strateg, którego pomysły napędzają rozwój
              każdego projektu. Jako inicjator i lider zespołu, Adrian łączy
              kreatywność z biznesowym podejściem, nadając kierunek działaniom i
              motywując wszystkich do osiągania wspólnych celów. Dzięki jego
              doświadczeniu i zdolnościom analitycznym, każdy projekt zyskuje
              solidne podstawy oraz jasno wytyczoną ścieżkę rozwoju. Jego
              ulubionym mottem jest "Nie da się? To pa tera"
            </p>
          </div>
        </div>
        <div class="person">
          <div class="img" id="krzysztof"></div>
          <div class="opis">
            <h3>Krzysztof Wilgucki</h3>
            <i>Webmaster</i>
            <p>
              Krzysztof to utalentowany programista z pasją do tworzenia
              nowoczesnych i funkcjonalnych stron internetowych. Specjalizuje
              się w projektowaniu rozwiązań, które łączą estetykę z wydajnością,
              zapewniając użytkownikom doskonałe doświadczenia online. Jego
              wiedza obejmuje zarówno front-end, jak i back-end, co pozwala mu
              na kompleksowe podejście do każdego projektu. Jego ulubionym
              mottem jest "A mówiłeś, że na wczoraj nie skończę"
            </p>
          </div>
        </div>
        <div class="person">
          <div class="img" id="hubert"></div>
          <div class="opis">
            <h3>Hubert Baranowski</h3>
            <i>Marketing Manager</i>
            <p>
              Hubert to doświadczony koordynator, który z pasją i zaangażowaniem
              zarządza projektami, dbając o ich sprawny przebieg i najwyższą
              jakość realizacji. Dzięki doskonałym umiejętnościom organizacyjnym
              oraz komunikacyjnym potrafi skutecznie łączyć potrzeby klientów z
              pracą zespołu, zapewniając harmonijną współpracę i osiąganie
              zamierzonych celów. Jego ulubionym mottem jest "Ej a może jeszcze
              zaczepimy Elona Muska?"
            </p>
          </div>
        </div>
        <div class="person">
          <div class="img" id="klaudia"></div>
          <div class="opis">
            <h3>Klaudia Polak</h3>
            <i>Design Queen</i>
            <p>
              Klaudia to pasjonatka designu z wieloletnim doświadczeniem w
              tworzeniu projektów graficznych, które przyciągają uwagę i budują
              wizerunek marki. Łączy artystyczną wrażliwość z techniczną
              precyzją, dbając o każdy szczegół swoich prac. Jej specjalnością
              są nowoczesne identyfikacje wizualne, projekty logo oraz materiały
              promocyjne. Jej ulubionym mottem jest "Wracam z trzeciej pracy, a
              wy jeszcze coś ode mnie chcecie"
            </p>
          </div>
        </div>
      </div>
      <div class="segment5">
        <div class="img">
          <button class="btn">Dołącz do naszego zespołu</button>
        </div>
      </div>
    </div>
  </body>
</html>
