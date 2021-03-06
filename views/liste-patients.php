<div class="container mt-5">
    <h2 class="text-center ">Liste des patients</h2>
    <div class="row justify-content-center ">

        <div class="col-md-6">
            <form action="" method="GET">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" name="search" placeholder="Rechercher un patient"
                        aria-label="Search" aria-describedby="search-addon" value="<?= $resultSearch ?? '' ?>" />
                    <span class="input-group-text border-0" id="search-addon">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <?= $errorArray['search_error'] ?? '' ?>
        </div>
        <div class="col-sm-10 col-xl-10">
            <?php if (isset($_GET['err'])){
                    echo $_GET['err'] == 1 ? 'La ligne patient a bien été supprimée' : 'La suppression n\'a pu s\'effectuer correctement';

                } ?>


            <div class="border border-light p-5">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col"></th>
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
                            <td class="alert alert-primary text-center"><a
                                    href="/controllers/DelPat-AppCtrl.php?id=<?= $patient->id ?>"><i
                                        class="fas fa-window-close"> Remove</i></a>

                            </td>
                            <td class="alert alert-primary text-center"><a
                                    href="profil-patientCtrl.php?id=<?= $patient->id ?>"><i
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
                <a href="/controllers/list-rdvCtrl.php"><button
                        class="btn secondary-color text-white btn-block my-4">Accéder à la liste des
                        rendez-vous</button></a>
            </div>
        </div>
    </div>
</div>