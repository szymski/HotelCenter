<?php
    include "api/apis.php"; 
    session_start();
    $miasta = GetAllCities();
    
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HotelCenter</title>
    </head>

    <body>
        <?php include "css/navbar.php"; ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron">
                        <h3>Wyszukaj hotel</h3>
                        <hr>
                        <form action="/hotelfind.php" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <label for="data_in">Data przyjazdu</label>
                                    <input type="date" class="form-control mt-2" name="data_in" />
                                </div>
                                <div class="col-6">
                                    <label for="data_out">Data odjazdu</label>
                                    <input type="date" class="form-control mt-2" name="data_out" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="nazwa" class="mt-2">Nazwa miasta/hotelu</label>
                                    <input type="text" class="form-control mt-2" name="miasto" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-info  float-right mt-3">Szukaj</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="jumbotron" style="background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Katowice.jpg/1200px-Katowice.jpg);">
                        <div class="row">
                            <h3 class="h3index">
                                <?php echo $miasta[2]; ?>
                            </h3>
                            <hr>
                        </div>
                        <p class="h3index">Ilosc hoteli :
                            <?php echo CountHotelsInCity($miasta[2]); ?>
                        </p>
                        <hr>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="jumbotron" style="background-image: url(https://www.rybnik.com.pl/pliki/v1/Rybnik_rynek.jpg);">
                        <div class="row">
                            <h3 class="h3index">
                                <?php echo $miasta[0]; ?>
                            </h3>
                            <hr>
                        </div>
                        <p class="h3index">Ilosc hoteli :
                            <?php echo CountHotelsInCity($miasta[0]); ?>
                        </p>
                        <hr>
                    </div>
                    <?php if(!$logged) {?>
                    <a href="register.php">
                        <div class="alert alert-dark text-center" role="alert">
                            <i class="far fa-thumbs-up"></i> Zarejestruj się i udostępnij swój obiekt na HotelCenter
                        </div>
                    </a>
                    <?php }?>
                    <?php if($logged) {?>
                    <a href="registerhotel.php">
                        <div class="alert alert-dark text-center" role="alert">
                            <i class="far fa-thumbs-up"></i> Zarejestruj hotel i z łatwością docieraj do gości, zarabiaj więcej!
                        </div>
                    </a>
                    <?php }?>
                    <div class="jumbotron" style="background-image: url(https://d-nm.ppstatic.pl/k/r/fa/e6/54bf5c8e9664b_o.jpg?1420066800);">
                        <div class="row">
                            <h3 class="h3index">
                                <?php echo $miasta[1]; ?>
                            </h3>
                            <hr>
                        </div>
                        <p class="h3index">Ilosc hoteli :
                            <?php echo CountHotelsInCity($miasta[1]); ?>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <?php include "css/footer.php"; ?>
    </body>

    </html>