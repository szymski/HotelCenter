<?php

    static $nazwa;
    static $adres;
    static $opis;
    static $wlasciciel;
    static $miasto;

    class Hotel {

        function __construct($id, $nazwa, $adres, $opis, $wlasciciel, $miasto) {
            $this->id = $id;
            $this->nazwa = $nazwa;
            $this->adres = $adres;
            $this->opis = $opis;
            $this->wlascicel = $wlasciciel;
            $this->miasto = $miasto;
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