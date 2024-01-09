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

    if (isset($_SESSION['cos'][$productID])) {
        // Șterge un produs
        if ($_SESSION['cos'][$productID]['cantitate'] > 1) {
            $_SESSION['cos'][$productID]['cantitate']--;
        } else {
            // Dacă avem doar un produs, îl ștergem complet
            unset($_SESSION['cos'][$productID]);
        }

        header("Location: cos.php");
        exit();
    } else {
        echo "Produsul nu există în coș.";
    }
} else {
    echo "Cerere nevalidă.";
}


$conn->close();
?>
