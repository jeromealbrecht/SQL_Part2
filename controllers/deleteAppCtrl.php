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

//include(dirname(__FILE__).'/../views/list-rdv.php');

// include(dirname(__FILE__).'/../views/templates/header.php');

// if ( confirm( "Voulez-vous vraiment supprimer le patient?" ) ) {
//     Code à éxécuter si le l'utilisateur clique sur "OK"
// } else {
//     Code à éxécuter si l'utilisateur clique sur "Annuler" 
// }

// if($remove===true){
//     include(dirname(__FILE__).'/../views/delete-ok.php');
//     include(dirname(__FILE__).'/../views/list-rdv.php');

// } else {
//     include(dirname(__FILE__).'/../views/list-rdv.php');
// }

// include(dirname(__FILE__).'/../views/templates/footer.php');