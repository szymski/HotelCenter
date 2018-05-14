<?php
    session_start();
    include_once "api/apis.php";

    if(IsFree(1,"2018-05-14")) {
        echo "free";
    } else {
        echo "nope";
    }
?>
