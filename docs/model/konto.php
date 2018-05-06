<?php
    class Konto {

        public $id;
        public $nick;
        public $login;
        public $haslo;

        function __construct($id, $nick, $login, $haslo) {
            $this->nick = $nick;
            $this->login = $login;
            $this->haslo = $haslo;
        }
    }
?>