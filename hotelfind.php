<!-- <?php
    include "api/HotelApi.php";
    
$error = false;
$success = false;

$hotele = GetAllHotels();

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


?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HotelCenter</title>
</head>

<body>
    <?php include "css/navbar.php"; ?>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-3">
                <div class="jumbotron">
                        <h3>Wyszukaj hotel</h3>
                        <hr>
                        <div class="row">
                            
                                <label for="data_in">Data przyjazdu</label>
                                <input type="date" class="form-control mt-2" name="data_in"/>
                            
                        </div>
                        <div class="row">
                            
                                <label for="data_out">Data odjazdu</label>
                                <input type="date" class="form-control mt-2" name="data_out"/>
                            
                        </div>
                        <div class="row">
                            
                                <label for="nazwa" class="mt-2">Nazwa miasta/hotelu</label>
                                <input type="text" class="form-control mt-2" name="nazwa"/>
                            
                        </div>
                        <div class="row">
                            
                                <button class="btn btn-info  float-right mt-3">Szukaj</button>
                            
                        </div>
                    </div>
            </div>
            <div class="col-md-9">
                <?php foreach($hotele as $hotel) { ?>
                    <div class="jumbotron">
                    <h2><?=$hotel->nazwa?><span class="badge badge-secondary ml-2">⋆⋆⋆⋆</span></h2>
                    <p><i class="fas fa-map-marker"></i> <?=$hotel->miasto?> <i class="far fa-map"></i> <?=$hotel->adres;?></p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <img src="https://t-ec.bstatic.com/images/hotel/max1024x768/688/68818050.jpg" style="height:100%;width:350px;"class="img-thumbnail" alt="Ambrozja Hotel"> 
                        </div>
                        <div class="col-6">
                            <span class="badge badge-danger">Często rezerwowany</span>
                            <p>2 wolne pokoje</p>
                            <p>Czesto rezerwowany obiekt</p>
                            <h3>Cena: 256 zł za dobę</h3>
                            <hr>
                            <button class="btn btn-primary btn-lg">Rezerwuj pokoje</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>