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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
  $email = $_POST["email"];
  $parola = $_POST["parola"];

  $sql = "SELECT * FROM utilizatori WHERE Email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($parola, $row["Parola"])) {
          $_SESSION['user_id'] = $row['ID'];
          header("location: index.php");
          exit();
      } else {
          $loginError = "Parolă incorectă.";
      }
  } else {
      $loginError = "Adresă de email inexistentă.";
  }
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReSell-Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Owl Carousel stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive styles -->
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

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
            max-width: 600px;
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

        input,
        textarea {
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
        }

        button:hover {
            background-color: #cb6e51; /* Dark Peach */
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #555; /* Gray */
        }

        a {
            color: #cb6e51; /* Dark Peach */
        }

        a:hover {
            color: #cb6e51; /* Dark Peach */
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($loginError)) { echo "<p style='color: #cb6e51;'>$loginError</p>"; } ?>
    <form method="post" action="">
        <label for="email">Email: </label>
        <input type="email" name="email" required><br>

        <label for="parola">Parola: </label>
        <input type="password" name="parola" required><br>

        <button type="submit" name="login">Login</button>
    </form>
    <p>Nu ai un cont? <a href="autentificare.php">Înregistrează-te aici</a>.</p>
</body>

</html>
