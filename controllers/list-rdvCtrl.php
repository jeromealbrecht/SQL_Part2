<?php
//require_once(dirname(__FILE__).'/../models/Patient.php');

require_once(dirname(__FILE__).'/../models/Appointment.php');

//$patient = new Patient(); //Nouvelle instance de class Patient
$appointment = new Appointment(); //Nouvelle instance de class App
//$userid = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
//$profilPatient = $patient->listPatient($userid);

$rdv = $appointment->listApp();

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-rdv.php');

include(dirname(__FILE__).'/../views/templates/footer.php');

