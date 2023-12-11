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
</head>
<body>
    <h2>Adaugă un nou produs

    <form action="adaugare_produse.php" method="post">
        <label for="denumire">Denumire:</label>
        <input type="text" id="nume_produs" name="nume_produs" required>
        
        <label for="pret">Preț:</label>
        <input type="text" id="pret_produs" name="pret_produs" required>

        <label for="imagine">Imagine (Calea către imagine):</label>
        <input type="text" id="poza" name="poza" required>

        <button type="submit">Adaugă Produs</button>
    </form>
</h2>
</body>
</html>
