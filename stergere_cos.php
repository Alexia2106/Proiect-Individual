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

if (isset($_GET['ID']) && is_numeric($_GET['ID'])) {
    $productID = $_GET['ID'];

    // Obținem informațiile despre produs din coș
    $productInfo = $_SESSION['cos'][$productID];

    // Adăugăm înapoi cantitatea în baza de date
    $newStock = $productInfo['stoc'] + $productInfo['cantitate']; // Adăugăm înapoi cantitatea corectă
    $updateStockSql = "UPDATE produse SET stoc = $newStock WHERE ID = $productID";
    
    if ($conn->query($updateStockSql) === TRUE) {
        // Ștergem produsul din coș dacă actualizarea a avut succes
        unset($_SESSION['cos'][$productID]);
        header("Location: cos.php");
        exit();
    } else {
        echo "Eroare la actualizarea stocului în baza de date: " . $conn->error;
    }
} else {
    echo "ID de produs nevalid.";
}

$conn->close();
?>
