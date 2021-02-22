<?php 

class func{
    public static function checkLoginState($dbh){
        if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESID'])){
            session_start();
        }

        if (isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial'])) {
            $query = "SELECT * FROM sessions WHERE sessions_userid = :userid AND sessions_token = :token AND sessions_serial = :serial;";
            $userid = $_COOKIE['id'];
            $token = $_COOKIE['token'];
            $serial = $_COOKIE['serial'];

            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':userid' => $userid, ':token' => $token, ':serial' => $serial));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['sessions_userid'] > 0){
                if ($row['sessions_userid'] == $_COOKIE['id'] && $row['sessions_token'] == $_COOKIE['token'] && $row['sessions_serial'] == $_COOKIE['serial']){
                    if ($row['sessions_userid'] == $_SESSION['id'] && $row['sessions_token'] == $_SESSION['token'] && $row['sessions_serial'] == $_SESSION['serial']){
                        return true;
                    }
                }
            }
        }
    }
}


?>