<?php
    session_start();
    include "api/DbController.php";
    include "api/HotelApi.php";
    include "api/ApartamentApi.php";
    include "api/AccountApi.php";
    include "api/FileApi.php";

    echo GetPathByHotelId(5);
?>
