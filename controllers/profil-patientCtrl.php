<?php

require_once(dirname(__FILE__).'/../models/Patient.php');

$patients = new Patient(); //Nouvelle instance de class Patient
$userid = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));



if ($userid <= 0){
    header('location: /index.php');
} else {
    $profilPatient = $patients->getProfil($userid);
    if(!$profilPatient){
        header('location: /index.php');
    }
}

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/profil-patient.php');

include(dirname(__FILE__).'/../views/templates/footer.php');

?>
