<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

            <div class="container bcontent">
        <div class="card">
            <div class="row no-gutters">

            <form action="" method="POST" class="border border-light p-5">

                <p class="h4 mb-4 text-center">Modifier le patient</p>

                <input type="text" id="lastname" name="lastname" class="form-control mb-4" placeholder="Nom" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" value="<?= $profilPatient->lastname ?? '' ?>">
                <?= $errorArray['lastname_error'] ?? '' ?>

                <input type="text" id="firstname" name="firstname" class="form-control mb-4" placeholder="Prénom" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" value="<?= $profilPatient->firstname ?? '' ?>">
                <?= $errorArray['firstname_error'] ?? '' ?>

                <input type="date" id="birthdate" name="birthdate" class="form-control mb-4" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" value="<?= $profilPatient->birthdate ?? '' ?>">
                <?= $errorArray['date_error'] ?? '' ?>

                <input type="tel" id="phone" name="phone" class="form-control mb-4" placeholder="Tél" pattern="([+0-9]{1,3}[0-9]{8,12})|[0-9]{8,15}" value="<?= $profilPatient->phone ?? '' ?>">
                <?= $errorArray['phone_error'] ?? '' ?>

                <input type="mail" id="mail" name="mail" class="form-control mb-4" placeholder="E-mail" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" value="<?= $profilPatient->mail ?? '' ?>">
                <?= $errorArray['mail_error'] ?? '' ?>

                <button class="btn secondary-color text-white btn-block my-4" type="submit">Ajouter le patient</button>

            </form>


