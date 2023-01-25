<div class="row mx-2">
    <div class="col-4 my-auto text-center my-3">
        <img class="rounded-circle border border-1" style="max-height: 80px;" src="<?php echo UPLOAD_DIR.$templateParams["profilo"]["immagine"] ;?>" alt="Immagine profilo">
    </div>
    <div class="col-8 my-3">
        <p><?php echo $templateParams["profilo"]["nome"] ;?> <?php echo $templateParams["profilo"]["cognome"] ;?> <br /> @<?php echo $templateParams["profilo"]["nickname"] ;?> </p>
        <form action="<?php echo $templateParams["actionPulsante"];?>" method="POST">
        <input type="hidden" id="un_follow" name="un_follow" value="<?php echo $templateParams["testoPulsante"] ;?>">
        <input type="submit" value="<?php echo $templateParams["testoPulsante"] ;?>" class="btn btn-light border">
        </form>
    </div>
</div>
<hr class="text-dark mt-0">
<div class="row mx-2 g-1">
    <div class="col text-center">
        <a href="elenco.php?d=Followers&u=<?php echo $templateParams["profilo"]["nickname"] ;?>"><?php echo $templateParams["profilo"]["n_follower"] ;?> <br /> follower </a>
    </div>
    <div class="col text-center">
        <a href="elenco.php?d=Seguiti&u=<?php echo $templateParams["profilo"]["nickname"] ;?>"><?php echo $templateParams["profilo"]["n_seguiti"] ;?> <br /> seguiti </a>
    </div>
    <div class="col text-center">
        <p><?php echo $templateParams["n_post"]["total"];?> <br /> post </p>
    </div>
</div>
<hr class="text-dark my-0">