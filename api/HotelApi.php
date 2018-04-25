<?php

    include_once "DbController.php";
    include "model/hotel.php";

    function AddHotel($nazwa, $miasto, $adres, $opis, $wlasciciel) {
        $stmt = Database::$db->prepare("INSERT INTO `hotele` (`nazwa`, `miasto`, `adres`, `opis`, `wlasciciel`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $nazwa, $miasto, $adres, $opis, $wlasciciel);
        return $stmt->execute();
    }

    function CountHotelsInCity($miasto) {
        $stmt = Database::$db->prepare("SELECT COUNT(hotele.miasto) FROM hotele WHERE hotele.miasto LIKE ?");
        $stmt->bind_param("s", $miasto);
        $stmt->execute();
        $stmt->bind_result($ilosc);
        $stmt->store_result();
        $stmt->fetch();
        return $ilosc;
    }

    function GetAllCities() {
        $miasta = array();
        $stmt = Database::$db->prepare("SELECT `miasto` FROM `hotele` WHERE 1");
        $stmt->execute();
        $stmt->bind_result($miasto);
        $stmt->store_result();
        while($stmt->fetch()) {
            if(!in_array($miasto, $miasta)) {
                array_push($miasta, $miasto);
            }
        }
        return $miasta;
    }

    function GetAllHotelsByUserId($id) {
        $hotele = array();
        $stmt = Database::$db->prepare("SELECT `id`, `nazwa`, `miasto`, `adres` FROM `hotele` WHERE `wlasciciel` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $nazwa, $miasto, $adres);
        $stmt->store_result();
        while($stmt->fetch()) {
            $hotel = new Hotel($id, $nazwa, $adres, "", 0, $miasto);
            array_push($hotele, $hotel);
        }
        return $hotele;
    }
?>