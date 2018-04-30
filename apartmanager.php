<?php
    $error = false;
    $success = false;

    include "api/apis.php";
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = NULL;
        if(!empty($_GET["id"]) && isset($_GET["id"])) {
            $id = $_GET["id"];
            $apartament = GetApartamentById($id);
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["ilosc_miejsc"]) && isset($_POST["ilosc_miejsc"])) {
            $ilosc_miejsc = $_POST["ilosc_miejsc"];
        } else { $error = true; }
        if(!empty($_POST["lozka_jednoOS"]) && isset($_POST["lozka_jednoOS"])) {
            $lozka_jednoOS = $_POST["lozka_jednoOS"];
        } else { $error = true; }
        if(!empty($_POST["lozka_dwuOS"]) && isset($_POST["lozka_dwuOS"])) {
            $lozka_dwuOS = $_POST["lozka_dwuOS"];
        } else { $error = true; }

        $id = NULL;
        if(!empty($_GET["id"]) && isset($_GET["id"])) {
            $id = $_GET["id"];
            $apartament = GetApartamentById($id);
        } else { $error = true; }

        if($ilosc_miejsc < 0 || $lozka_jednoOS < 0 || $lozka_dwuOS < 0) {
            $error = true;
        }

        if(!$error) {
            UpdateApartament($id, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwuOS, $apartament->wolne);
            $success = true;
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
        <title>HotelCenter - Zarzadzaj</title>
    </head>

    <body>
        <?php include "css/navbar.php"; ?>

        <?php if($success) { ?>
        <div class="alert alert-success" role="alert">
            <center>Zmiany zostaly zapisane</center>
        </div>
        <?php header( "refresh:1;url=/apartaments.php?id=$apartament->id_hotelu" ); } ?>

        <?php if($error) { ?>
        <div class="alert alert-danger" role="alert">
            <center>
                <?php echo "Podano zle dane"; ?>
            </center>
        </div>
        <?php } ?>

        <div class="container mt-4">
            <!-- <?=print_r(GetApartamentById($id));?> -->

            <form action="" method="post">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Ilość miejsc : </label>
                    <div class="col-10">
                        <input name="ilosc_miejsc" class="form-control" type="number" value="<?=$apartament->ilosc_miejsc?>" placeholder="<?=$apartament->ilosc_miejsc?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Ilość łóżek jednoosobowych : </label>
                    <div class="col-10">
                        <input name="lozka_jednoOS" class="form-control" type="number" value="<?=$apartament->lozka_jednoOS?>" placeholder="<?=$apartament->lozka_jednoOS?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Ilość łóżek dwuosobowych : </label>
                    <div class="col-10">
                        <input name="lozka_dwuOS" class="form-control" type="number" value="<?=$apartament->lozka_dwuOS?>" placeholder="<?=$apartament->lozka_dwuOS?>">
                    </div>
                </div>
                <button class="btn" type="submit">Zaktualizuj</button>
            </form>
        </div>
    </body>

    </html>