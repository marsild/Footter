<div class="mx-3">
    <form style="width: 22rem" action="crea.php" method="POST">

        <label for="textarea" class="form-label"></label>
        <textarea class="form-control " maxlength="255" name="textarea" id="textarea" placeholder="Inserisci il testo.." rows="3"></textarea>


        <div class="d-grid gap-2 col-8 mt-2">

            <input type="file" name="imgpost" id="imgpost" value="Inserisci un'immagine..">


            <select class="form-select form-select-sm" name="first-squad" aria-label="Default select example" required>
                <option selected disabled value="">Inserisci una squadra</option>
                <?php foreach ($templateParams["squadre"] as $squadra) : ?>
                    <option value=<?php echo $squadra["nome"] ?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>


            <select class="form-select form-select-sm" name="second-squad" aria-label="Default select example">
                <option selected disabled value="">Inserisci un'altra squadra</option>
                <?php foreach ($templateParams["squadre"] as $squadra) : ?>
                    <option value=<?php echo $squadra["nome"] ?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>


        </div>

        <div class="w-100  mt-3">
            <input class="btn btn-info float-end" type="submit" value="Pubblica">
            <a href="index.php">Annulla</a>
        </div>


    </form>
</div>