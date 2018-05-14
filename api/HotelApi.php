<?php
    include "model/hotel.php";

    function GetHotelById($id) {
        $stmt = Database::$db->prepare("SELECT `nazwa`, `miasto`, `adres`, `opis`, `wlasciciel` FROM `hotele` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($nazwa, $miasto, $adres, $opis, $wlasciciel);
        $stmt->store_result();
        $stmt->fetch();
        $hotel = new Hotel($id, $nazwa, $adres, $opis, $wlasciciel, $miasto);
        return $hotel;
    }

    function GetAllHotels($miasto) {
        $hotels = array();
        $stmt = Database::$db->prepare("SELECT `id`, `nazwa`, `miasto`, `adres`, `opis` FROM `hotele` WHERE `miasto` = ?");
        $stmt->bind_param("s", $miasto);
        $stmt->execute();   
        $stmt->bind_result($id, $nazwa, $miasto, $adres, $opis);
        $stmt->store_result();
        while($stmt->fetch()) {
            $hotel = new Hotel($id, $nazwa, $adres, $opis, 0, $miasto);
            array_push($hotels, $hotel);
        }
        return $hotels;
    }

    function DeleteHotel($id) {
        $stmt = Database::$db->prepare("DELETE FROM `hotele` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt = Database::$db->prepare("DELETE FROM `apartamenty` WHERE `id_hotelu` = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

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
        $stmt = Database::$db->prepare("SELECT `miasto` FROM `miasta` WHERE 1");
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