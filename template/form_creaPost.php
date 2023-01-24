<div class="mx-3">
    <form>
       <?php $i=1?>
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <textarea class="form-control " maxlength="255" id="exampleFormControlTextarea1" placeholder="Inserisci il testo.." rows="3"></textarea>
        <div class="d-grid gap-2 col-8 mt-2">
            <button class="btn btn-light text-info border " type="button"><i class="bi bi-image"></i> Inserisci un'immagine..</button>
            <select class="form-select form-select-sm" aria-label="Default select example" required>
                <option selected disabled value="">Inserisci una squadra</option>
                <?php foreach($templateParams["squadre"] as $squadra): ?>
                <option value=<?php echo $squadra["nome"]?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>
            <select class="form-select form-select-sm" aria-label="Default select example">
                <option selected disabled value="">Inserisci un'altra squadra</option>
                <?php foreach($templateParams["squadre"] as $squadra): ?>
                <option value=<?php echo $squadra["nome"]?>><?php echo $squadra["nome"];  ?></option>
                <?php endforeach ?>
            </select>

        </div>
        <div class="w-100  mt-3">
            <input class="btn btn-info float-end" type="Submit" value="Pubblica">
        </div>
    </form>
</div>