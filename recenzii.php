<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReSell-Recenzii</title>

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
            <li class="nav-item">
              <a class="nav-link" href="produse.php">
                Produse
              </a>
            <li class="nav-item">
              <a class="nav-link" href="why.php">
                De ce noi?
              </a>
            </li>
            <li class="nav-item active">
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
                LOGIN
              </span>
            </a>
            <a href="autentificare.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                INREGISTRARE
              </span>
            </a>
            <a href="cos.php">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <ul class="navbar-nav">
  <li class="nav-item ">
    <a class="nav-link" href="categorii.php">
      CATEGORII
    </a>
  </li>
</ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

  </div>
    <h2>Adaugă o recenzie</h2>
    <form action="salveaza_recenzie.php" method="post">
        <label for="nume">Nume:</label>
        <input type="text" name="nume" required>

        <label for="recenzie">Recenzie:</label>
        <textarea name="recenzie" rows="4" required></textarea>

        <button type="submit">Trimite recenzia</button>
    </form>

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
