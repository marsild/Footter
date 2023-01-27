<div style="font-size:medium;" class="text-center my-4 col-12"> Aggiorna le tue squadre preferite </div>
<form class="mx-lg-5" action="processa-inserimento.php" method="POST">
    <input type="hidden" id="aggiorna_preferiti" name="aggiorna_preferiti" value="on">

    <div class="row col-12 mx-3">
    <?php foreach($dbh->getSquads() as $squadra):?>
        <div class="form-check form-check-inline mx-0 my-1 col-6 ">
            <input class="form-check-input" type="checkbox" value="<?php echo $squadra["nome"];?>" id="box<?php echo $squadra["nome"];?>" name="box<?php echo $squadra["nome"];?>" <?php if (in_array($squadra["nome"], flatArray($templateParams["preferiti"], "squadra"))) {echo "checked"; } ?>>
            <label style="font-size:small" class="form-check-label" for="box<?php echo $squadra["nome"];?>">
                <img src="<?php echo UPLOAD_DIR.$squadra["logo"];?>" alt="<?php echo $squadra["nome"];?>" style="max-height: 20px; ">
                <?php echo $squadra["nome"];?>
            </label>
        </div>
    <?php endforeach; ?>
    </div>
    <!-- Submit button -->
    <div class="row mx-3">
        <div class="col-12 mt-4 px-0">
        <input type="submit" value="Aggiorna" class="btn btn-primary">
        </div>
    </div>
</form>
