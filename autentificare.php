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

// Procesare formular
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        // Procesare formular de înregistrare
        $nume = $_POST["nume"];
        $prenume = $_POST["prenume"];
        $email = $_POST["email"];
        $parola = password_hash($_POST["parola"], PASSWORD_DEFAULT);

        // Inserare utilizator în baza de date
        $sql = "INSERT INTO Utilizatori (Nume, Prenume, Email, Parola) VALUES ('$nume', '$prenume', '$email', '$parola')";

        if ($conn->query($sql) === TRUE) {
            header("location: login.php");
        } else {
            echo "Eroare la înregistrare: " . $conn->error;
        }
    } 
    
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style media="screen">
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-image: url(images/fundal1.jpeg);
      background-size: cover;
    }
    .box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      padding: 40px;
      background: rgba(0, 0, 0, 0.6);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
      border-radius: 10px;
    }
    .box h2 {
      margin: 0 0 30px;
      padding: 0px;
      color: #fff;
      text-align: center;
    }
    .box .input-box {
      position: relative;
    }
    .box .input-box input {
      width: 100%;
      padding: 10px 0px;
      font-size: 16px;
      color: #fff;
      letter-spacing: 1px;
      margin-bottom: 30px;
      border: none;
      outline: none;
      background: transparent;
      border-bottom: 1px solid #fff;
    }
    .box .input-box label {
      position: absolute;
      top: 0;
      left: 0;
      letter-spacing: 1px;
      padding: 10px 0px;
      font-size: 16px;
      color: #fff;
      transition: .5s;
    }
    .box .input-box input:focus ~ label,
    .box .input-box input:valid ~ label {
      top: -18px;
      left: 0px;
      color: #03a9f4;
      font-size: 12px;
    }
    .box input[type="submit"] {
      background: transparent;
      border: none;
      outline: none;
      color: #fff;
      background: #227be3;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    .box input[type="submit"]:hover {
      background-color: #3067b9;
    }
  </style>
  <title>Inregistrare</title>
</head>
<body>


<body>
<div class="box">

    <form method="post" action="">
    <h2>Înregistrare</h2>

      <div class="input-box">
        <input type="text" name="nume" id="nume" autocomplete="off" required>
        <label for="nume">Nume: </label>
      </div>

      <div class="input-box d-flex">
        <input type="text" name="prenume" id="prenume" autocomplete="off" required>
        <label for="prenume">Prenume: </label>
      </div>


      <div class="input-box d-flex">
        <input type="email" name="email" id="email" autocomplete="off" required>
        <label for="email">Email: </label>
      </div>

      <div class="input-box d-flex">
        <input type="password" name="parola" id="parola" autocomplete="off" required>
        <label for="parola">Parola: </label>
      </div>

      <h2>
      <button type="submit" name="register">
      <a class="text-uppercase custom_orange-btn mr-3">
                Înregistreaza-te!
      </a>
      </button>
      <br>
      </br>

      <a href="login.php" class="text-uppercase mr-3">
                Login
      </a> 
  </h2>
    </form>
</body>
</html>
