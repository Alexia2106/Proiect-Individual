<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificare credențiale în fișier text
    $user_file = 'utilizatori.txt';

    // Citim conținutul fișierului
    $user_data = file_get_contents($user_file);

    // Deserializăm datele într-un array
    $users = unserialize($user_data);

    // Verificăm dacă există utilizatorul și parola corespund
    if (isset($users[$username]) && $users[$username] === $password) {
        echo "Autentificare reușită!";
    } else {
        echo "Autentificare eșuată. Verificați numele de utilizator și parola.";
    }
}
?>
