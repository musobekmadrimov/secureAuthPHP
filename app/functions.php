<?php 

class func{
    public static function checkLoginState($connection){
        if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESID'])){
            session_start();
        }

        if (isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])) {
            $id = $_COOKIE['id'];
            $token = $_COOKIE['token'];
            $serial = $_COOKIE['serial'];
        }
    }
}


?>