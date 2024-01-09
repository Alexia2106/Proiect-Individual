<?php
// Afișează erorile pentru a ajuta la depanare
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Începe sesiunea
session_start();

// Verifică dacă există o sesiune activă pentru utilizator
if (!isset($_SESSION['user_id'])) {
    // Redirectează către pagina de autentificare dacă utilizatorul nu este autentificat
    header('Location: autentificare.php');
    exit();
}
?>
