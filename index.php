<?php 

include(dirname(__FILE__).'/views/templates/header.php'); 
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-xl-6">
            <p class="h4 mb-4 text-center">Bienvenue Chez Larry's Hospital</p>

            <p class="mb-4 text-center">Que souhaitez vous faire ?</p>

            <a href="/controllers/ajout-patientCtrl.php"><button
                    class="btn secondary-color text-white btn-block my-4">Ajouter un patient</button></a>
            <a href="/controllers/list-patientCtrl.php"><button
                    class="btn secondary-color text-white btn-block my-4">Accéder à la liste des patients</button></a>
            <a href="/controllers/rendez-vousCtrl.php"><button
                    class="btn secondary-color text-white btn-block my-4">Ajout rendez-vous</button></a>
            <a href="/controllers/list-rdvCtrl.php"><button
                    class="btn secondary-color text-white btn-block my-4">Accéder à la liste des Rendez-vous</button></a>
        </div>
    </div>
</div>

<?php
include(dirname(__FILE__).'/views/templates/footer.php'); 
?>