<?php

class Data {

    private static Data $Instance;

    protected function __construct(){}

    public static function getInstance() : Data {
        if(!isset(self::$Instance)){
            self::$Instance = new Data();
        }

        return self::$Instance;
    }

    const serverAdress = 'localhost';
    const userName = 'root';
    const password = 'Nav19121998.';


    const baseNameUsers = 'Users';
    private $connUser = null;
    const baseNameGames = 'Games';
    private $connGames = null;

    public function getUserBase() : mysqli{
        if(!isset($connUser)){
            $connUser = new mysqli(self::serverAdress,self::userName,self::password, self::baseNameUsers);    
        }
        return $connUser;
    }

    public function getGamesBase() : mysqli{
        if(!isset($connGames)){
            $connGames = new mysqli(self::serverAdress,self::userName,self::password, self::baseNameGames);    
        }
        return $connGames;
    }
}
