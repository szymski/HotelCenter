<?php
    include "api/ApartamentApi.php";
    include "api/WynajemApi.php";
//INSERT INTO `wynajem` (`id`, `data_in`, `data_out`, `id_apartamentu`) VALUES (NULL, '2018-04-26', '2018-04-27', '2');
    GetFree('2018-04-26', '2018-04-27', "Rybnik");
?>