<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj</title>
    <script src="edytuj.js"></script>
</head>
<body>
<button onclick="edytuj()">Powrót do menu edycji</button>
    <?php 
    $id = intval($_POST["article_id"]);
    
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "artykuly";
    } else {
        $servername = "localhost";
        $username = "ah5muzaw737";
        $password = "N7d@-*32y-7CHV-NbbR";
        $db = "ah5muzaw737_";
    }
    $conn = new mysqli($servername, $username, $password, $db);

    if($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `artykul1` WHERE id=$id";
    $result = $conn->query($sql);
    if ($result){
    while($row = $result->fetch_assoc()) {
        echo "id: ".$row['id'].", zdj_m: ".$row['zdj_m'].", tytul: ".$row['tytul'].", autor: ".$row['autor'].", podtytul: ".$row['podtytul'].", data: ".$row['data'].", zdj1: ".$row['zdj1'].", tekst1: ".$row['tekst1'].", zdj2: ".$row['zdj2'].", tekst2: ".$row['tekst2'].", podsumowanie: ".$row['podsumowanie'];
    
        echo "<form method='POST' enctype='multipart/form-data'>";
        echo "<div class='box'>";
        echo "<p>Dodaj zdjęcie artykułu ukazujące się na stronie głównej:</p>";
        echo "<input type='file' name='zdj_glowne' id='zdj_glowne' />";
        echo "</div>";
        echo "<div class='box'>";
        echo "<p>Dodaj tytuł artykułu:</p>";
        echo "<input type='text' id='tytul' name='tytul' value=". $row['tytul'] ." required/>";
        echo "</div>";
        echo "<div class='box'>";
        echo "<p>Dodaj podtytuł artykułu:</p>";
        echo "<input type='text' id='podtytul' name='podtytul' value=". $row['podtytul'] ." required/>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Data wysłania artykułu:</p>"; 
        echo "<input type='date' id='godzina' name='godzina' value=". $row['data'] ." required/>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj zdjęcie do pierwszej części tekstu artykułu:</p>"; 
        echo "<input type='file' name='zdj_t1' id='zdj_t1' />"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj pierwszą część tekstu artykułu:</p>"; 
        echo "<textarea rows='8' cols='50' id='tekst_a1' name='tekst_a1' required>".$row['tekst1']."</textarea>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj zdjęcie do drugiej części tekstu artykułu:</p>"; 
        echo "<input type='file' name='zdj_t2' id='zdj_t2' />"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj drugą część tekstu artykułu:</p>"; 
        echo "<textarea rows='8' cols='50' id='tekst_a2' name='tekst_a2' required>".$row['tekst2']."</textarea>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj podsumowanie:</p>"; 
        echo "<textarea rows='8' cols='50' id='podsumowanie' name='podsumowanie' required>".$row['podsumowanie']."</textarea>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj autora/ów tekstu:</p>"; 
        echo "<input type='text' id='autor' name='autor' value=".$row['autor']." required/>"; 
        echo "</div>";
        echo "<br /><br />"; 
        echo "<input type='submit' value='Wyślij artykuł' name='submit' />"; 
        echo "</form>";
    }
}


    ?>
</body>
</html>