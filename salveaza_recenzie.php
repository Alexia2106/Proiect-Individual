<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>Recenzii</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #E8C39E	;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .success-message {
            text-align: center;
            color: #CB6E51;
            font-size: 24px;
            margin-top: 20px;
        }

        .buttons-container {
            text-align: center;
            margin-top: 20px;
        }

        .oval-button {
            background-color: #CB6E51;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 20px;
            margin-right: 15px;
            transition: background-color 0.3s;
        }

        .oval-button:hover {
            background-color: #E8C39E	;
        }
    </style>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectare la baza de date
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proiect";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificare conexiune
    if ($conn->connect_error) {
        die("Conexiune esuata: " . $conn->connect_error);
    }

    // Preia datele trimise prin POST
    $nume = $_POST["nume"];
    $recenzie = $_POST["recenzie"];

    // Salvează recenzia în baza de date
    $sql = "INSERT INTO recenzii (nume, recenzie, data_adaugare) VALUES (?, ?, NOW())";

    // Pregătește declarația SQL și verifică dacă are erori
    if ($stmt = $conn->prepare($sql)) {
        // Leagă parametrii și verifică dacă are erori
        if ($stmt->bind_param("ss", $nume, $recenzie)) {
            // Execută declarația și verifică dacă are erori
            if ($stmt->execute()) {
                // Afișează mesajul de succes
                echo "Recenzia a fost adăugată cu succes!";
            } else {
                // Eroare la execuția declarației
                echo "Eroare la execuția declarației: " . $stmt->error;
            }
        } else {
            // Eroare la legarea parametrilor
            echo "Eroare la legarea parametrilor: " . $stmt->error;
        }

        // Închide declarația
        $stmt->close();
    } else {
        // Eroare la pregătirea declarației SQL
        echo "Eroare la pregătirea declarației SQL: " . $conn->error;
    }

    // Închide conexiunea la baza de date
    $conn->close();
} else {
    // Răspuns pentru cereri neașteptate
    http_response_code(400);
    echo "Eroare: Cerere neașteptată!";
}
?>


    <div class="buttons-container">
        <a class="oval-button" href="produse.php">Mergi la cumpărături</a>
        <a class="oval-button" href="vezi_recenzii.php">Vezi toate recenziile</a>
    </div>
</body>

</html>
