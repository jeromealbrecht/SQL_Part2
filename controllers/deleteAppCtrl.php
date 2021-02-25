<?php

require_once(dirname(__FILE__).'/../models/Appointment.php');

$idAppointment = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT))); //Récupérer l'id dans le GET
$appointment = new Appointment(); //Nouvelle instance de class App
$rdv = $appointment->listApp(); // Liste des rdv


if ($idAppointment <= 0){ // si l'id est inférieur ou = à 0 = on renvoie sur l'index
    header('location: /index.php');
} 

$remove = $appointment->deleteApp($idAppointment); // Suppression 

$code = $remove == 0 ? 0 : 1;

header('location: /controllers/list-rdvCtrl.php?err='.$code);

?>