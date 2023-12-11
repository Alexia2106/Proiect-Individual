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
        $sql = "INSERT INTO utilizatori (Nume, Prenume, Email, Parola) VALUES ('$nume', '$prenume', '$email', '$parola')";

        if ($conn->query($sql) === TRUE) {
            header("location: login.php");
        } else {
            echo "Eroare la înregistrare: " . $conn->error;
        }
    } elseif (isset($_POST["login"])) {
        // Procesare formular de login
        $email = $_POST["email"];
        $parola = $_POST["parola"];

        // Verificare credențiale în baza de date
        $sql = "SELECT * FROM Utilizatori WHERE Email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($parola, $row["Parola"])) {
                header("location: index.php");
            } else {
                header("location: login_pass_err.php");

            }
        } else {
            header("location: login_err.php");

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
      color: #fc5d35;
      background: #227be3;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    .box input[type="submit"]:hover {
      background-color: #fc5d35;
    }
  </style>
  <title>Login</title>
</head>
<body>
<div class="box">

    <form method="post" action="">
    <h2>Login</h2>
      <div class="input-box">
        <input type="email" name="email" id="loginEmail" autocomplete="on" required>
        <label for="loginEmail">Email: </label>
      </div>

      <div class="input-box d-flex">
        <input type="password" name="parola" id="loginParola" autocomplete="off" required>
        <label for="loginParola">Parola: </label>
      </div>

      <h2>
      <button type="submit" name="login">
      <a class="text-uppercase custom_orange-btn mr-3">
                Login
      </a>
      </button>
    <br>
    </br>
    
    <a href="autentificare.php" class="text-uppercase mr-3">
                Register
    </a>     
  </h2>
  </form>

</body>
</html>
