<?php
    include "api/HotelApi.php";

    session_start();

    $hotele = GetAllHotelsByUserId($_SESSION["id"]);
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
    <div class="container-fluid mt-4">
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Miasto</th>
                <th scope="col">Adres</th>
                <th scope="col"></th>
                <th scope="col"></th>

                </tr>
            </thead>
                <tbody> 
                    <?php for($i = 0; $i <= count($hotele)-1; $i++) { ?>
                        <tr>
                            <th scope="row"><?=$i+1?></th>
                            <td><?=$hotele[$i]->GetName();?></td>
                            <td><?=$hotele[$i]->GetCity();?></td>
                            <td><?=$hotele[$i]->GetAdres();?></td>
                            <!-- /apartamentmanager.php?id=<?=$hotele[$i]->GetId();?> -->
                            <td><input class="btn" type="button" value="Zarządzaj" onclick="window.location.href='/apartaments.php?id=<?=$hotele[$i]->GetId();?>'"/></td>
                            <td><input class="btn btn-danger" type="button" value="Usuń" onclick="window.location.href='/apartaments.php?id=<?=$hotele[$i]->GetId();?>'"/></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>