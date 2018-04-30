<?php
    include "api/apis.php";
    $error = false;
    $success = false;
    $errorMsg = "Podano niepoprawne dane";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST['nick'] != NULL && !empty($_POST['nick'])) { $nick = str_replace(' ', '', $_POST['nick']); }
        else { $error = true; }
        if($_POST['login'] != NULL && !empty($_POST['login'])) { $login = str_replace(' ', '', $_POST['login']); }
        else { $error = true; }
        if($_POST['haslo'] != NULL && !empty($_POST['haslo'])) { $haslo = str_replace(' ', '', $_POST['haslo']); }
        else { $error = true; }
        if(!IsUserNameFree($_POST["login"])) { $error = true; $errorMsg = $errorMsg . " - login jest zajety"; }
        if(!$error) {
            AddAccount($nick, $login, $haslo);
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HotelCenter - Zarejestruj się</title>
    </head>

    <body>
        <?php include "css/navbar.php"; ?>
        <?php if($error) { ?>
        <div class="alert alert-danger" role="alert">
            <center>
                <?php echo $errorMsg; ?>
            </center>
        </div>
        <?php } ?>

        <?php if($success) { ?>
        <div class="alert alert-success" role="alert">
            <center>Konto utworzone</center>
        </div>
        <?php header( "refresh:1;url=/login.php" ); } ?>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="jumbotron">
                        <h2 class="">Rejestracja</h2>
                        <form method="POST" action="">
                            <input id="nick" type="login" class="form-control mt-2" name="nick" placeholder="Nick" />
                            <input id="login" type="login" class="form-control mt-2" name="login" placeholder="Login" />
                            <input id="password" type="password" class="form-control mt-2" name="haslo" placeholder="Hasło" />
                            <button id="submit" class="btn btn-info mt-3" type="submit">Zaczynajmy!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "css/footer.php"; ?>
    </body>

    </html>