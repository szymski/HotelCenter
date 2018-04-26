<?php
//SELECT `id_apartamentu` FROM `wynajem` WHERE `data_in` >= '2018-04-20' AND `data_out` <= '2018-05-20'
//SELECT `id_hotelu` FROM `apartamenty` INNER JOIN `wynajem` ON `apartamenty`.`id` = `wynajem`.`id_apartamentu`;
//SELECT `miasto` FROM `hotele` INNER JOIN `apartamenty` ON `hotele`.`id` = `apartamenty`.`id_hotelu` INNER JOIN `wynajem` ON `apartamenty`.`id` = wynajem.id
// potrzebuje hotele ktorych aprartamenty NIE sa w wynajem i sa w podanym miescie

    function GetOccupied($data_in, $data_out) {
        $apartamentyID = array();
        $apartamenty = array();
        $stmt = Database::$db->prepare("SELECT id_apartamentu FROM wynajem WHERE data_in >= ? AND data_out <= ?");
        $stmt->bind_param("ss", $data_in, $data_out);
        $stmt->execute();
        $stmt->bind_result($id_apartamentu);
        $stmt->store_result();
        while($stmt->fetch()) {
            array_push($apartamentyID, $id_apartamentu);
        }
        return $apartamentyID;
    }

?>


