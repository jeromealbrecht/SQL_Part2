<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

            <div class="container bcontent">
        <div class="card">
            <div class="row justify-content-center no-gutters ">
        <p class="text-center"> Profil du patient <p>
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title">Id patient : <?= $profilPatient->id ?></h5>
                        <p class="card-text">Nom : <?= $profilPatient->lastname ?> <br>
                        Prénom : <?= $profilPatient->firstname ?> <br>
                        Date de naissance : <?= $profilPatient->birthdate ?> <br>
                        E-mail : <?= $profilPatient->mail ?> <br>
                        Téléphone : <?= $profilPatient->phone ?> <br></p>
                        <a href="/controllers/modify-patientCtrl.php?id=<?= $profilPatient->id ?>"><button
                        class="btn secondary-color text-white btn-block my-4">Modifier le patient</button></a>
                    <a href="/controllers/ajout-patientCtrl.php"><button
                        class="btn secondary-color text-white btn-block my-4">Retourner sur le
                        formulaire d'ajout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
                
                