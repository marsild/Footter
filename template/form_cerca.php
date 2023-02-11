<form action="cerca.php" method="GET" id="cerca_utente">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 mt-4 mb-3">
            <div class="z-1 input-group mb-3">
                <button class="btn border" form="cerca_utente" type="submit" id="button-addon2"><span class="bi bi-search"></span></button>
                <label for="search" hidden>input cerca</label>
                <input type="text" name="search" id="search" class="shadow form-control btn btn-outline-light border border-b-1 text-dark" placeholder="Cerca i tuoi amici" aria-label="Example text with button addon" aria-describedby="button-addon2">
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</form>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
    <ul class="list-group">
    <?php if(isset($templateParams["user"])){ ?>
        <?php foreach($templateParams["user"] as $utente) : ?>
            <?php if(str_contains(strtolower($utente["nickname"]),strtolower($_GET["search"]))){ ?>
                <li class="list-group-item profili" aria-current="true">
                    <div>
                    <img class="float-start img50 rounded-circle border border-1" src="<?php if($utente["immagine"] == null){echo UPLOAD_DIR."pfp.png";}else{ echo "data:image/jpg;charset=utf8;base64,".base64_encode($utente["immagine"]);}?>" alt="ImmagineUtente">
                    </div>
                    <div class="alignme">
                        <a class="text-black mx-2" href="profilo.php?usr=<?php echo $utente["nickname"]?>"><?php echo $utente["nickname"]?></a>
                    </div>
                </li>
           <?php } ?>
        <?php endforeach; ?>
        <?php } ?>
        </ul>

    </div>
    <div class="col-1"></div>
</div>