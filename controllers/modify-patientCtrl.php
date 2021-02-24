<?php
require_once(dirname(__FILE__).'/../models/Patient.php');

require_once(dirname(__FILE__).'/../utils/regexp.php'); 

$result = false;
$errorArray = array();
$userid = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$patient = new Patient(); //Nouvelle instance de class Patient

$profilPatient = $patient->getProfil($userid);
if($profilPatient == false){
    header('location: /index.php');
}


// if ($userid <= 0){
//     header('location: /index.php');
// } else {

//     if(empty($profilPatient)){
//         header('location: /index.php');
//     }
// }



if ($_SERVER['REQUEST_METHOD'] == 'POST'){   // Verification et nettoyage des inputs

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

        if(empty($errorArray)){
            //Enregistrement des données du form
            $result = $patient->editProfil($userid,$lastname,$firstname,$date,$mail,$phone);
        }
    
}


include(dirname(__FILE__).'/../views/templates/header.php');

    if($result===true){
        include(dirname(__FILE__).'/../views/modif-ok.php');
    } else {
        include(dirname(__FILE__).'/../views/modif-patient.php');
    }

include(dirname(__FILE__).'/../views/templates/footer.php');


?>
