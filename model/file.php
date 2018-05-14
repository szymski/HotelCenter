<?php

    class File {

        public $id; 
        public $path;

        function __construct($id, $path) {
            $this->id = $id;
            $this->path = $path;
        }
    }
?>