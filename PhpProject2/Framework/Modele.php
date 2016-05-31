<?php

require_once 'Configuration.php';

abstract  class Modele
{
    private static $bdd;
    
    protected function executerRequete($sql, $param = null){
        if($param == null){
            $resultat = self::getBdd()->query($sql);
        }
        else{
            $resultat = self::getBdd()->prepare($sql);
            $resultat->execute($param);
        }
        return $resultat;
    }
    
    private static function getBdd(){
        if(self::$bdd == null){
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            
            self::$bdd = new PDO($dsn, $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
}
