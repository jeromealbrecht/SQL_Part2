<?php

require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../utils/regexp.php'); 


$result = false;
$errorArray = array();
$rdv = new Appointment(); //Nouvelle instance de class Appointment
$patients = new Patient(); //Nouvelle instance de class Patient
//
//$userid = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
//
$idAppointment = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$profilPatient = $patients->listPatient();
$profilrdv = $rdv->getApp($idAppointment);
$dateHour = date('Y-m-d\TH:i',strtotime($profilrdv->dateHour));


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //On vérifie l'existence et on nettoie
    $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On teste si le champ n'est pas vide

        if(!empty($dateHour)){
        $testRegex = preg_match(REGEXP_MEET, $dateHour);

            if ($testRegex == false){
                $errorArray['dateHour_error'] = 'Merci de choisir un nom valide';
            }
        } else {
                $errorArray['dateHour_error'] = 'le champ est vide';
        }
  
    /***********************/

    $idPatients = trim(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT));

    // Si il n'y a pas d'erreur, alors, on enregistre en bdd
        if(empty($errorArray)){
            $Appoint = new Appointment($dateHour, $idPatients); // Création d'une instance d'objet
            $result = $Appoint->editrdv($idAppointment); // Appel de la méthode editrdv addPatient dans la class Patient
            //header('location: /index.php');
  
        }
}
    //======================================================

include(dirname(__FILE__).'/../views/templates/header.php');

    if($result===true){
        include(dirname(__FILE__).'/../views/modifrdv-ok.php');
    } else {
        include(dirname(__FILE__).'/../views/modify-appt.php');
    }

include(dirname(__FILE__).'/../views/templates/footer.php');


