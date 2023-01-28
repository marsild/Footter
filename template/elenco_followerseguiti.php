<div class="row mx-3 my-3">
    <div class="col-12 text-center mt-3">
        <?php echo $_GET["d"];?>
    </div>
</div>
<hr class="text-dark my-1">

<?php foreach($templateParams["elenco"] as $utente):?>
<div class="row mx-3 my-3">
    <div class="col-2 text-end">
        <img class="rounded-circle border border-1" style="max-height: 30px;" src="<?php if($utente["immagine"] == null){echo UPLOAD_DIR."pfp.png";}else{ echo "data:image/jpg;charset=utf8;base64,".base64_encode($utente["immagine"]);}?>" alt="ImmagineProfilo">
    </div>
    <div class="col-10 align-self-center">
        <a href="profilo.php?usr=<?php echo $utente["username"];?>" class="text-dark"><?php echo $utente["username"];?></a>
    </div>
</div>
<hr class="text-dark my-1">
<?php endforeach;?>