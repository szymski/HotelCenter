<?php
    // ale mi sie tego robic nie chce, jest 1:22 ffs. chce spać ale Dydlak mi grozi że mnie pobije, pomocy.
    // SELECT `id` FROM `rezerwacje` WHERE `id_apartamentu` = 1 AND `data_in` > "2018-05-19" AND `data_in` < "2018-05-19"
    // SELECT `id` FROM `rezerwacje` WHERE `id_apartamentu` = 1 AND `data_out` < "2018-05-19"
    function IsFree($id_apartamentu, $data_in) {
        $stmt = Database::$db->prepare("SELECT `id` FROM `rezerwacje` WHERE `id_apartamentu` = ? AND `data_out` > ?");
        $stmt->bind_param("is", $id_apartamentu, $data_in);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->fetch()){
            return false;
        } else { return true; }
    }

    function AddNewReservation($data_in, $data_out, $id_apartamentu, $id_hotelu, $cena, $user_id) {
        $stmt = Database::$db->prepare("INSERT INTO `rezerwacje`(`data_in`, `data_out`, `id_apartamentu`, `id_hotelu`, `cena`, `user_id`) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssiiii", $data_in, $data_out, $id_apartamentu, $id_hotelu, $cena, $user_id);
        return $stmt->execute();
    }

    function DeleteReservation() {

    }

    function GetReservation() {

    }

    function GetAllReservation() {

    }

?>