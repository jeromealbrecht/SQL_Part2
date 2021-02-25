<?php

require_once(dirname(__FILE__).'/../models/Patient.php');

$idPatient = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT))); //Récupérer l'id dans le GET
$patient = new Patient(); //Nouvelle instance de class Patient

if ($idPatient <= 0){ // si l'id est inférieur ou = à 0 = on renvoie sur l'index
    header('location: /index.php');
} 

$removePatient = $patient->deleteOnePatient($idPatient); // Suppression du patient

$patients = $patient->listPatient();

$code = $remove == 0 ? 1 : 0;

header('location: /controllers/list-patientCtrl.php?err='.$code);

?>