<?php
    session_start();
    include "api/DbController.php";
    include "api/HotelApi.php";
    include "api/ApartamentApi.php";
    include "api/AccountApi.php";
    
    // for($i = 0; $i <= 100; $i++) {
    //     //AddApartament(rand(4,15), rand(1,8), rand(1,3), rand(1,3), 1, "", "");
    //     echo "Added new apartament </br>";
    // }
    print_r(GetHotelById(5));
?>