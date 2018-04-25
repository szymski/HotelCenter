<?php
    session_start();
    include "api/HotelApi.php";

    if(!$_SESSION["id"]) {
        header("Location: /index.php");
    }

    $miasta = GetAllCities();
    $success = false;
    $error = false;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST['nazwa'] != NULL && !empty($_POST['nazwa'])) { $nazwa = str_replace(' ', '', $_POST['nazwa']); }
        else { $error = true; }
        if($_POST['miasto'] != NULL && !empty($_POST['miasto'])) { $miasto = str_replace(' ', '', $_POST['miasto']); }
        else { $error = true; }
        if($_POST['adres'] != NULL && !empty($_POST['adres'])) { $adres = $_POST['adres']; }
        else { $error = true; }
        if($_POST['opis'] != NULL && !empty($_POST['opis'])) { $opis = str_replace(' ', '', $_POST['opis']); }
        else { $error = true; }

        if(!$error) {
            if(AddHotel($nazwa, $miasto, $adres, $opis, $_SESSION["id"])) {
                $success = true;
            }
            else {
                $success = false;
            }
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
                <center><?php echo "Hotel zostal dodany"; ?></center>
            </div>
        <?php } ?>
    <div class="row">
        <div class="col-md-6 text-center">
            <h1>Zarejestruj hotel na HotelCenter</h1>
            <h5>Z łatwością docieraj do gości i zarabiaj więcej</h5>
        </div>

        <div class="col-md-6">
            <div class="jumbotron">
                <h5>Chcę zarejestrować hotel</h5>
                <hr>
                <form method="POST">
                    <label for="name">Nazwa hotelu</label>
                    <input type="text" class="form-control" name="nazwa">
                    <label for="miasto">Miasto</label>
                    <select class="form-control" name="miasto">
                    <?php
                        foreach($miasta as $miasto) {
                            echo "<option value=' ".$miasto."'>" . $miasto . "</option>";
                        }
                    ?>
                    </select>
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" name="adres">
                    <label for="info">Opis</label>
                    <textarea class="form-control" rows="5" name="opis"></textarea>
                    <center><button class="btn btn-info mt-2" type="submit">Rozpocznij -></button><center>
                </form>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>