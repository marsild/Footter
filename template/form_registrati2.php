<form style="width: 22rem;" action="processa-inserimento.php" method="POST">
    <input type="hidden" id="reg_nome" name="reg_nome" value="<?php echo $_POST["reg_nome"]?>">
    <input type="hidden" id="reg_cognome" name="reg_cognome" value="<?php echo $_POST["reg_cognome"]?>">
    <input type="hidden" id="reg_email" name="reg_email" value="<?php echo $_POST["reg_email"]?>">
    <input type="hidden" id="reg_password" name="reg_password" value="<?php echo $_POST["reg_password"]?>">
    <input type="hidden" id="reg_username" name="reg_username" value="<?php echo $_POST["reg_username"]?>">
    <div class="row col-12 mx-auto">
    <div style="font-size:medium;" class="text-center mb-3 col-12"> Supporta le tue squadre preferite! <br /></div>
    <?php foreach($dbh->getSquads() as $squadra):?>
        <div class="form-check form-check-inline mx-0 my-1 col-6 ">
            <input class="form-check-input" type="checkbox" value="<?php echo $squadra["nome"];?>" id="checkbox<?php echo $squadra["nome"];?>" name="checkbox<?php echo $squadra["nome"];?>">
            <label style="font-size:small" class="form-check-label" for="checkbox<?php echo $squadra["nome"];?>">
                <img src="<?php echo UPLOAD_DIR.$squadra["logo"];?>" alt="<?php echo $squadra["nome"];?>" class="img20">
                <?php echo $squadra["nome"];?>
            </label>
        </div>
    <?php endforeach; ?>
    </div>
    <!-- Submit button -->
    <div class="row">
    <div class="d-grid col-5 mt-4">
        <input type="submit" value="Registrati" class="btn btn-primary btn-block w-20">
    </div>
    <div class="d-grid col-1 mt-4 px-0">
    <button type="button" class="btn px-0" data-bs-toggle="popover" title="Non preoccuparti!" data-bs-content="Solo tu potrai vedere i tuoi preferiti." data-bs-html="true"><span class="bi bi-info-circle"></span></button>

    </div>
    </div>
</form>