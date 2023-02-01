<form action="impostazioni.php?result=successful" method="POST" enctype="multipart/form-data">
    <div class="row mx-2">
        <div class="col-1"></div>
        <div class="z-1 col-10 my-4 px-0">
            <h1 class="fs-5 pl-2">Dati Personali</h1>
            <div class="row ">
                <div class="col-5 ml-5 text-center">
                    <img alt="imgutente"src="<?php if ($templateParams["profilo"]["immagine"] == null) {
                                    echo UPLOAD_DIR . "pfp.png";
                                } else {
                                    echo "data:image/jpg;charset=utf8;base64," . base64_encode($templateParams["profilo"]["immagine"]);
                                } ?>" class="rounded-circle border border-1 img90" alt="immagineUtente">
                </div>
                <div class="col-7">
                    <div class="mb-3">
                        <label for="nome"hidden>nome</label>
                        <input type="text" class="form-control" maxlength="20" name="nome" id="nome" placeholder="<?php echo $templateParams["profilo"]["nome"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cognome"hidden>cognome</label>
                        <input type="text" class="form-control" id="cognome" maxlength="20" name="cognome" placeholder="<?php echo $templateParams["profilo"]["cognome"] ?>">
                    </div>
                </div>
            </div>
            <div class="row g-1">
                <div class="col-11 text-center">
                    <label for="imgutente"hidden>immagine utente</label>
                    <input type="file" class=" form-control btn btn-outline-dark" name="imgutente" id="imgutente" value="Inserisci un'immagine..">
                </div>
                <div class="col-1 px-0 text-center">
                    <button type="button" class="btn px-0" data-bs-toggle="popover" title="Requisiti" data-bs-content="File ammessi: 'jpg','png','jpeg','gif’. <br />Dimensioni massime: 500kb. <br /> I file che non rispettano questi requisiti verranno automaticamente ignorati." data-bs-html="true"><span class="bi bi-info-circle"></span></button>
                </div>
            </div>
            <hr class="text-black-50">

            <div class="col-12">
                <h1 class="fs-5">Password</h1>
            </div>
            <div class="row g-1">
                <div class="col">
                    <div class="input-group mb-4">
                        <label for="agg_password" hidden>Passwrgord</label>
                        <button onclick='switchPasswordVisibility("agg_password")' class="btn border" type="button" id="basic-addon2"><span id="eye-icon" class="bi bi-eye"></span></button>
                        <input type="password" maxlength="20" minlength="8" id="agg_password" name="agg_password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="col-1 px-0 text-center">
                    <button type="button" class="btn px-0" data-bs-toggle="popover" title="Requisiti" data-bs-content="8 caratteri di cui:<br />1 maiuscola<br />1 minuscola<br />1 numero<br />1 carattere speciale" data-bs-html="true"><span class="bi bi-info-circle"></span></button>
                </div>
            </div>
            <div class="col-12">
                <h1 class="fs-5">Mail</h1>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <label for="email"hidden>mail</label>
                        <input type="mail" class="form-control" id="email" name="email" placeholder="<?php echo $templateParams["profilo"]["email"] ?>" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="premuto"hidden>premuto</label>
                    <input type="hidden" id="premuto" name="premuto" value="true">
                    <input class="btn btn-info" type="submit" value="Conferma">
                    <button type="button" class="btn px-0" data-bs-toggle="popover" title="Attenzione" data-bs-content="Verranno cambiati solo i campi modificati." data-bs-html="true"><span class="bi bi-info-circle"></span></button>

                </div>

            </div>

            <?php if (isset($templateParams["creato"])) { ?>
                <div class="row">
                    <div class="col-12 px-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="alert_successo">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-success d-flex align-items-center mt-4 mb-0" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                <?php echo $templateParams["creato"]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="col-1"></div>
    </div>
</form>