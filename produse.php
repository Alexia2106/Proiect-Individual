
<!DOCTYPE html>
<html>

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

  <title>
    ReSell Produse
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            ReSell
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="produse.php">
                Produse
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.php">
                De ce noi?
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="recenzii.php">
                Recenzii
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contactează-ne</a>
            </li>
          </ul>
          <div class="user_option">
            <a href="login.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <!-- <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
                <a class="nav-link" href="cautare.php">CATEGORII</a>
              </button>
            </form>-->
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <!-- shop section -->

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

// Interogare pentru a obține produsele din baza de date
$sql = "SELECT * FROM produse";
$result = $conn->query($sql);

// Verificare dacă există rezultate
if ($result->num_rows > 0) {
    // Afișare produse într-un container
    echo '<section class="shop_section layout_padding">';
    echo '<div class="container">';
    echo '<div class="heading_container heading_center">';
    echo '<h2>Ultimele produse</h2>';
    echo '</div>';
    echo '<div class="row">';

    // Afișare fiecare produs
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-sm-6 col-md-4 col-lg-3">';
        echo '<div class="box">';
        echo '<a href="#">';
        echo '<div class="img-box">';
        echo '<img src="' . $row['Poza'] . '" alt="' . $row['Nume'] . '">';
        echo '</div>';
        echo '<div class="detail-box">';
        echo '<h6>' . $row['Nume'] . '</h6>';
        echo '<h6>Preț <span>' . $row['Pret'] . ' lei</span></h6>';
        echo '</div>';
        echo '<div class="new">';
        echo '<span>New</span>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</section>';
} else {
    echo "Nu există produse în baza de date.";
}

// Închidere conexiune
$conn->close();
?>

  <!-- end shop section -->

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="https://www.facebook.com/alexia.serban21">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="https://www.instagram.com/alexia_serban21/">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              Despre noi
            </h6>
            <p>
              Suntem o echipă pasionată și dedicată care a creat acest magazin cu o viziune clară: să oferim o alternativă sustenabilă și elegantă în lumea modei. 
              Ne străduim să aducem în prim-plan conceptul de reciclare și să inspirăm o schimbare pozitivă în comportamentul de consum.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Abonare
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Ai nevoie de ajutor?
            </h6>
            <p>
              Scrie-ne sau sună-ne, iar noi îți vom răspunde în cel mai scurt timp posibil.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Piața Unirii, Timișoara </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+040712345678</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> alexia.serban03@e-uvt.ro</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By Resell. 2023
          
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>
  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>