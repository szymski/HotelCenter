<?php
    include "api/apis.php";
    session_start();
    $success = false;
    $error = false;
    $wolne = "";

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = NULL;
        if(!empty($_GET["id"]) && isset($_GET["id"])) {
            $id = $_GET["id"];
            $nazwa = GetHotelById($id)->nazwa;
            $apartamenty = GetApartamentByHotelId($id);
            if(isset($_GET["delete_id"])) {
                DeleteApartament($_GET["delete_id"]);
                header("Location: /apartaments.php?id=$id");    
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_GET["id"]) && isset($_GET["id"])) {
            $id = $_GET["id"];
            $nazwa = GetHotelById($id)->nazwa;
            $apartamenty = GetApartamentByHotelId($id);
        }

        if(!empty($_POST["id_apartamentu"]) && isset($_POST["id_apartamentu"])) {
            $id_apartamentu = $_POST["id_apartamentu"];
        } else { $error = true; }
        if(!empty($_POST["ilosc_miejsc"]) && isset($_POST["ilosc_miejsc"])) {
            $ilosc_miejsc = $_POST["ilosc_miejsc"];
        } else { $error = true; }
        if(!empty($_POST["lozka_jednoOS"]) && isset($_POST["lozka_jednoOS"])) {
            $lozka_jednoOS = $_POST["lozka_jednoOS"];
        } else { $error = true; }
        if(!empty($_POST["lozka_dwuOS"]) && isset($_POST["lozka_dwuOS"])) {
            $lozka_dwuOS = $_POST["lozka_dwuOS"];
        } else { $error = true; }
        if(!empty($_POST["cena"]) && isset($_POST["cena"])) {
            $cena = $_POST["cena"];
        } else { $error = true; }
        if(isset($_POST["wolne"])) {
            $wolne = $_POST["wolne"];
        }


        if($ilosc_miejsc < 0 || $lozka_jednoOS < 0 || $lozka_dwuOS < 0) {
            $error = true;
        }

        if(empty($wolne)) {
            $wolne = 0;
        } else { $wolne = 1; }
        
        if(!$error) {
            UpdateApartament($id_apartamentu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwuOS, $wolne, $cena);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HotelCenter - Zarzadzaj</title>
</head>
<body>
    <?php include "css/navbar.php"; ?>

    <?php if($error) { ?>
        <div class="alert alert-danger" role="alert">
            <center>Coś poszło nie tak</center>
        </div>
    <?php header("Refresh:1"); } ?>

    <?php if($success) { ?>
        <div class="alert alert-success" role="alert">
            <center>Zmiany zapisane pomyślnie</center>
        </div>
    <?php header("Refresh:1"); } ?>

    <div class="container-fluid mt-4">
        <center>
            <h1 class="shadowtitle">
                <?php echo $nazwa; ?>
            </h1>
        </center>
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ilość miejsc</th>
                    <th scope="col">Łóżka jednoosobwe</th>
                    <th scope="col">Łóżka dwuosobowe</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Wolne</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i <= count($apartamenty)-1; $i++) { ?>
                <tr>
                    <th scope="row">
                        <?=$i+1?>
                    </th>
                    <td>
                        <?=$apartamenty[$i]->ilosc_miejsc;?>
                    </td>
                    <td>
                        <?=$apartamenty[$i]->lozka_jednoOS;?>
                    </td>
                    <td>
                        <?=$apartamenty[$i]->lozka_dwuOS;?>
                    </td>
                    <td>
                        <?=$apartamenty[$i]->cena;?>
                    </td>
                    <td>
                        <?php  
                            if($apartamenty[$i]->wolne) {
                                ?> <i class="fas fa-check"></i> <?php
                            } else {
                                ?> <i class="fas fa-times"></i> <?php
                            }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-default" onclick="manageModal(
                            '<?=$apartamenty[$i]->id;?>',
                            '<?=$apartamenty[$i]->ilosc_miejsc;?>',
                            '<?=$apartamenty[$i]->lozka_jednoOS;?>',
                            '<?=$apartamenty[$i]->lozka_dwuOS;?>',
                            '<?=$apartamenty[$i]->wolne;?>',
                            '<?=$apartamenty[$i]->cena;?>',
                        )">Zarządzaj</button>
                    </td>
                    <td>
                        <button class="btn btn-danger" name="delete_id" type="submit" onclick="deleteModal('<?=$id;?>', <?=$apartamenty[$i]->id;?>)">Usuń</button> <!-- value="<?php echo $apartamenty[$i]->id; ?>" name="">Usuń</button> -->
                    </td>
                </tr>
                <?php } ?>

                <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Czy chcesz usunąć apartament?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="delete-modal-button">Usuń</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal" id="manageModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edytuj apartament</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <form method="post">
                                    <input type="hidden" id="id_apartamentu" name="id_apartamentu"></input>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Ilość miejsc : </label>
                                        <div class="col-10">
                                            <input id="ilosc_miejsc" name="ilosc_miejsc" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Ilość łóżek jednoosobowych</label>
                                        <div class="col-10">
                                            <input id="lozka_jednoOS" name="lozka_jednoOS" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Ilość łóżek dwuosobowych</label>
                                        <div class="col-10">
                                            <input id="lozka_dwaOS" name="lozka_dwuOS" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Cena : </label>
                                        <div class="col-10">
                                            <input id="cena" name="cena" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Wolne : </label>
                                        <div class="col-10">
                                            <input class="form-check-input" type="checkbox" name="wolne" id="wolne">
                                            <!-- tu by sie jakis front przydal byku jebnij se monsterka -->
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" id="file-modal-button">Aktualizuj</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    </div>
    <?php include "css/footer.php"; ?>
</body>
</html>
<script>

function deleteModal(id, delete_id) {
    $("#delete-modal-button").attr("onclick", "window.location.href='/apartaments.php?id=" + id + "&delete_id=" + delete_id + "'");
    $("#deleteModal").modal("show");
}

function manageModal(id, ilosc_miejsc, ilosc_lo1, ilosc_lo2, wolne, cena) {
    $("#id_apartamentu").val(id);
    $("#ilosc_miejsc").val(ilosc_miejsc);
    $("#lozka_jednoOS").val(ilosc_lo1);
    $("#lozka_dwaOS").val(ilosc_lo2);
    if(wolne == 1) {
        $('#wolne').prop('checked', true);
    } else { 
        $('#wolne').prop('checked', false);
    }
    $("#cena").val(cena);
    $("#manageModal").modal("show");
}

</script>