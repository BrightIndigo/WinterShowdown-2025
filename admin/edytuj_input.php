<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj</title>
    <script src="./scripts/edytuj.js"></script>
    <link rel="stylesheet" href="./style/edytuj_input.css">
</head>
<body>
    <div id="page">
<button onclick="edytuj()" class="btn">Powrót do menu edycji</button>
    <?php 
    $id = intval($_POST["article_id"] ?? 0);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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


        if (isset($_POST["submit"])) {  
            $upload_dir = '../images/';

            if (!empty($_FILES['zdj_glowne']['name'])) {
                $zdj_glowne = $upload_dir . basename($_FILES['zdj_glowne']['name']);
                if (move_uploaded_file($_FILES['zdj_glowne']['tmp_name'], $zdj_glowne)) {
                    echo "Zdjęcie główne przesłane pomyślnie.<br>";
                } else {
                    echo "Błąd przesyłania zdjęcia głównego.<br>";
                }
            } else {
                $zdj_glowne = $_POST['zdj_m_bez_zmian'] ?? ''; 
            }
        
            // Sprawdzenie i zapis zdjęcia t1
            if (!empty($_FILES['zdj_t1']['name'])) {
                $zdj_t1 = $upload_dir . basename($_FILES['zdj_t1']['name']);
                if (move_uploaded_file($_FILES['zdj_t1']['tmp_name'], $zdj_t1)) {
                    echo "Zdjęcie t1 przesłane pomyślnie.<br>";
                } else {
                    echo "Błąd przesyłania zdjęcia t1.<br>";
                }
            } else {
                $zdj_t1 = $_POST['zdj_t1_bez_zmian'] ?? ''; 
            }
        
            // Sprawdzenie i zapis zdjęcia t2
            if (!empty($_FILES['zdj_t2']['name'])) {
                $zdj_t2 = $upload_dir . basename($_FILES['zdj_t2']['name']);
                if (move_uploaded_file($_FILES['zdj_t2']['tmp_name'], $zdj_t2)) {
                    echo "Zdjęcie t2 przesłane pomyślnie.<br>";
                } else {
                    echo "Błąd przesyłania zdjęcia t2.<br>";
                }
            } else {
                $zdj_t2 = $_POST['zdj_t2_bez_zmian'] ?? ''; 
            }

            
            
            #echo "id artykułu to: ".intval($_POST['id'])."";
            $sql = "UPDATE artykul1 SET zdj_m = ?, zdj1 = ?, zdj2 = ?, tytul = ?, podtytul = ?, czas = ?, tekst1 = ?, tekst2 = ?, podsumowanie = ?, autor = ?  WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssi", $zdj_glowne, $zdj_t1, $zdj_t2, $_POST['tytul'], $_POST['podtytul'], $_POST['czas'], $_POST['tekst1'], $_POST['tekst2'], $_POST['podsumowanie'], $_POST['autor'], $_POST['id']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Edycja przebiegła pomyślnie!";
            } else {
                echo "Coś poszło nie tak...";
            }

            $stmt->close();
            $conn->close();

/*
            echo $_POST['podtytul'];
            echo $_POST['czas'];
            echo $_POST['tekst1'];
            echo $_POST['tekst2'];
            echo $_POST['podsumowanie'];
            echo $_POST['autor'];
  */
            }
    } 

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
        echo "<form method='POST' enctype='multipart/form-data'>";
        echo "<div class='box'>";
        echo "<p>Dodaj zdjęcie artykułu ukazujące się na stronie głównej:</p>";
        if(!empty($row['zdj_m'])) {
            echo "<img src='".htmlspecialchars($row['zdj_m'], ENT_QUOTES)."' alt='Aktualne zdjęcie' class='zdj_m' id='preview'<br><br>";
            echo "<input type='hidden' name='zdj_m_bez_zmian' value='".$row['zdj_m']."'<br><br>";
        } 
        echo '<input type="file" onchange="img_change(\'zdj_glowne\', \'preview\')" name="zdj_glowne" id="zdj_glowne" accept="image/*"/>';
        echo "</div>";
        echo "<div class='box'>";
        echo "<p>Dodaj tytuł artykułu:</p>";
        echo "<input type='text' class='s_input' id='tytul' name='tytul' value='". htmlspecialchars($row['tytul'], ENT_QUOTES)."' required/>";
        echo "</div>";
        echo "<div class='box'>";
        echo "<p>Dodaj podtytuł artykułu:</p>";
        echo "<input type='text' class='s_input' id='podtytul' name='podtytul' value='". htmlspecialchars($row['podtytul'], ENT_QUOTES) ."' required/>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Data wysłania artykułu:</p>"; 
        echo "<input type='date' id='godzina' name='czas' value='". htmlspecialchars($row['czas']) ."' required/>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj zdjęcie do pierwszej części tekstu artykułu:</p>"; 
        if(!empty($row['zdj1'])) {
            echo "<img src='".htmlspecialchars($row['zdj1'], ENT_QUOTES)."' alt='Aktualne zdjęcie' class='zdj_m' id='preview1'<br><br>";
            echo "<input type='hidden' name='zdj_t1_bez_zmian' value='".$row['zdj1']."'<br><br>";
        } 
        echo '<input type="file" onchange="img_change(\'zdj_t1\', \'preview1\')" name="zdj_t1" id="zdj_t1" accept="image/*"/>';
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj pierwszą część tekstu artykułu:</p>"; 
        echo "<textarea rows='8' cols='50' id='tekst_a1' name='tekst1' required>".htmlspecialchars($row['tekst1'], ENT_QUOTES)."</textarea>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj zdjęcie do drugiej części tekstu artykułu:</p>"; 
        if(!empty($row['zdj2'])) {
            echo "<img src='".htmlspecialchars($row['zdj2'], ENT_QUOTES)."' alt='Aktualne zdjęcie' class='zdj_m' id='preview2'<br><br>";
            echo "<input type='hidden' name='zdj_t2_bez_zmian' value='".$row['zdj2']."'<br><br>";
        } 
        echo '<input type="file" onchange="img_change(\'zdj_t2\', \'preview2\')" name="zdj_t2" id="zdj_t2" accept="image/*"/>';
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj drugą część tekstu artykułu:</p>"; 
        echo "<textarea rows='8' cols='50' id='tekst_a2' name='tekst2' required>".htmlspecialchars($row['tekst2'], ENT_QUOTES)."</textarea>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj podsumowanie:</p>"; 
        echo "<textarea rows='8' cols='50' id='podsumowanie' name='podsumowanie' required>".htmlspecialchars($row['podsumowanie'], ENT_QUOTES)."</textarea>"; 
        echo "</div>";
        echo "<div class='box'>"; 
        echo "<p>Dodaj autora/ów tekstu:</p>"; 
        echo "<input type='text' class='s_input' id='autor' name='autor' value='".htmlspecialchars($row['autor'], ENT_QUOTES)."' required/>"; 
        echo "</div>";
        echo "<br /><br />"; 
        echo "<input type='hidden' name='id' value='". htmlspecialchars($row["id"]) ."'>";
        echo "<input type='submit' value='Wyślij artykuł' name='submit' class='btn'/>"; 
        echo "</form>";
    }
}
    

    ?>
    </div>
</body>
</html>