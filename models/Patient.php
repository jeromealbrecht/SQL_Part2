<?php

require_once(dirname(__FILE__).'/../utils/database.php');

class Patient {

    private $_id;
    private $_lastname;
    private $_firstname;
    private $_birthdate;
    private $_phone;
    private $_mail;

    // attribut de connexion
    private $_pdo;

    public function __construct($lastname = null, $firstname = null, $birthdate = null, $phone = null, $mail = null){ // methode = fonction dans une classe, la magique a la particularité d'etre appelée à un certain moment
        $this->_lastname = $lastname; // Methode magique est appellée auto au moment de "New patient"
        $this->_firstname = $firstname; //elle va hydrater notre objet
        $this->_birthdate = $birthdate;
        $this->_phone = $phone;
        $this->_mail = $mail;
        $this->_pdo = Database::connect(); // Connexion à la base de données
    }

    public function addPatient(){

        $sql = "INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) 
                VALUES ('$this->_lastname', '$this->_firstname', '$this->_birthdate', '$this->_phone', '$this->_mail')"; 
        $this->_pdo->query($sql);
    }



    public function listPatient($resultSearch){
        $sql = 'SELECT * FROM `patients` WHERE `lastname` LIKE :resultSearch ';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':resultSearch',"%".$resultSearch."%", PDO::PARAM_STR);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $list;
    }

    public function getProfil($userid){
        $sql = 'SELECT * FROM `patients` WHERE id = :userid ';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();
        $patient = $stmt->fetch(PDO::FETCH_OBJ);
        return $patient;
    }

    public function editProfil($userid,$lastname,$firstname,$date,$mail,$phone){
        $sql = 'UPDATE `patients`
        SET `lastname` = :lastname,
          `firstname` = :firstname,
          `birthdate`= :birthdate,
          `mail` = :mail,
          `phone` = :phone
        WHERE id = :userid';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $date, PDO::PARAM_STR);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function deleteOnePatient($idPatient){

   // try {

            $sql = 'DELETE FROM `patients` WHERE `id`= :idPatient';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindValue(':idPatient', $idPatient, PDO::PARAM_INT);
            $stmt->execute(); //True or False
            return $stmt->rowCount();
      //  } catch (Exception $e) {
           // echo 'Exception reçue : ',  $e->getMessage(), "\n";
       // }
    }

    public function searchPatient($resultSearch){

    $sql = 'SELECT * FROM `patients` WHERE `lastname`= :resultSearch LIKE "%'.$resultSearch.'%" ';
    $stmt = $this->_pdo->prepare($sql);
    $stmt->bindValue(':resultSearch', $resultSearch, PDO::PARAM_STR);
    return $stmt->execute(array("%".$resultSearch."%")); //True or False
    }

}

// ORDER BY `lastname` DESC