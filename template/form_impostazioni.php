<form action="impostazioni.php" method="POST" enctype="multipart/form-data">
    <div class="row mx-1">
        <div class="col-1"></div>
        <div class="col-10 my-4 px-0">
            <h1 class="fs-5 pl-2">Dati Personali</h1>
            <div class="row ">
                <div class="col-5 ml-5 text-center">
                    <img src="<?php if ($templateParams["profilo"]["immagine"] == null) {
                                    echo UPLOAD_DIR . "pfp.png";
                                } else {
                                    echo "data:image/jpg;charset=utf8;base64," . base64_encode($templateParams["profilo"]["immagine"]);
                                } ?>" class="rounded-circle border border-1" style="width: 92px; height: 92px; object-fit:contain" alt="immagineUtente">
                </div>
                <div class="col-7">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="<?php echo $templateParams["profilo"]["nome"] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="<?php echo $templateParams["profilo"]["cognome"] ?>">
                    </div>
                </div>
            </div>
            <div class="row g-1">
                <div class="col-11 text-center">
                    <input type="file" class=" form-control btn btn-outline-dark" name="imgutente" id="imgutente" value="Inserisci un'immagine..">
                </div>
                <div class="col-1 px-0 text-center">
                    <button type="button" class="btn px-0" data-bs-toggle="popover" title="Requisiti" data-bs-content="File ammessi: ‘jpg','png','jpeg','gif’. <br />Dimensioni massime: 500kb. <br /> I file che non rispettano questi requisiti verranno automaticamente ignorati." data-bs-html="true"><em class="bi bi-info-circle"></em></button>
                </div>
            </div>
            <hr class="text-black-50">

            <div class="col-12">
                <h1 class="fs-5">Password</h1>
            </div>
            <div class="row g-1">
                <div class="col">
                    <div class="input-group mb-4">
                        <label for="reg_password" hidden>Password</label>
                        <button onclick='switchPasswordVisibility("agg_password")' class="btn border" type="button" id="basic-addon2"><em id="eye-icon" class="bi bi-eye"></em></button>
                        <input type="password" maxlength="20" minlength="8" id="agg_password" name="agg_password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="col-1 px-0 text-center">
                    <button type="button" class="btn px-0" data-bs-toggle="popover" title="Requisiti" data-bs-content="8 caratteri di cui:<br />1 maiuscola<br />1 minuscola<br />1 numero<br />1 carattere speciale" data-bs-html="true"><em class="bi bi-info-circle"></em></button>
                </div>
            </div>
            <div class="col-12">
                <h1 class="fs-5">Mail</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="mail" class="form-control" id="email" name="email" placeholder="<?php echo $templateParams["profilo"]["email"] ?>" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <input type="hidden" id="premuto" name="premuto" value="true">
                <input class="btn btn-info" type="submit" value="Conferma">
            </div>

        </div>
        <div class="col-1"></div>
    </div>
</form>