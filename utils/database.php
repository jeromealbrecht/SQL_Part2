<?php

class Database{

    public static function connect(){

        try{
            $pdo = new PDO('mysql:host=localhost;dbname=hospitale2n', 'adminhosp','Turfubooba456');    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $error){
            echo 'Erreur de connexion';
            return false;
        }
        
    }

}










