<?php 

require_once(dirname(__FILE__).'/../models/Patient.php');

require_once(dirname(__FILE__).'/../utils/regexp.php'); 

$errorArray = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //lastname
    //On vérifie l'existence et on nettoie
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    // On teste si le champ n'est pas vide
    if(!empty($lastname)){
        // On teste la valeur
        $testRegex = preg_match(REGEXP_NAME, $lastname);

        if ($testRegex == false){
            $errorArray['lastname_error'] = 'Merci de choisir un nom valide';
        }
    } else {
            $errorArray['lastname_error'] = 'le champ est vide';
    }
    /***********************/

        //firstname
    //On vérifie l'existence et on nettoie
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    // On teste si le champ n'est pas vide
    if(!empty($firstname)){
        // On teste la valeur
        $testRegex = preg_match(REGEXP_NAME, $firstname);

        if ($testRegex == false){
            $errorArray['firstname_error'] = 'Merci de choisir un nom valide';
        }
    } else {
            $errorArray['firstname_error'] = 'le champ est vide';
    }
    /***********************/

        //date
    //On vérifie l'existence et on nettoie
    $date = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    // On teste si le champ n'est pas vide
    if(!empty($date)){
        // On teste la valeur
        $testRegex = preg_match(REGEXP_DATE, $date);

        if ($testRegex == false){
            $errorArray['date_error'] = 'Merci de choisir une date valide';
        }
    } else {
            $errorArray['date_error'] = 'le champ est vide';
    }
    /***********************/

        //phone
    //On vérifie l'existence et on nettoie
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    // On teste si le champ n'est pas vide
    if(!empty($phone)){
        // On teste la valeur
        $testRegex = preg_match(REGEXP_PHONE, $phone);

        if ($testRegex == false){
            $errorArray['phone_error'] = 'Merci de choisir un nom valide';
        }
    } else {
            $errorArray['phone_error'] = 'le champ est vide';
    }
    /***********************/

        //mail
    //On vérifie l'existence et on nettoie
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    // On teste si le champ n'est pas vide
    if(!empty($mail)){
        // On teste la valeur
        $testRegex = preg_match(REGEXP_MAIL, $mail);

        if ($testRegex == false){
            $errorArray['mail_error'] = 'Merci de choisir un nom valide';
        }
    } else {
            $errorArray['mail_error'] = 'le champ est vide';
    }
    /***********************/


    // Si il n'y a pas d'erreur, alors, on enregistre en bdd
    if(empty($errorArray)){
        $patient = new Patient($lastname,$firstname,$date,$phone,$mail); // Création d'une instance d'objet (la class Patient)
        $patient->addPatient(); // Appel de la méthode publique addPatient dans la class Patient
        // $testregister = $patient->addPatient();
        // if ($testregister !== true){
        //     $codeError = 'Ce mail existe déjà !';
        }
    }
    //======================================================



}


/// Gestion du rendu des vues
include(dirname(__FILE__).'/../views/templates/header.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorArray)){
    
    include(dirname(__FILE__).'/../views/ajout-ok.php'); 

    
} else {

    include(dirname(__FILE__).'/../views/ajout-patient.php'); 

} 
include(dirname(__FILE__).'/../views/templates/footer.php');

?>