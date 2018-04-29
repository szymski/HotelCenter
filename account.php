<?php
    include "api/AccountApi.php";
    include "api/DbController.php";
    session_start();
    $error = false;
    $success = false;
    $errorMsg = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["nick"]) && !empty($_POST["nick"])) {
            $nick = $_POST["nick"];
            if(ChangeNick($nick, $_SESSION["id"])) {
                $success = true;
                $errorMsg = $errorMsg . " Nick zostal zmieniony </br> ";
            } else { $error = true; }
        }
        if(isset($_POST["haslo"]) && !empty($_POST["haslo"])) {
            $haslo = $_POST["haslo"];
        }
        if(isset($_POST["hasloagain"]) && !empty($_POST["hasloagain"])) {
            $hasloagain = $_POST["hasloagain"];
        } 
        if(isset($haslo) && isset($hasloagain)) {
            if($haslo == $hasloagain) {
                ChangePassword($haslo, $_SESSION["id"]);
                $success = true;
                $errorMsg = $errorMsg . " Haslo zostało zmienione </br> ";
            } else { $error = true; $errorMsg = $errorMsg . " Hasła nie są identyczne "; }
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
    <div class="container mt-4">
    <?php if($error) { ?>
        <div class="alert alert-danger" role="alert">
            <center><?php echo $errorMsg; ?></center>
        </div> 
    <?php } ?>
    <?php if($success) { ?>
        <div class="alert alert-success" role="alert">
            <center>Sukcess!</br><?php echo $errorMsg; ?></center>
            <?php header("refresh:1;url=/"); ?>
        </div> 
    <?php } ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="jumbotron">
                    <h2 class="">Zmien swoje dane</h2>
                    <form method="POST">
                        <input name="nick" type="text" class="form-control mt-2" placeholder="Zmien nick">
                        <input name="haslo" type="password" class="form-control mt-2" placeholder="Zmien haslo">
                        <input name="hasloagain" type="password" class="form-control mt-2" placeholder="Powtórz haslo">
                        <button class="btn btn-info mt-2">Aktualizuj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>