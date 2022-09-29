<?php
    if ($_SERVER['REQUEST_METHOD'] != "POST" && $_SERVER['REQUEST_METHOD'] != "GET") {
        http_response_code(405);
        die();
    } else if($_SERVER['REQUEST_METHOD'] == "POST") {
        require_once "php/writeHit.php";
    } else {
        require_once "php/readHit.php";
    }
?>