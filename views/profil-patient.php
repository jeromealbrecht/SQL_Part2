<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-10 justify-content-center">
            <div class="col-sm-6 col-md-6 text-center justify-content-center">

                <div class="container bcontent">
                    <div class="card">
                        <p class="text-center"> Profil du patient <p>

                                <div class="card-body">
                                    <h5 class="card-title">Id patient : <?= $profilPatient->id ?></h5>
                                    <p class="card-text">Nom : <?= $profilPatient->lastname ?> <br>
                                        Prénom : <?= $profilPatient->firstname ?> <br>
                                        Date de naissance : <?= $profilPatient->birthdate ?> <br>
                                        E-mail : <?= $profilPatient->mail ?> <br>
                                        Téléphone : <?= $profilPatient->phone ?> <br></p>

                                    <?php //include(dirname(__FILE__).'/../views/liste-rdv.php');?>
                                </div>
                    </div>
                </div>

                <div class="border border-light p-5">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Edit :</th>
                                <th scope="col">Id :</th>
                                <th scope="col">Date & heure :</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

foreach ($uniquerdv as $value){ ?>

                            <tr>
                            <td class="alert alert-primary text-center"><a
                                        href="/controllers/modify-patientCtrl.php?id=<?= $value->idPatients ?>"><i
                                            class="far fa-edit"><?= $value->idPatients ?></i></a>
                                </td>
                                <td class="alert alert-primary text-center"><a
                                        href="/controllers/profil-rdvCtrl.php?id=<?= $value->idPatients ?>"><i
                                            class="fas fa-portrait"><?= $value->idPatients ?></i></a>
                                </td>

                                <td class="alert alert-primary text-center"><a
                                        href="profil-patientCtrl.php?id=<?= $value->idPatients ?>"><?= $value->dateHour ?></a>
                                </td>

                            </tr>
                            <?php
}
?>

                        </tbody>
                    </table>
                    
                            <a href="/controllers/ajout-patientCtrl.php"><button
                            class="btn secondary-color text-white btn-block my-4">Retourner sur le
                            formulaire d'ajout</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>