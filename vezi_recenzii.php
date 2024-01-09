<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>Vezi Recenzii</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }

        h2 {
            color: #CB6E51;
            margin-top: 50px;
        }

        .recenzie-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .recenzie {
            max-width: 300px;
            background-color: #E8C39E	;
            padding: 15px;
            margin: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        strong {
            color: #CB6E51;
        }

        a {
            text-decoration: none;
            color: #CB6E51;
        }

        a:hover {
            text-decoration: underline;
        }

        .oval-button {
            background-color: #CB6E51;
            color: #fff;
            padding: 20px 40px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 20px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .oval-button:hover {
            background-color: #975638;
        }
    </style>
</head>

<body>
    <h2>Recenzii existente</h2>

    <?php
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

    // Selectează toate recenziile din baza de date
    $sql = "SELECT * FROM recenzii ORDER BY data_adaugare DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afișează recenziile într-un format potrivit
        echo '<div class="recenzie-container">';
        while ($row = $result->fetch_assoc()) {
            echo "<div class='recenzie'><p><strong>Recenzie:</strong> {$row['recenzie']}<br><strong>Data adăugării:</strong> {$row['data_adaugare']}<br><strong>Nume:</strong> {$row['nume']}</p></div>";
        }
        echo '</div>';
    } else {
        echo "<p>Nu există recenzii disponibile.</p>";
    }

    // Închide conexiunea la baza de date
    $conn->close();
    ?>

    <a class="oval-button" href="produse.php">Mergi la cumpărături</a>
</body>

</html>
