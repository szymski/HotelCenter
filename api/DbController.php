<?php

class Database {

    private static $login = "root";
    private static $password = "";
    private static $dbname = "hotelcenter";
    public static $db = "";

    function connect() {
        self::$db = mysqli_connect('localhost', self::$login, self::$password, self::$dbname);
        self::$db->query("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
        self::$db->query("SET CHARSET utf8");
        if(!self::$db) {
            echo "database connection failed";
        }
    }
}

Database::Connect();

?>