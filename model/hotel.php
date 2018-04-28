<?php

    static $nazwa;
    static $adres;
    static $opis;
    static $wlasciciel;
    static $miasto;
    static $imgurl;

    class Hotel {

        function __construct($id, $nazwa, $adres, $opis, $wlasciciel, $miasto, $imgurl) {
            $this->id = $id;
            $this->nazwa = $nazwa;
            $this->adres = $adres;
            $this->opis = $opis;
            $this->wlascicel = $wlasciciel;
            $this->miasto = $miasto;
            $this->imgurl = $imgurl;
        }

        function GetName() {
            return $this->nazwa;
        }

        function GetCity() {
            return $this->miasto;
        }

        function GetAdres() {
            return $this->adres;
        }

        function GetId() {
            return $this->id;
        }
    }
?>