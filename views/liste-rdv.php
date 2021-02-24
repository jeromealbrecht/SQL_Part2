<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-xl-10">
            <div class="border border-light p-5">
                <table class="table text-center">
                <h2 class="text-center">Liste des rendez-vous</h2>

                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Id :</th>
                            <th scope="col">Nom :</th>
                            <th scope="col">Prénom :</th>
                            <th scope="col">Date & heure :</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

foreach ($rdv as $value){ ?>

                        <tr>
                        <td class="alert alert-primary text-center"><a
                                    href="/controllers/deleteAppCtrl.php?id=<?= $value->idAppointment ?>"><i
                                    class="fas fa-window-close"> Remove</i></a>
                                    
                        </td>
                            <td class="alert alert-primary text-center"><a
                                    href="/controllers/profil-rdvCtrl.php?id=<?= $value->idAppointment ?>"><i
                                    class="fas fa-portrait"><?= $value->idPatients ?></i></a>
                        </td>
                            <td class="alert alert-primary text-center"><a
                                    href="profil-patientCtrl.php?id=<?= $value->idAppointment ?>"><?= $value->lastname ?></a>
                            </td>
                            <td class="alert alert-primary text-center"><a
                                    href="profil-patientCtrl.php?id=<?= $value->idAppointment ?>"><?= $value->firstname ?></a>
                            </td>
                            <td class="alert alert-primary text-center"><a
                                    href="profil-patientCtrl.php?id=<?= $value->idAppointment ?>"><?= $value->dateHour ?></a>
                            </td>

                        </tr>
                        <?php
}
?>

                    </tbody>
                </table>
                <a href="/controllers/ajout-patientCtrl.php"><button
                        class="btn secondary-color text-white btn-block my-4">Retourner sur le
                        formulaire d'ajout patient</button></a>
                        <a href="/controllers/list-patientCtrl.php"><button
                        class="btn secondary-color text-white btn-block my-4">Accéder à la liste des patients</button></a>
                        <a href="/controllers/rendez-vousCtrl.php"><button
                        class="btn secondary-color text-white btn-block my-4">Ajouter un rendez-vous</button></a>
                       

            </div>
        </div>