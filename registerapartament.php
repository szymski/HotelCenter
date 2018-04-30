<?php
    session_start();
    include "api/apis.php";

    if(!$_SESSION["id"]) {
        header("Location: /index.php");
    }

    $hotele = GetAllHotelsByUserId($_SESSION["id"]);
    $success = false;
    $error = false;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["hotel_id"]) && $_POST["hotel_id"] != NULL) {
            $hotel_id = $_POST["hotel_id"];
        } else { $error = true; echo "hotel"; }
        if(!empty($_POST["ilosc_miejsc"]) && $_POST["ilosc_miejsc"] != NULL) {
            $ilosc_miejsc = $_POST["ilosc_miejsc"];
        } else { $error = true; echo "iloscmiejsc"; }   
        if(!empty($_POST["lozka_jednoOS"]) && $_POST["lozka_jednoOS"] != NULL) {
            $lozka_jednoOS = $_POST["lozka_jednoOS"];
        } else { $error = true; echo "lozka1os"; }
        if(!empty($_POST["lozka_dwaOS"]) && $_POST["lozka_dwaOS"] != NULL) {
            $lozka_dwaOS = $_POST["lozka_dwaOS"];
        } else { $error = true; echo "lozka2os"; }

        if(!$error) {
            if(AddApartament($hotel_id, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, 1, "", "")) {
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
    <title>HotelCenter - Konto</title>
    
</head>
<body>
<?php include "css/navbar.php"; ?>

<div class="container mt-2">
        <?php if($error) { ?>
            <div class="alert alert-danger" role="alert">
                <center><?php echo "Podano bledne dane"; ?></center>
            </div>
        <?php } ?>
        <?php if($success) { ?>
            <div class="alert alert-success" role="alert">
                <center><?php echo "Apartament zostal dodany"; ?></center>
                <?php header("Location: /apartaments.php?id=$hotel_id"); ?>
            </div>
        <?php } ?>
    <div class="row">
        <div class="col-md-6 text-center">
            <h1>Dodaj apartament</h1>
            <h5>Z łatwością docieraj do gości i zarabiaj więcej</h5>
        </div>

        <div class="col-md-6">
            <div class="jumbotron">
                <h5>Chcę zarejestrować apartament</h5>
                <hr>
                <form method="POST">
                    <label for="name">Wybierz hotel</label>
                    <select name="hotel_id" class="form-control">
                            <?php
                                foreach($hotele as $hotel) {
                                    echo "<option value='".$hotel->id."'>" . $hotel->nazwa . "</option>";
                                }
                            ?>
                        </select>
                    <label for="name">Ilość miejsc</label>
                    <input type="number" class="form-control" name="ilosc_miejsc">
                    <label for="name">Ilość łóżek 1 os.</label>
                    <input type="number" class="form-control" name="lozka_jednoOS">
                    <label for="name">Ilość łóżek 2 os.</label>
                    <input type="number" class="form-control" name="lozka_dwaOS">
                    <center><button class="btn btn-info mt-2" type="submit">Dodaj apartament</button><center>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "css/footer.php"; ?>
</body>
</html>