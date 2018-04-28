<?php
    include "api/ApartamentApi.php";
    include "api/DbController.php";
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = NULL;
        if(!empty($_GET["id"]) && isset($_GET["id"])) {
            $id = $_GET["id"];
            $apartamenty = GetApartamentByHotelId($id);
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
    <div class="container-fluid mt-4">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Ilość miejsc</th>
            <th scope="col">Łóżka jednoosobwe</th>
            <th scope="col">Łóżka dwuosobowe</th>
            <th scope="col">Wolne</th>
            </tr>
        </thead>
            <tbody> 
                <?php for($i = 0; $i <= count($apartamenty)-1; $i++) { ?>
                    <tr>
                        <th scope="row"><?=$i+1?></th>
                        <td><?=$apartamenty[$i]->ilosc_miejsc;?></td>
                        <td><?=$apartamenty[$i]->lozka_jednoOS;?></td>
                        <td><?=$apartamenty[$i]->lozka_dwuOS;?></td>
                        <td><?=$apartamenty[$i]->wolne;?></td>
                        <td><input class="btn" type="button" value="Zarządzaj" onclick="window.location.href='/apartmanager.php?id=<?=$apartamenty[$i]->id;?>'"/></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>