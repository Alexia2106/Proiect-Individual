<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ID'])) {
    $productID = $_GET['ID'];

    // Obținem informațiile despre produs din baza de date
    $sql = "SELECT * FROM produse WHERE ID = $productID AND stoc > 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $productInfo = $result->fetch_assoc();

       // Adăugăm produsul în coșul de cumpărături
     
    if (!isset($_SESSION['cos'][$productID])) {
    $_SESSION['cos'][$productID] = [
        'nume' => $productInfo['Nume'],  // schimbat aici
        'pret' => $productInfo['Pret'],  // schimbat aici
        'poza' => $productInfo['Poza'],  // schimbat aici
        'cantitate' => 1
    ];
} else {
    // Creștem cantitatea dacă produsul există deja în coș
    $_SESSION['cos'][$productID]['cantitate']++;
}


        header("Location: produse.php");
        exit();
    } else {
        echo "Produsul nu este disponibil sau nu există.";
    }
} else {
    echo "Cerere nevalidă.";
}

// Închidere conexiune
$conn->close();
?>
