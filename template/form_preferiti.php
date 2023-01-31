<form class="mx-md-5" action="processa-inserimento.php" method="POST">
    <div class="row mx-3">
        <div class="col-12 mt-4 mb-3 px-0 text-center text-md-start">
            Aggiorna le tue squadre preferite
        </div>
    </div>
    <input type="hidden" id="aggiorna_preferiti" name="aggiorna_preferiti" value="on">

    <div class="row col-12 mx-3">
        <?php foreach ($dbh->getSquads() as $squadra) : ?>
            <div class="form-check form-check-inline mx-0 my-1 col-6 ">
                <input class="form-check-input" type="checkbox" value="<?php echo $squadra["nome"]; ?>" id="box<?php echo $squadra["nome"]; ?>" name="box<?php echo $squadra["nome"]; ?>" <?php if (in_array($squadra["nome"], flatArray($templateParams["preferiti"], "squadra"))) {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?>>
                <label style="font-size:small" class="form-check-label" for="box<?php echo $squadra["nome"]; ?>">
                    <img src="<?php echo UPLOAD_DIR . $squadra["logo"]; ?>" alt="<?php echo $squadra["nome"]; ?>" style="height: 20px; width: 20px;">
                    <?php echo $squadra["nome"]; ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (isset($_GET["result"]) && $_GET["result"] == "successful") { ?>
        <div class="row mx-3">
            <div class="col-12 px-0">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center mt-3 mb-0" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Aggiornamento effettuato con successo.
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Submit button -->
    <div class="row mx-3">
        <div class="col-12 mt-3 px-0">
            <input type="submit" value="Aggiorna" class="btn btn-primary">
        </div>
    </div>
</form>