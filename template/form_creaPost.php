<form action="processa-inserimento.php" method="POST" enctype="multipart/form-data">
    <?php if (isset($templateParams["creato"])) { ?>
        <div class="row mx-3">
            <div class="col-12">
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
    <div class="row mx-3 mb-4 text-center">
        <div class="col-12 mt-4 ">
            <label for="textarea" class="form-label" hidden>Testo post:</label>
            <textarea class=" shadow form-control " rows="5" required maxlength="255" name="textarea" id="textarea" placeholder="Inserisci un testo con un massimo di 255 caratteri"></textarea>
        </div>
    </div>
    <div class="row mx-3 mb-4">
        <div class="col-11 ">
            <label for="imgpost" hidden>immagine post</label>
            <input type="file" class=" form-control btn btn-outline-dark" name="imgpost" id="imgpost">
        </div>
        <div class="col-1 px-0 text-center">
            <button type="button" class="btn px-0" data-bs-toggle="popover" data-bs-trigger="focus" title="Requisiti" data-bs-content="File ammessi: ‘jpg','png','jpeg','gif’. <br />Dimensioni massime: 500kb. <br /> I file che non rispettano questi requisiti verranno automaticamente ignorati." data-bs-html="true"><span class="bi bi-info-circle"></span></button>
        </div>
    </div>
    <div class="row mx-3 mb-2 align-items-center">
        <div class="col-12">
        <label for="first-squad">1° squadra</label>
            <select class="form-select form-select-sm" name="first-squad" id="first-squad" aria-label="Default select example" required>
                <option selected disabled value="">Obbligatoria</option>
                <?php foreach ($templateParams["squadre"] as $squadra) : ?>
                    <option value=<?php echo $squadra["nome"] ?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row mx-3 mb-5 align-items-center">
        <div class="col-12">
        <label for="second-squad">2° squadra</label>
            <select class="form-select form-select-sm" name="second-squad" id="second-squad" aria-label="Default select example">

                <option selected disabled value="">Nessuna</option>
                <?php foreach ($templateParams["squadre"] as $squadra) : ?>
                    <option value=<?php echo $squadra["nome"] ?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row mx-3">
        <div class="col text-center">
            <a href="index.php" class="btn btn-secondary" title="home">Annulla</a>
        </div>
        <div class="col text-center">
            <input class="btn btn-primary" type="submit" value="Pubblica">
        </div>
    </div>
</form>