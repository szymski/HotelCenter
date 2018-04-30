<?php
    function AddImage($id, $file) {
        $fileName = $file["name"];
        $size = $file['size'];
        $type = $file['type'];
        if($size > 0 && $type == "image/jpeg") {
            $stmt = Database::$db->prepare("UPDATE `hotele` SET `image` = ? WHERE `id` = ?");
            $stmt->bind_param("si", $fileName, $id);
            if($stmt->execute()) {
                $newPath = 'C:/xampp/htdocs/images/'. $fileName;
                move_uploaded_file($file["tmp_name"], $newPath);
                return true;
            } else { return false; }
        } else { return false; }
    }
?>