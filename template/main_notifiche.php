<div class="row mx-4">
    <div class="col-12 mt-3 text-center">
        Notifiche
    </div>
</div>
<hr class="text-dark mb-0">

<?php foreach($templateParams["notifiche"] as $notifica):?>
    <?php if($notifica["visualizzato"]==1) { ?>
        <div class="row bg-white">
    <?php } elseif($notifica["messaggio"] == "ha caricato un post su una delle tue squadre preferite.") { ?>
        <div class="row bg-info">
    <?php } else { ?>
        <div class="row bg-light">
    <?php } ?>
    <div class="col-12 my-2">
            <div class="row mx-4">
                <div class="col-12">
                     <span class="small"><?php echo $notifica["data_notifica"];?></span>
                </div>
            </div>
            <div class="row mx-4">
                <div class="col-12">
                    <?php
                        if($notifica["messaggio"] == "Benvenuto su Footter!"){
                            echo $notifica["messaggio"];
                        } else { ?>
                            <a href="profilo.php?usr=<?php echo $notifica["nickname_causa"]?>"><?php echo $notifica["nickname_causa"]."</a> ".$notifica["messaggio"];
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <hr class="text-dark my-0">
<?php endforeach; ?>

<!--
"ha iniziato a seguirti."
"ha commentato il tuo post."
"Benvenuto su Footter!"
"ha caricato un post su una delle tue squadre preferite."
-->