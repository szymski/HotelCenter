<?php
    include "api/apis.php";
    session_start();
    $error = false;
    $success = false;

    if(isset($_GET["id"]) && !empty($_GET["id"])) {
      $id = $_GET["id"];
      $images = GetPathByApartamentId($id);
    } else { $error = false; }

    if($_SERVER["REQUEST_METHOD"] == "POST") {

      if(isset($_GET["foto_id"]) && !empty($_GET["foto_id"])) {
        $foto_id = $_GET["foto_id"];
        echo $foto_id;
        die;
      }
      if(isset($_FILES["file"]) && !empty($_FILES["file"])) {
        $file = $_FILES["file"];
      } else { $error = true; }
      if(!$error) {
        if(AddImageToApartament($id, $file)) {
          $success = true;
        } else { $error = true; }
      }
    }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HotelCenter - Galeria</title>
  </head>

  <body>
    <?php include "css/navbar.php";?>
    <?php if($error) { ?>
    <center>
      <div class="alert alert-danger mt-2 w-75" role="alert">
        <center>Cos poszlo nie tak</center>
      </div>
    </center>
    <?php } ?>
    <?php if($success) { ?>
    <div class="alert alert-success" role="alert">
      <center>Zdjecie zostalo wyslane</center>
      <?php header("Location: /galeria.php?id=$id"); ?>
    </div>
    <?php } ?>
    <div class="container">
      <div class="row justify-content-center mt-2 mb-2">
        <button class="btn btn-lg" onclick="modalShow()">Dodaj zdjęcie</button>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 filter sprinkle">
          <?php
            foreach($images as $image) {
              // echo "<img src='$image' class='img-responsive mt-1 mr-1'>";
              echo "<div class='image-gallery mt-1 mr-1' style='background-image: url(images$image->path);'>
              <button class='btn btn-circle btn-lg float-right mt-1 mr-1 show' onclick='deleteModal(1)'>X</button></div>";       
            }
          ?>
        </div>
      </div>
    </div>

    <div class="modal" id="fileModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ustaw obraz hotelu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <form action="" method="post" enctype="multipart/form-data">
              <input type="file" name="file" id="file">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="file-modal-button">Wyślij</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
          </div>
        </div>
      </div>
    </div>

  <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Potwierdz usuwanie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Czy chcesz usunac ten plik?</p>
        </div>
        <div class="modal-footer">
          <form action="" method="post">
            <input id="delete-id" type="hidden" name="" value="">
            <button type="submit" class="btn btn-primary">Usuń</button>
          </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        </div>
      </div>
    </div>
  </div>

    <?php include "css/footer.php";?>
  </body>

  </html>

  <script>
    function modalShow() {
      $("#fileModal").modal("show");
    }

    function deleteModal(id) {
      $("#delete-id").val(id);
      $("#delteModal").modal("show");
    }
  </script>