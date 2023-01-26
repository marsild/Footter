<form action="crea.php" method="POST">
    <div class="row mx-3 mb-4 text-center">
        <div class="col-12  ">
            <label for="textarea" class="form-label"></label>
            <textarea class="form-control " maxlength="255" name="textarea" id="textarea" placeholder="Inserisci il testo.." rows="3"></textarea>
        </div>
    </div>
    <div class="row mx-3 mb-4">
        <div class="col-12 ">
            <input type="file" class=" form-control btn btn-outline-dark" name="imgpost" id="imgpost" value="Inserisci un'immagine..">
        </div>
    </div>
    <div class="row mx-3 mb-2">
        <div class="col-12 ">
            <select class="form-select form-select-sm" name="first-squad" aria-label="Default select example" required>
                <option selected disabled value="">Inserisci una squadra</option>
                <?php foreach ($templateParams["squadre"] as $squadra) : ?>
                    <option value=<?php echo $squadra["nome"] ?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row mx-3 mb-5">
        <div class="col-12 ">
            <select class="form-select form-select-sm" name="second-squad" aria-label="Default select example">
                <option selected disabled value="">Inserisci un'altra squadra</option>
                <?php foreach ($templateParams["squadre"] as $squadra) : ?>
                    <option value=<?php echo $squadra["nome"] ?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="row mx-3">
        <div class="col text-center">
            <a href="index.php">Annulla</a>
        </div>
        <div class="col text-center">
            <input class="btn btn-info" type="submit" value="Pubblica">
        </div>
    </div>
</form>