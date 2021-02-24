<?php

require_once(dirname(__FILE__).'/../models/Appointment.php');

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../utils/regexp.php'); 


$errorArray = array(); // Déclaration tableau d'erreur vide
$patient = new Patient(); // Instancier la classe Patient
$allPatients = $patient->listPatient(); // Appeler la fonction pour lister
$idPatients = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //On vérifie l'existence et on nettoie
    $idPatients = trim(filter_input(INPUT_POST, 'patientSelected', FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On teste si le champ n'est pas vide
    if(!empty($idPatients)){
        // On teste la valeur
        $testRegex = true;
        // $testRegex = preg_match(REGEXP_NAME, $idPatients);

        if ($testRegex == false){
            $errorArray['idPatients_error'] = 'Merci de choisir un nom valide';
        }
    } else {
            $errorArray['idPatients_error'] = 'le champ est vide';
    }
    /***********************/
    
    //On vérifie l'existence et on nettoie
    $dateHour = trim(filter_input(INPUT_POST, 'meeting', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
    // On teste si le champ n'est pas vide
    //if(!empty($dateHour)){
        // On teste la valeur
        //$testRegex = true;
        // $testRegex = preg_match(REGEXP_NAME, $dateHour);

        //if ($testRegex == false){
        //    $errorArray['dateHour_error'] = 'Merci de choisir un nom valide';
       // }
  //  } else {
   //         $errorArray['dateHour_error'] = 'le champ est vide';
   // }
    /***********************/

    // Si il n'y a pas d'erreur, alors, on enregistre en bdd
    if(empty($errorArray)){
        $Appoint = new Appointment($dateHour,$idPatients); // Création d'une instance d'objet (la class Patient)
        $Appoint->addAppoitment(); // Appel de la méthode publique addPatient dans la class Patient
        //header('location: /index.php');
    }
    //======================================================
}

/// Gestion du rendu des vues
include(dirname(__FILE__).'/../views/templates/header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorArray)){
    
    include(dirname(__FILE__).'/../views/rendezvous-ok.php'); 

    
} else {


    include(dirname(__FILE__).'/../views/rendez-vous.php'); 

} 
include(dirname(__FILE__).'/../views/templates/footer.php');

?>