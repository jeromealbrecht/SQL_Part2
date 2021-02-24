<?php

require_once(dirname(__FILE__).'/../utils/database.php');

class Appointment {

    private $_id;
    private $_dateHour;
    private $_idPatients;

    // attribut de connexion
    private $_pdo;

    public function __construct($dateHour = null, $idPatients = null){ // methode = fonction dans une classe, la magique a la particularité d'etre appelée à un certain moment
        $this->_dateHour = $dateHour; // Methode magique est appellée auto au moment de "New patient"
        $this->_idPatients = $idPatients; //elle va hydrater notre objet
        $this->_pdo = Database::connect(); // Connexion à la base de données
    }

    public function addAppoitment(){

        $sql = "INSERT INTO `appointments` (`dateHour`, `idPatients`) 
                VALUES ('$this->_dateHour', '$this->_idPatients')"; 
        $this->_pdo->query($sql);
    }

    public function listApp(){
        $sql = 'SELECT `appointments`.`id` as `idAppointment`, `patients`.`id` 
        as `idPatients`, `appointments`.`dateHour`,`patients`.`lastname`,
        `patients`.`firstname`,`patients`.`mail`
        FROM `appointments` INNER JOIN `patients` 
        ON `appointments`.`idPatients` = `patients`.`id`';
        $stmt = $this->_pdo->query($sql);
        $list = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $list;
    }

    public function getApp($userid){
        $sql = 'SELECT `appointments`.`id` as `idAppointment`, `patients`.`id` 
        as `idPatients`, `appointments`.`dateHour`,`patients`.`lastname`,
        `patients`.`firstname`,`patients`.`mail`, `patients`.`phone`
        FROM `appointments` INNER JOIN `patients` 
        ON `appointments`.`idPatients` = `patients`.`id` WHERE `appointments`.`id` = :userid ';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();
        $appointment = $stmt->fetch(PDO::FETCH_OBJ);
        return $appointment;
    }

    public function editrdv($id){
        $sql = 'UPDATE `appointments`
        SET `dateHour`= :dateHour, `idPatients`= :idPatients
        WHERE id = :idAppointment';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
        $stmt->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_INT);
        $stmt->bindValue(':idAppointment', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function idAPP($userid){
        $sql = 'SELECT * FROM `appointments` WHERE `idPatients` = :userid';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $list;
    }
    
}