<?php
    include "api/apis.php";
    session_start();

    $success = false;
    $error = false;
    $id_hotelu = "";
    $apartamenty = array();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_GET["id_hotelu"]) && !empty($_GET["id_hotelu"])) {
          $id_hotelu = $_GET["id_hotelu"];
          $hotel = GetHotelById($id_hotelu);
        }
        if(isset($_POST['cena']) && !empty($_POST['cena'])) {
          $cena = $_POST['cena'];
        } else { $error = true; }
        if(isset($_POST['id_apartamentu']) && !empty($_POST['id_apartamentu'])) {
          $id_apartamentu = $_POST['id_apartamentu'];
        } else { $error = true; }
        if(isset($_POST['dni']) && !empty($_POST['dni'])) {
          $dni = $_POST['dni'];
        } else { $error = true; }
        if(isset($_POST['data_in']) && !empty($_POST['data_in'])) {
          $data_in = $_POST['data_in'];
          echo $data_in;
        } else { $error = true; }
        if(!$error) {
          $date_interval = new DateInterval('P'.$dni.'D');
          $new_date_in = new DateTime($data_in);
          $new_date_out = $new_date_in;
          $new_date_out->add($date_interval);
          $new_date_in = $new_date_in->format('Y-m-d');
          $new_date_out = $new_date_out->format('Y-m-d');
          if(AddNewReservation($data_in, $new_date_out, $id_apartamentu, GetApartamentById($id_apartamentu)->id_hotelu, $cena, $_SESSION['id']) &&
          UpdateWolne($id_apartamentu, 0)) {
            $success = true;
          } else { $error = true; }
        }
      }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["id_hotelu"]) && !empty($_GET["id_hotelu"])) {
            $id_hotelu = $_GET["id_hotelu"];
        } else { $error = true; }
        if(isset($_GET["data_in"]) && !empty($_GET["data_in"])) {
          $data_in = $_GET["data_in"];
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
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
                    if(IsFree($apartament->id, $data_in)) { ?>

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
            <p class="mt-2">Ilość łóżek jedno-osobowych: <?=$apartament->lozka_jednoOS?> </p>
            <p>Ilość łóżek dwu-osobowych: <?=$apartament->lozka_dwuOS?></p>
            <!-- <?php print_r($apartament); ?> -->
            <h3 class="">Cena: <?=$apartament->cena?> zł za dobę</h3>
            <div class="d-flex justify-content-end">
            <?php if($logged) {?>
              <button type="button" class="btn btn-primary" onclick="rezerwujModal('<?=$apartament->cena?>', '<?=$apartament->id?>', '<?=$_SESSION['id']?>', '<?=$data_in?>')">Rezerwuj</button>
            <?php }?>
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
            <form action="" method="post">
              <input type="hidden" id="id_apartamentu" name="id_apartamentu">
              <input type="date" name="data_in" id="data" class="form-control mt-2 w-75" readonly> 
              <input type="number" name="dni" id="dni" class="form-control mt-2 w-75">
              <div class="input-group mt-2 w-75">
                <input type="number" name="cena" id="cena" class="form-control" readonly value="0">
                <div class="input-group-append">
                  <span class="input-group-text">zł</span>
                </div>
                </div>
              <input type="hidden" name="" id="cena-hidden">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" id="rezerwuj-modal-button">Rezerwuj</button>
              </form>
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
    function rezerwujModal(cena, id_apartamentu, user_id, data) {
      $("#rezerwujTitle").text("Rezerwacja apartamentu");
      $("#rezerwuj-modal-button").attr("onclick", "window.location.href='/index.php'");
      $("#cena-hidden").val(cena);
      $("#data").val(data);
      $("#id_apartamentu").val(id_apartamentu)
      $("#rezerwujModal").modal("show");
    }

    $('#dni').bind('input', function() {
      if($('#dni').val() < 300) {
        dni = $('#dni').val();
      }
      cena = $('#cena-hidden').val();
      $('#cena').val(dni * cena);
    });
  </script>
