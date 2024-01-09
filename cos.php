<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>ReSell - Coș de cumpărături</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <!-- Your additional styles for the shopping cart page -->
    <style>
        /* Add your styles here */
        .sterge-produs-btn {
         color: #fff;
         padding: 5px 10px;
        border: none;
         text-decoration: none;
         cursor: pointer;
         border-radius: 20px;
         margin-left: 5px;
}

.sterge-produs-btn:hover {
    background-color: #CB6E51;
}

.sterge-toate-btn {
    color: #fff;
    padding: 5px 10px;
    border: none;
    text-decoration: none;
    cursor: pointer;
    border-radius: 20px;
    margin-left: 10px; /* Aici am modificat margin-left la 10px pentru a adăuga spațiu între butoane */
}

.sterge-toate-btn:hover {
    background-color: #CB6E51;
}


        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #CB6E51;
        }

        .product {
            overflow: hidden; /* Clear float */
            margin-bottom: 20px;
        }

        .product img {
            max-width: 100px;
            max-height: 100px;
            float: left;
            margin-right: 10px;
        }

        .product-details {
            float: left;
            margin-top: 10px;
        }

        .product-actions {
            float: right;
            margin-top: 10px;
        }

        .finalizare-comanda {
            color: pink;
            text-decoration: underline;
            display: block;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
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

       // Inițializare variabilă pentru calculul prețului total al comenzii
       $pretTotal = 0;

       if (isset($_SESSION['cos']) && count($_SESSION['cos']) > 0) {
           echo "<h2 style='color: #FFB6C1;'>Coș de cumpărături</h2>";

           foreach ($_SESSION['cos'] as $productID => $productInfo) {
               echo "<div class='product'>";
               
               // Adaugă imaginea lângă celelalte informații despre produs
               echo "<img src='{$productInfo['poza']}' alt='{$productInfo['nume']}' style='max-width: 100px; max-height: 100px; float: left; margin-right: 10px;'>";
            
               // Afișează celelalte informații despre produs
               // echo "<p>{$productInfo['nume']} - preț: {$productInfo['pret']} lei - Cantitate: {$productInfo['cantitate']} ";
               echo "<p>Nume: {$productInfo['nume']}</p>";
               echo "<p>Preț: {$productInfo['pret']} lei</p>";
               echo "<p>Cantitate: {$productInfo['cantitate']}</p>";
               //echo "<a href='stergere_cos.php?ID=$productID'>Șterge</a></p>";
               echo "<a href='stergere_un_produs.php?ID=$productID' class='sterge-produs-btn' style='background-color: #ffc0cb;'>-</a>";
               echo "<a href='stergere_cos.php?ID=$productID' class='sterge-toate-btn' style='background-color: #ffc0cb;'> Șterge produsul </a>";
         

               // Calculul valorii pentru produsul curent
               $valoareProdus = $productInfo['pret'] * $productInfo['cantitate'];
               echo "<p>Valoare: $valoareProdus lei</p>";

               echo "</div>";

               // Adăugare la prețul total
               $pretTotal += $valoareProdus;
           }
       
           // Afișare preț total comandă
           echo "<p style='clear: both;'>Pret total comanda: $pretTotal lei</p>";

           echo "<a class='finalizare-comanda' href='finalizare_comanda.php'>Finalizează comanda</a>";
       } else {
           echo "<p>Nu ai produse în coș.</p>";
       }


        $conn->close();
        ?>
    </div>
</body>

</html>