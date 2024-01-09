<!-- confirmare_comanda.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Adăugați aici meta, link-uri de stil, etc. -->
    <title>Confirmare comandă</title>
    <!-- Adăugați legături către stilurile CSS, Bootstrap, etc. -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- Adăugați stiluri suplimentare, dacă este nevoie -->
    <style>
        /* Adăugați stiluri specifice acestei pagini, dacă este nevoie */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #FFB6C1;
        }

        .confirmation-message {
            margin-top: 20px;
            text-align: center;
        }

        .continue-options {
            margin-top: 20px;
            text-align: center;
        }

        .continue-link {
            margin-right: 20px;
        }

        /* Adăugați stiluri pentru logo sau desene cu haine */
        .logo {
         max-width: 150px;
         margin-bottom: 20px;
         margin-left: 500px; /* Margină stânga automată */
         margin-right: 500px; /* Margină dreapta automată */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Adăugați un logo sau desene cu haine -->
        <img src="images/gifts.png" alt="Logo" class="logo">

        <h2>Comandă finalizată cu succes!</h2>

        <div class="confirmation-message">
            <!-- Afișați un mesaj de mulțumire sau alte detalii relevante -->
            <p>Vă mulțumim pentru comandă!</p>
        </div>

        <div class="continue-options">
            <!-- Adăugați link-uri pentru opțiunile de continuare -->
            <a href="index.php" class="continue-link">Mergi acasă</a>
            <a href="produse.php">Înapoi la cumpărături</a>
        </div>
    </div>
</body>

</html>
