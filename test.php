<?php
    session_start();
    include "api/DbController.php";
    include "api/HotelApi.php";
    include "api/ApartamentApi.php";
    include "api/AccountApi.php";
    include "api/FileApi.php";

    $error = false;
    $success = false;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_FILES["file"]) && !empty($_FILES["file"])) {
            $file = $_FILES["file"];
            print_r($file); //debug
            if(AddImage(5, $file)) {
                $success = true;
            } else { $error = true; }
        } else { $error = true; }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <button type="submit">wyslij</button>
</form>