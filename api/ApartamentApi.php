<?php
    include "DbController.php";
    include "model/apartament.php";

    function UpdateApartament($id, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne) {
        $stmt = Database::$db->prepare("UPDATE `apartamenty` SET `ilosc_miejsc`= ?,`lozka_jednoOS`= ?,`lozka_dwaOS`= ?,`wolne`= ? WHERE `id` = ?");
        $stmt->bind_param("iiiii", $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne , $id);
        return $stmt->execute();
    }

    function GetApartamentById($id) {
        $stmt = Database::$db->prepare("SELECT `id_hotelu`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne` FROM `apartamenty` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne);
        $stmt->fetch();
        $apartament = new Apartament($id, $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne);
        return $apartament;
    }

    function GetApartamentByHotelId($id_hotelu) {
        $apartamenty = array();
        $stmt = Database::$db->prepare("SELECT `id`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne` FROM `apartamenty` WHERE `id_hotelu` = ?");
        $stmt->bind_param("i", $id_hotelu);
        $stmt->execute();
        $stmt->bind_result($id, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne);
        $stmt->store_result();
        while($stmt->fetch()) {
            $apartament = new Apartament($id, $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne);
            array_push($apartamenty, $apartament);
        }
        return $apartamenty;
    }

?>