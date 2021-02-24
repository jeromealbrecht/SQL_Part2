<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');

$rdv = new Appointment(); //Nouvelle instance de class Appointment
$idAppointment = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

if ($idAppointment < 0){
    header('location: /index.php');
}

$profilrdv = $rdv->getApp($idAppointment);


include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/profil-rdv.php');

include(dirname(__FILE__).'/../views/templates/footer.php');

?>