<?php
    include "api/apis.php";
    session_start();
$error = false;
$success = false;
$errorMsg = "";
$hotele = array();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["data_in"]) && !empty($_POST["data_in"])) {
            $data_in = $_POST["data_in"];
        }
        if(isset($_POST["data_out"]) && !empty($_POST["data_out"])) {
            $data_out = $_POST["data_out"];
        }
        if(isset($_POST["miasto"]) && !empty($_POST["miasto"])) {
            $miasto = $_POST["miasto"];
        } else { $error = true; }

        //echo $data_in . $data_out . $miasto;

        if(!$error) {
            $hotele = GetAllHotels($miasto);
            if(count($hotele) == 0) {
                $error = true;
                $errorMsg = $errorMsg . " Nie znaleziono hoteli w miescie : " . $miasto;
            }
        }
    } else { header( "Location: /" ); }


?>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
        crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HotelCenter</title>
</head>

<body>
    <?php include "css/navbar.php"; ?>
    <div class="container">
        <?php if($error) { ?>
        <div class="alert alert-danger mt-2" role="alert">
            <center>
                <?php echo $errorMsg ?>
            </center>
        </div>
        <?php } ?>
        <div class="row mt-2">
            <div class="col-md-3">
                <div class="jumbotron">
                    <h3>Wyszukaj hotel</h3>
                    <hr>
                    <form action="" method="post">
                        <div class="row">
                            <label for="data_in">Data przyjazdu</label>
                            <input type="date" class="form-control mt-2" name="data_in" />
                        </div>
                        <div class="row">
                            <label for="data_out">Data odjazdu</label>
                            <input type="date" class="form-control mt-2" name="data_out" />
                        </div>
                        <div class="row">
                            <label for="nazwa" class="mt-2">Nazwa miasta/hotelu</label>
                            <input type="text" class="form-control mt-2" name="miasto" />
                        </div>
                        <div class="row">
                            <button class="btn btn-info  float-right mt-3">Szukaj</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <?php 
                    foreach($hotele as $hotel) { 
                        $wolne = 0;
                        $cena = 0;
                        foreach(GetApartamentByHotelId($hotel->id) as $apartament) {
                            $cena += $apartament->cena;
                            if($apartament->wolne) {
                                $wolne++;
                            }
                        } $cena = $cena / count(GetApartamentByHotelId($hotel->id));
                        if($wolne > 0) {
                            ?>
                <div class="jumbotron">
                    <h2>
                        <?=$hotel->nazwa?>
                            <span class="badge badge-secondary ml-2">⋆⋆⋆⋆</span>
                    </h2>
                    <p>
                        <i class="fas fa-map-marker"></i>
                        <?=$hotel->miasto?>
                            <i class="far fa-map"></i>
                            <?=$hotel->adres;?>
                    </p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <img src="<?=GetPathByHotelId($hotel->id)?>" style="height:100%;width:350px;" class="img-thumbnail" alt="Nie znaleziono obrazka">
                        </div>
                        <div class="col-6">
                            <span class="badge badge-danger">Często rezerwowany</span>
                            <p>
                                <?php
                                            $wolne = 0;
                                            foreach(GetApartamentByHotelId($hotel->id) as $apartament) {
                                                if($apartament->wolne) {
                                                    $wolne++;
                                                }
                                            } echo $wolne;
                                        ?> wolne pokoje </p>
                            <p>Czesto rezerwowany obiekt</p>
                            <h3>Cena:
                                <?=$cena?> zł za dobę</h3>
                            <hr>
                            <button class="btn btn-primary btn-lg" onclick="window.location.href='/rezerwacja.php?id_hotelu=<?=$hotel->id?>'">Rezerwuj pokoje</button>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    <?php include "css/footer.php"; ?>
</body>

</html>