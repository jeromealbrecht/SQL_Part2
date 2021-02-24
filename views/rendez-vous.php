<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-xl-6">


            <form action="" method="POST" class="border border-light p-5">

                <p class="h4 mb-4 text-center">Prendre un rendez-vous</p>
                <?= $errorArray['idPatients_error'] ?? '' ?>
                <select class="form-control mb-4" name="patientSelected">
                
                    <option selected>Choisissez un patient</option>
                    <?php
                    // allPatients = tableau qui contient tous les nom et prénom de mes patients.
                    foreach($allPatients as $patient){
                    ?>
                        <option value="<?=$patient->id?>" <?= ($patient->id== $idPatients) ? 'selected' : '' ?> ><?=$patient->lastname?> <?=$patient->firstname?></option>
                    <?php } ?>
                </select>
                
                <input type="datetime-local" id="meeting" name="meeting" class="form-control mb-4"
                    value="2018-06-12T19:30" >
                    <!-- min="2018-06-07T00:00" max="2018-06-14T00:00" -->
                    <?= $errorArray['meeting_error'] ?? '' ?>



                <button class="btn secondary-color text-white btn-block my-4" type="submit">Ajouter le
                    rendez-vous</button>

            </form>

        </div>
    </div>

