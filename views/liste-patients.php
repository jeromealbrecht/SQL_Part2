<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-xl-10">
            <div class="border border-light p-5">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Id :</th>
                            <th scope="col">Nom :</th>
                            <th scope="col">Prénom :</th>
                            <th scope="col">Date de naissance :</th>
                            <th scope="col">Téléphone :</th>
                            <th scope="col">Mail :</th>


                        </tr>
                    </thead>
                    <tbody>


                        <?php

foreach ($patients as $patient){ ?>

                        <tr>
                            <td class="alert alert-primary text-center"><a href="profil-patientCtrl.php?id=<?= $patient->id ?>"><i
                                    class="fas fa-portrait"><?= $patient->id ?></i></a>
                            </td>
                            <td class="alert alert-primary text-center"><?= $patient->lastname ?>
                            </td>
                            <td class="alert alert-primary text-center"><?= $patient->firstname ?>
                            </td>
                            <td class="alert alert-primary text-center"><?= $patient->birthdate ?>
                            </td>
                            <td class="alert alert-primary text-center"><?= $patient->phone ?>
                            </td>
                            <td class="alert alert-primary text-center"><?= $patient->mail ?>
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