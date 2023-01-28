<div class="row mx-4">
    <div class="col-12 mt-4 text-center">
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
                    <div class="col-10 px-0 align-self-center">
                        <span class="small"><?php echo $notifica["data_notifica"];?></span>
                    </div>
                    <div class="col-2 px-0 text-end">
                        <div class="dropdown">
                            <button class="btn" type="button" id="dropdownMenuButton<?php echo $notifica["id"];?>" data-bs-toggle="dropdown" aria-expanded="false">
                                <em class="bi bi-three-dots"></em>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $notifica["id"];?>">
                                <li>
                                    <form action="notifiche.php" method="POST" id="form_eliminazione_notifica<?php echo $notifica["id"];?>">
                                        <input type="hidden" id="eliminazione_notifica" name="eliminazione_notifica" value="<?php echo $notifica["id"]; ?>">
                                    </form>
                                    <button type="submit" class="dropdown-item" form="form_eliminazione_notifica<?php echo $notifica["id"];?>" value="Submit"><em class="bi bi-trash"></em> Elimina</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mx-4">
                    <div class="col-12 px-0">
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