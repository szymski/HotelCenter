<?php
    include "api/apis.php";
    session_start();

    $success = false;
    $error = false;
    $id_hotelu = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["data_in"]) && !empty($_POST["data_in"])) {
            $data_in = $_POST["data_in"];
        } else { $error = true; }
        if(isset($_POST["data_out"]) && !empty($_POST["data_out"])) {
            $data_out = $_POST["data_out"];
        } else { $error = true; }
        if(isset($_POST["miasto"]) && !empty($_POST["miasto"])) {
            $miasto = $_POST["miasto"];
        } else { $error = true; }
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["id_hotelu"]) && !empty($_GET["id_hotelu"])) {
            $id_hotelu = $_GET["id_hotelu"];
        } else { $error = true; }
        if(!$error) {
            $apartamenty = GetApartamentByHotelId($id_hotelu);
            $hotel = GetHotelById($id_hotelu);
        }
    }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HotelCenter - Rezerwacja</title>
  </head>

  <body>
    <?php include "css/navbar.php"; ?>
    <?php if($error) { ?>
    <div class="alert alert-danger" role="alert">
      <center>Coś poszło nie tak</center>
    </div>
    <?php } ?>

    <?php if($success) { ?>
    <div class="alert alert-success" role="alert">
      <center>Sukcess!</center>
    </div>
    <?php } ?>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron text-center">
            <h2 class="shadowtitle">Rezerwacja</h2>
            <p>
              <?=$hotel->opis;?>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach($apartamenty as $apartament) {
                    if($apartament->wolne == 1) { ?>

        <div class="col-md-6">
          <div class="jumbotron">
            <div class="d-flex justify-content-center">
              <h2 class="">Pokój 2 osobowy
                            <span class="badge badge-info">8,1</span>
                        </h2>
            </div>
            <hr>
            <div id="hotelpokazslajdow" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#hotelpokazslajdow" data-slide-to="0" class="active"></li>
                <li data-target="#hotelpokazslajdow" data-slide-to="1"></li>
                <li data-target="#hotelpokazslajdow" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="https://t-ec.bstatic.com/images/hotel/max1024x768/725/72528533.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://t-ec.bstatic.com/images/hotel/max1024x768/725/72530365.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="https://t-ec.bstatic.com/images/hotel/max1024x768/725/72528546.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#hotelpokazslajdow" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
              <a class="carousel-control-next" href="#hotelpokazslajdow" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
            </div>
            <p class="mt-2">Ilość łóżek jedno-osobowych: 2 </p>
            <p>Ilość łóżek dwu-osobowych: 1</p>
            <!-- <?php print_r($apartament); ?> -->
            <h3 class="shadowtitle">Cena: 272 zł za dobę</h3>
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-primary" onclick="rezerwujModal()">Rezerwuj</button>
            </div>
          </div>

        </div>
        <?php } ?>
        <?php } ?>
      </div>
      <div class="modal" id="rezerwujModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="rezerwujTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
            <div class="modal-body">
              <p>Czy na pewno chcesz rezerwować ten pokój ? </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="rezerwuj-modal-button">Rezerwuj</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "css/footer.php"; ?>
  </body>

  </html>

  <script>
    function rezerwujModal() {
      $("#rezerwujTitle").text("Rezerwacja apartamentu");
      $("#rezerwuj-modal-button").attr("onclick", "window.location.href='/index.php'");
      $("#rezerwujModal").modal("show");
    }
  </script>
