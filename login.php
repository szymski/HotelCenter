<?php  
    include "api/apis.php";
    session_start();

    $success = false;
    $error = false;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST['login'] != NULL && !empty($_POST['haslo'])) { $login = str_replace(' ', '', $_POST['login']); }
        else { $error = true; }
        if($_POST['haslo'] != NULL && !empty($_POST['haslo'])) { $haslo = str_replace(' ', '', $_POST['haslo']); }
        else { $error = true; }
        if(!Login($_POST["login"], $_POST['haslo'])) { $error = true; }
        if(!$error) {
            $success = true;
            header("Location: /index.php");
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
    <title>HotelCenter - Logowanie</title>
</head>
<body>
<?php include "css/navbar.php"; ?>
    <?php if($error) { ?>
        <div class="alert alert-danger" role="alert">
            <center>Zle dane logowania</center>
        </div>
    <?php } ?>

    <?php if($success) { ?>
        <div class="alert alert-success" role="alert">
            <center>Sukcess!</center>
        </div> 
    <?php } ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="jumbotron">
                    <h2 class="">Logowanie</h2>
                    <form method="POST">
                        <input type="text" class="form-controll mt-2" name="login" placeholder="Login"/></br>
                        <input type="password" class="form-controll mt-2" name="haslo" placeholder="Hasło"/></br>
                        <button class="btn btn-info mt-3" type="submit">Zaloguj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "css/footer.php"; ?>
</body>
</html> 