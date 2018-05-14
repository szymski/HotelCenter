<?php
  $logged = false;
  if(!empty($_SESSION["id"])) {
    if($_SESSION["id"]) {
      $logged = true;
    }
  }

?>
  <html>

  <head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
      crossorigin="anonymous">
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
      <i class="fas fa-home"></i> HotelCenter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- NIEzalogowany -->
    <?php if(!$logged) {?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0">
        <a href="login.php">
          <button class="btn btn-outline-light my-2 my-sm-0 mr-2" type="button">Zaloguj</button>
        </a>
        <a href="register.php">
          <button class="btn btn-outline-light my-2 my-sm-0" type="button">Zarejestruj</button>
        </a>
      </form>

      <?php }?>
      <!-- zalogowany -->

      <?php if($logged) {?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="account.php">Konto</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="hotelmanager.php">Zarządzaj Hotelami</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="myreservations.php">Twoje Rezerwacje</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <a href="registerapartament.php">
            <button class="btn btn-outline-light my-2 my-sm-0 mr-2" type="button">Dodaj Apartament</button>
          </a>
          <a href="registerhotel.php">
            <button class="btn btn-outline-light my-2 my-sm-0 mr-2" type="button">Dodaj Hotel</button>
          </a>
          <a href="logout.php">
            <button class="btn btn-outline-light my-2 my-sm-0" type="button">Wyloguj</button>
          </a>
        </form>

        <?php }?>
      </div>
  </nav>

  </html>