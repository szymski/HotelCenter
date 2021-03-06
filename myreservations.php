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
    <title>HotelCenter - Moje rezerwacje</title>
  </head>

  <body>
    <?php include "css/navbar.php"; ?>
    <div class="container">
    <table class="table table-hover mt-2">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Hotel</th>
            <th scope="col">Od kiedy</th>
            <th scope="col">Do kiedy</th>
            <th scope="col">Potwierdzone</th>
            <th scope="col">Cena</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>TEST</td>
          </tr>
        </tbody>
      </table>
      </div>
    <?php include "css/footer.php"; ?>
  </body>

  </html>
