<form style="width: 22rem;">
    <div class="row col-12 mx-auto">
    <div style="font-size:medium;" class="text-center mb-3 col-12"> Supporta le tue squadre preferite! </div>
    <?php foreach($dbh->getSquads() as $squadra):?>
        <div class="form-check form-check-inline mx-0 my-1 col-6 ">
            <input class="form-check-input" type="checkbox" value="<?php echo $squadra["nome"];?>" id="checkbox<?php echo $squadra["nome"];?>">
            <label style="font-size:small" class="form-check-label" for="checkbox<?php echo $squadra["nome"];?>">
                <img src="<?php echo UPLOAD_DIR.$squadra["logo"];?>" alt="<?php echo $squadra["nome"];?>" style="max-height: 20px; ">
                <?php echo $squadra["nome"];?>
            </label>
        </div>
    <?php endforeach; ?>
    </div>
    <!-- Submit button -->
    <div class="d-grid col-5 mt-4">
        <a href="#" role="button" class="btn btn-primary btn-block w-20">Registrati</a>
    </div>
</form>