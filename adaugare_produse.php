<?php
// Verifică dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectare la baza de date (actualizează cu detaliile tale)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proiect";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifică dacă conectarea a fost realizată cu succes
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    // Colectare date din formular
    $denumire = $_POST["nume_produs"];
    $pret = $_POST["pret_produs"];
    $imagine = $_POST["poza"];

    // SQL pentru inserare în baza de date
    $sql = "INSERT INTO produse (Nume, Pret, Poza) VALUES ('$denumire', $pret, '$imagine')";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "" . $conn->error;
    }

    // Închide conexiunea la baza de date
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă Produs</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdf5e6; /* Light Peach */
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            margin-top: 50px;
            color: #cb6e51; /* Dark Peach */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #cb6e51; /* Dark Peach */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #cb6e51; /* Dark Peach */
        }
    </style>
</head>

<body>
    <h2>Adaugă un nou produs</h2>

    <form action="adaugare_produse.php" method="post">
        <label for="denumire">Denumire:</label>
        <input type="text" id="nume_produs" name="nume_produs" required>

        <label for="pret">Preț:</label>
        <input type="text" id="pret_produs" name="pret_produs" required>

        <label for="imagine">Imagine (Calea către imagine):</label>
        <input type="text" id="poza" name="poza" required>

        <button type="submit">Adaugă Produs</button>
    </form>
</body>

</html>
