<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="lightbox.min.css">
  <script type="text/javascript" src="lightbox-plus-jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
  <link rel = "icon" href ="./poze/studenta.svg" type = "image/x-icon">
  <title>Monica Filip</title>
</head>

<?php
session_start();
?>

<body>
  <!-- inceput navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark navbarinfo fixed-top">
    <b class="navbar-brand" style="color:#74c69d;">Monica</b>
    <!-- navbardropdown responsive -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- elemente navbar -->
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="index.php"><i class="fa fa-fw fa-fa fa-fw fa-home"></i> Acasă<span class="sr-only"></span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="despre.php"><i class="fa fa-fw fa-female"></i> Despre<span class="sr-only"></span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="cv.php"><i class="fa fa-fw fa-university"></i> CV </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="proiecte.php"> Proiecte</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hobby.php"><i class="fa fa-fw fa-heart"></i> Hobby</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link  dropdown-toggle " href="galerie.php"><i class="fa fa-fw fa-camera"></i> Galerie</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="calatorii.php"> Călătorii</a></li>
            <li><a class="dropdown-item" href="romania.php"> România</a></li>
            <li><a class="dropdown-item" href="amintiri.php"> Amintiri </a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php"><i class="fa fa-fw fa-phone"></i> Contact<span class="sr-only"></span></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
      <?php
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo '<li class="nav-item">
        <a class="nav-link" href="login.php">LOGIN</a>
        </li>';}
        else {
          echo '<li class="nav-item">
          <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>';
          //  exit;
        } ?>
        <?php
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
          echo '<li class="nav-item">
          <a class="nav-link" href="register.php">REGISTER</a>
          </li>';}
          else {
            echo '<li class="nav-item">
            <a class="nav-link" style="color:white">Hello, '.($_SESSION["username"]).'</a>
            </li>';
          }
          ?>
      </ul>

    </div>
  </nav>
