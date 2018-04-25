<?php

    include "DbController.php";
    include "model/konto.php";

    function Login($login, $haslo) {
        $stmt = Database::$db->prepare("SELECT id FROM konta WHERE `login` = ? AND `haslo` = ?");
        $HashHaslo = hashPassword($haslo);
        $stmt->bind_param("ss", $login, $HashHaslo);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows == 1) {
            $stmt->bind_result($id);
            $stmt->fetch();
            $_SESSION["id"] = $id;
            return true;
        }
        else {
            return false;
        }
    }

    function IsHost($id) {
        $stmt = Database::$db->prepare("SELECT `wlasciciel` FROM `hotele` WHERE `wlasciciel` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows == 0;
    }

    function IsUserNameFree($login) {
        $stmt = Database::$db->prepare("SELECT `login` FROM `konta` WHERE `login` = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows == 0;
    }

    function AddAccount($nick, $login, $haslo) {
        $haslo = hashPassword($haslo);
        $stmt = Database::$db->prepare("INSERT INTO `konta` (`nick`, `login`, `haslo`) VALUES (?,?,?)");
        $stmt->bind_param("sss", $nick, $login, $haslo);
        return $stmt->execute();
    }

    function Remove($id) {
        $stmt = Database::$db->prepare("DELETE FROM `konta` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
       return $stmt->execute();
    }

    function Get($id) {
        $stmt = Database::$db->prepare("SELECT `id`, `nick`, `login`, `haslo` FROM `konta` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $nick, $login, $haslo);
        $stmt->fetch();
        $konto = new Konto($id, $nick, $login, $haslo);
        return $konto;
    }

    function ChangePassword($nowe, $id) {
        $nowe = hashPassword($nowe);
        $stmt = Database::$db->prepare("UPDATE `konta` SET `haslo` = ? WHERE `id` = ?");
        $stmt->bind_param("si", $nowe, $id);
        return $stmt->execute();
    }

    function ChangeNick($nick, $id) {
        $stmt = Database::$db->prepare("UPDATE `konta` SET `nick` = ? WHERE `id` = ?");
        $stmt->bind_param("si", $nick, $id);
        return $stmt->execute();
    }

    function hashPassword($password) {
       return hash('sha256', $password);
    }
?>