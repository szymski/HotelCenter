<?php

    include "api/DbController.php";
    include "api/HotelApi.php";
    include "api/ApartamentApi.php";
   //INSERT INTO `wynajem` (`id`, `data_in`, `data_out`, `id_apartamentu`) VALUES (NULL, '2018-04-26', '2018-04-27', '2');
    
    $kek = GetAllFree();
    foreach($kek as $d) {
        print_r($d);
        echo "</br>";
    }
    // to jest zjebane
?>