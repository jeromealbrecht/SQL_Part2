<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

$resultSearch = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
$patient = new Patient(); //Nouvelle instance de class Patient
$patients = $patient->listPatient($resultSearch);

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/templates/footer.php');

