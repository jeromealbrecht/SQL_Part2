<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

$patient = new Patient(); //Nouvelle instance de class Patient

$patients = $patient->listPatient();


include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patients.php');

include(dirname(__FILE__).'/../views/templates/footer.php');

