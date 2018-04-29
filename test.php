<?php

    include "api/DbController.php";
    include "api/HotelApi.php";
    include "api/ApartamentApi.php";
    
    if(AddApartament(4, 3, 1, 1, 1, "", "")) {
        echo "dziala";
    } else { echo "nie dziala"; }
?>