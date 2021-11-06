<!-- This class has public functions that gets,sets and resets variables  -->
<?php
Class Flash{

    public static function set($data = array()){
        if(is_array($data)){
            foreach ($data as $key => $dt){
                $_SESSION[$key] = $dt;
            }
        }
        return true;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            $value = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $value;
        }
        else{
            return null;
        }
    }

    public static function setOld(){
        $data = $_POST;
        $_SESSION['old'] = $data;
    }
    public static function getOld($key){
        if(isset($_SESSION['old'][$key])){
            return $_SESSION['old'][$key];
        }
        else{
            return null;
        }
    }

    public static function resetOld(){
        if(isset($_SESSION['old'])){
            $_SESSION['old'] = null;
        }
    }
}