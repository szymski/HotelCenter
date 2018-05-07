<?php
    include "api/apis.php";

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
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_FILES["file"]) && !empty($_FILES["file"])) {
            $file = $_FILES["file"];
        } else { $error = true; }
        if(isset($_POST["id"]) && !empty($_POST["id"])) {
            $id = $_POST["id"];
        } else { $error = true; }
        if(!$error) {
            if(AddImageToHotel($id, $file)) {
                $success = true;
            } else { $error = true; }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HotelCenter - Zarzadzaj</title>
  </head>

  <body>
    <?php include "css/navbar.php"; ?>
    <?php if($error) { ?>
    <center>
      <div class="alert alert-danger mt-2 w-75" role="alert">
        <center>Cos poszlo nie tak</center>
      </div>
    </center>
    <?php } ?>
    <?php if($success) { ?>
    <div class="alert alert-success" role="alert">
      <center>Zdjecie zostalo wyslane</center>
    </div>
    <?php } ?>
    <div class="container mt-2">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nazwa</th>
              <th scope="col">Miasto</th>
              <th scope="col">Adres</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            <?php for($i = 0; $i <= count($hotele)-1; $i++) { ?>
            <tr>
              <th scope="row">
                <?=$i+1?>
              </th>
              <td>
                <?=$hotele[$i]->GetName();?>
              </td>
              <td>
                <?=$hotele[$i]->GetCity();?>
              </td>
              <td>
                <?=$hotele[$i]->GetAdres();?>
              </td>

              <td>
                <input class="btn" type="button" value="Zarządzaj" onclick="window.location.href='/apartaments.php?id=<?=$hotele[$i]->GetId();?>'" />
              </td>
              <td>
                <button type="button" class="btn btn-warning" onclick="fileModal('<?=$hotele[$i]->id;?>')">Obraz</button>
              </td>
              <td>
                <button type="button" class="btn btn-danger" onclick="deleteModal('<?=$hotele[$i]->id;?>', '<?=$hotele[$i]->nazwa;?>')">Usuń</button>
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
                    <p>Usunięcie hotelu spowoduje usunięcie wszystkich apartamentów i przywrócenie hotelu będzie nie możliwe. </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="delete-modal-button">Usuń</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal" id="fileModal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Ustaw obraz hotelu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                  </div>
                  <div class="modal-body text-center">
                    <form action="" method="post" enctype="multipart/form-data">
                      <input type="file" name="file" id="file">
                      <input type="hidden" name="id" id="hotel-id">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="file-modal-button">Wyślij</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                  </div>
                </div>
              </div>
            </div>

          </tbody>
        </table>
      </div>
    </div>
    <?php include "css/footer.php"; ?>
  </body>

  </html>

  <script>
    function deleteModal(id, nazwa) {
      $("#deleteTitle").text("Czy chcesz usunąć hotel : " + nazwa);
      $("#delete-modal-button").attr("onclick", "window.location.href='/hotelmanager.php?id=" + id + "'");
      $("#deleteModal").modal("show");
    }

    function fileModal(id) {
      $("#hotel-id").val(id);
      $("#fileModal").modal("show");
    }
  </script>
