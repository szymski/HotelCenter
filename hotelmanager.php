<?php
    include "api/HotelApi.php";
    include "api/DbController.php";
    
    session_start();

    $hotele = GetAllHotelsByUserId($_SESSION["id"]);
    $error = false;
    $success = false;
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            $success = DeleteHotel($_GET["id"]);
            if(!$success) {
                $error = true;
            }
            else { header("Location: /hotelmanager.php"); }
        } else { $error = true; }
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
                            <td><?=$hotele[$i]->GetName();?> <?php echo $hotele[$i]->GetId(); ?> </td>
                            <td><?=$hotele[$i]->GetCity();?></td>
                            <td><?=$hotele[$i]->GetAdres();?></td>
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Usunąć <?=$hotele[$i]->GetName();?> <?=$hotele[$i]->GetId();?> ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <div class="modal-body text-center">
                                        <input class="btn btn-danger" type="button" value="Usuń" onclick="window.location.href='/hotelmanager.php?id=<?=$hotele[$i]->GetId();?>'"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <td><input class="btn" type="button" value="Zarządzaj" onclick="window.location.href='/apartaments.php?id=<?=$hotele[$i]->GetId();?>'"/></td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">Usuń</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>