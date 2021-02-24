<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

                <div class="container bcontent">
                    <div class="card">
                        <div class="row no-gutters justify-content-center">
                            <p class="text-center">Rendez-vous du patient<p>
                                    <div class="col-sm-12">
                                        <div class="card-body">
                                            <h5 class="card-title">Id Rdv : <?= $profilrdv->idAppointment ?></h5>
                                            <p class="card-text">Nom : <?= $profilrdv->lastname ?> <br>
                                                Prénom : <?= $profilrdv->firstname ?> <br>
                                                Date de rendez-vous : <?= $profilrdv->dateHour ?> <br>
                                                E-mail : <?= $profilrdv->mail ?> <br>
                                                Téléphone : <?= $profilrdv->phone ?> <br></p>
                                            <a href="/controllers/modifyAppCtrl.php?id=<?= $profilrdv->idAppointment ?>"><button
                                                    class="btn secondary-color text-white btn-block my-4">Modifier le
                                                    rdv</button></a>
                                            <a href="/controllers/ajout-patientCtrl.php"><button
                                                    class="btn secondary-color text-white btn-block my-4">Retourner sur
                                                    le
                                                    formulaire d'ajout</button></a>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>