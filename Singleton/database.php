<?php

class DB{
    private static $_obj;

    public function __construct(){
        $this->dbh = new PDO("mysql:host=localhost;dbname=books", "root", "");
    }

    public static function getConnect(){
        if(!is_object(self::$_obj)){
            self::$_obj = (new self())->dbh;
        }
            return self::$_obj;
    }
}


?>