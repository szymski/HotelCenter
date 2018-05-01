<?php
    function AddImageToHotel($id, $file) {
        $fileName = $file["name"];
        $size = $file['size'];
        $type = $file['type'];
        $ext = explode(".", $fileName)[1];
        $newName = uniqid("", true);
        if($size > 0 && $type == "image/jpeg" || $type == "image/png") {
            $stmt = Database::$db->prepare("DELETE FROM `zdjecia` WHERE `id_hotelu` = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt = Database::$db->prepare("INSERT INTO `zdjecia` (`id_hotelu`, `nazwa`) VALUES (?, ?)");
            $stmt->bind_param("is", $id, $newName);
            if($stmt->execute()) {
                $newPath = "C:/xampp/htdocs/images/" . $newName . "." . $ext;
                move_uploaded_file($file["tmp_name"], $newPath);
                return true;
            }
        } else {
            return false;
        }
    }

    function GetPathByHotelId($id) {
        $stmt = Database::$db->prepare("SELECT `nazwa` FROM `zdjecia` WHERE `id_hotelu` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($nazwa);
        $stmt->store_result();
        $stmt->fetch();
        if(isset($nazwa)) {
            return "images/" . $nazwa . ".jpg";
        }
    }
?>