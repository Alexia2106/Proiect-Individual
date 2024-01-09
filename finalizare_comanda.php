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

// Calculul prețului total
$pretTotal = 0;
foreach ($_SESSION['cos'] as $productID => $productInfo) {
    $pretTotal += $productInfo['pret'] * $productInfo['cantitate'];
}

// Verificăm modalitatea de plată selectată
$metodaPlata = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['metoda_plata'])) {
    $metodaPlata = $_POST['metoda_plata'];
}

// Verificăm dacă formularul de finalizare a comenzii a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['finalizare_comanda'])) {
    // Verificăm stocul înainte de finalizarea comenzii
    $stockError = false;
    foreach ($_SESSION['cos'] as $productID => $productInfo) {
        $sql = "SELECT stoc FROM produse WHERE ID = $productID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $stockInfo = $result->fetch_assoc();
            $currentStock = $stockInfo['stoc'];

            if ($currentStock < $productInfo['cantitate']) {
                $stockError = true;
                echo "Produsul '{$productInfo['nume']}' nu mai este disponibil în stocul suficient. ";
            }
        }
    }

    if (!$stockError) {
        // După procesarea comenzii, ștergem coșul de cumpărături și actualizăm stocul în baza de date
        foreach ($_SESSION['cos'] as $productID => $productInfo) {
            $newStock = $currentStock - $productInfo['cantitate'];
            $updateStockSql = "UPDATE produse SET stoc = $newStock WHERE ID = $productID";
            $conn->query($updateStockSql);
        }

        unset($_SESSION['cos']);

        // Redirectează utilizatorul către pagina de confirmare a comenzii
        header("Location: confirmare_comanda.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Adăugați aici meta, link-uri de stil, etc. -->

    <title>ReSell - Finalizare comandă</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <!-- Additional styles for the order completion page -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #FFB6C1;
        }

        label {
            color: #FFB6C1;
            margin-bottom: 0.5rem;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.375rem 0.75rem;
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        h3 {
            color: #FFB6C1;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            color: #fff;
            background-color: #FF69B4;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #FF1493;
        }

        .metoda-plata {
            margin-top: 20px;
        }

        .metoda-plata label {
            display: inline-block;
            margin-right: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Finalizare comandă</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" required>

            <label for="adresa">Adresă:</label>
            <input type="text" name="adresa" required>

            <h3>Produse în coș:</h3>
            <ul>
                <?php
                foreach ($_SESSION['cos'] as $productID => $productInfo) {
                    echo "<li>{$productInfo['nume']} - {$productInfo['cantitate']} bucăți</li>";
                }
                ?>
            </ul>

            <h3>Preț total: <?php echo $pretTotal; ?> lei</h3>

            <!-- Adăugăm secțiunea pentru metoda de plată -->
            <div class="metoda-plata">
                <label for="metoda_plata">Selectați metoda de plată:</label>
                <input type="radio" name="metoda_plata" value="card" <?php echo ($metodaPlata == 'card') ? 'checked' : ''; ?>> Card
                <input type="radio" name="metoda_plata" value="cash" <?php echo ($metodaPlata == 'cash') ? 'checked' : ''; ?>> Cash
            </div>

            <input type="submit" name="finalizare_comanda" value="Finalizează comanda">
        </form>
    </div>
</body>

</html>

<?php $conn->close(); ?>
