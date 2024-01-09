<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proiect";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune esuata: " . $conn->connect_error);
}




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $nume = $_POST["nume"];
    $prenume = $_POST["prenume"];
    $email = $_POST["email"];
    $parola = password_hash($_POST["parola"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilizatori (Nume, Prenume, Email, Parola) VALUES ('$nume', '$prenume', '$email', '$parola')";

    if ($conn->query($sql) === TRUE) {
        header("location: login.php");
        exit();
    } else {
        echo "Eroare la înregistrare: " . $conn->error;
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
    <title>ReSell-Inregistrare</title>

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
    </style>
</head>

<body>
    <h2>Înregistrare</h2>
    <?php if (isset($registrationError)) { echo "<p style='color: #cb6e51;'>$registrationError</p>"; } ?>
    <form method="post" action="">
        <label for="nume">Nume: </label>
        <input type="text" name="nume" required><br>

        <label for="prenume">Prenume: </label>
        <input type="text" name="prenume" required><br>

        <label for="email">Email: </label>
        <input type="email" name="email" required><br>

        <label for="parola">Parola: </label>
        <input type="password" name="parola" required><br>

        <button type="submit" name="register">Înregistrează-te</button>
    </form>
</body>

</html>
