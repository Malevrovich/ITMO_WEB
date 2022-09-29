<?php

class AuthManager {
    private $uid;

    private function auth() {
        $this->$uid = uniqid();
        
        if(!array_key_exists("uid", $_COOKIE)){
            setcookie("uid", $this->$uid, time() + 3600, "/");
        } else {
            $this->$uid = $_COOKIE["uid"];
        }
    }

    function getUid() {
        if(!isset($this->$uid)) {
            $this->auth();
        }
        return $this->$uid;
    }
}

?>