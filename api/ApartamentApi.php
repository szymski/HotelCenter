<?php
    include "model/apartament.php";

    function AddApartament($id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena) {
        $stmt = Database::$db->prepare("INSERT INTO `apartamenty` (`id_hotelu`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne`, `cena`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiissi", $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena);
        return $stmt->execute();
    }

    function GetAllApartamenty() {
        $apartamenty = array();
        $stmt = Database::$db->prepare("SELECT 'id', 'id_hotelu', 'ilosc_miejsc', 'lozka_jednoOS', 'lozka_dwaOS', 'wolne' FROM `apartamenty` WHERE 1");
        $stmt->execute();
        $stmt->bind_result($id, $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne);
        $stmt->store_result();
        while($stmt->fetch()) {
            $apartament = new Apartament($id, $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne);
            array_push($apartamenty, $apartament);
        }
        return $apartamenty;
    }

    function DeleteApartament($id) {
        //DELETE apartamenty FROM apartamenty INNER JOIN hotele ON hotele.id = apartamenty.id_hotelu WHERE hotele.wlasciciel = 12 AND apartamenty.id = 1
        $stmt = Database::$db->prepare("DELETE apartamenty FROM apartamenty INNER JOIN hotele ON hotele.id = apartamenty.id_hotelu WHERE hotele.wlasciciel = ? AND apartamenty.id = ?");
        $stmt->bind_param("ii", $_SESSION["id"], $id);
        return $stmt->execute();
    }

    function UpdateWolne($id, $wolne) {
        $stmt = Database::$db->prepare("UPDATE `apartamenty` SET `wolne` = ? WHERE `id` = ?");
        $stmt->bind_param("ii", $wolne, $id);
        return $stmt->execute();
    }

    function UpdateApartament($id, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena) {
        $stmt = Database::$db->prepare("UPDATE `apartamenty` SET `ilosc_miejsc`= ?,`lozka_jednoOS`= ?,`lozka_dwaOS`= ?, `wolne`= ?, `cena` = ? WHERE `id` = ?");
        $stmt->bind_param("iiiiii", $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena, $id);
        return $stmt->execute();
    }

    function GetApartamentById($id) {
        $stmt = Database::$db->prepare("SELECT `id_hotelu`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne`, `cena` FROM `apartamenty` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena);
        $stmt->fetch();
        $apartament = new Apartament($id, $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena);
        return $apartament;
    }

    function GetApartamentByHotelId($id_hotelu) {
        $apartamenty = array();
        $stmt = Database::$db->prepare("SELECT `id`, `ilosc_miejsc`, `lozka_jednoOS`, `lozka_dwaOS`, `wolne` , `cena` FROM `apartamenty` WHERE `id_hotelu` = ?");
        $stmt->bind_param("i", $id_hotelu);
        $stmt->execute();
        $stmt->bind_result($id, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena);
        $stmt->store_result();
        while($stmt->fetch()) {
            $apartament = new Apartament($id, $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwaOS, $wolne, $cena);
            array_push($apartamenty, $apartament);
        }
        return $apartamenty;
    }

?>