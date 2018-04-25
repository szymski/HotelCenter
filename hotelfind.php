<?php
    include "api/AparamentApi.php";
    include "api/WynajemApi.php";
    
$error = false;
$success = false;

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


?>