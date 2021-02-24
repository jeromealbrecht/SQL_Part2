<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');

$userid = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$patients = new Patient(); //Nouvelle instance de class Patient
$appointment = new Appointment(); //Nouvelle instance de class Appointment
$profilPatient = $patients->getProfil($userid);

$rdv = $appointment->listApp();
$uniquerdv = $appointment->idAPP($userid);

if ($uniquerdv ===false){
    header('location: index.php');
}

if ($userid <= 0){
    header('location: /index.php');
} else {
    
    if(!$profilPatient){
        header('location: /index.php');
    }
}

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/profil-patient.php');

include(dirname(__FILE__).'/../views/templates/footer.php');

?>
