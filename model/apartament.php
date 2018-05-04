<?php

    static $id;
    static $id_hotelu;
    static $ilosc_miejsc;
    static $lozka_jednoOS;
    static $lozka_dwuOS;
    static $wolne;
    static $cena;

    class Apartament {
        
        function __construct($id, $id_hotelu, $ilosc_miejsc, $lozka_jednoOS, $lozka_dwuOS, $wolne, $cena = 0) {
            $this->id = $id;
            $this->id_hotelu = $id_hotelu;
            $this->ilosc_miejsc = $ilosc_miejsc;
            $this->lozka_jednoOS = $lozka_jednoOS;
            $this->lozka_dwuOS = $lozka_dwuOS;
            $this->wolne = $wolne;
            $this->cena = $cena;
        }

        function GetId() {
            return $this->id;
        }
    }
?>