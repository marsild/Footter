<div class="row">
    <div class="col-12 mb-5">
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
                                <span class="small"><?php echo  formatDate($notifica["data_notifica"]); ?></span>
                            </div>
                            <div class="col-2 px-0 text-end">
                                <div class="dropdown">
                                    <button class="btn" type="button" id="dropdownMenuButton<?php echo $notifica["id"];?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="bi bi-three-dots"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $notifica["id"];?>">
                                        <li>
                                            <form action="notifiche.php" method="POST" id="form_eliminazione_notifica<?php echo $notifica["id"];?>">
                                                <input type="hidden" id="eliminazione_notifica<?php echo $notifica["id"];?>" name="eliminazione_notifica" value="<?php echo $notifica["id"]; ?>">
                                            </form>
                                            <button type="submit" class="dropdown-item" form="form_eliminazione_notifica<?php echo $notifica["id"];?>" value="Submit"><span class="bi bi-trash"></span> Elimina</button>
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
                                        <a href="profilo.php?usr=<?php echo $notifica["nickname_causa"]?>"><?php echo $notifica["nickname_causa"];?></a>
                                        <?php if($notifica["messaggio"] == "ha caricato un post su una delle tue squadre preferite."){ ?>
                                            <?php echo 'ha caricato un <a href="profilo.php?usr='.$notifica["nickname_causa"].'&post='.$notifica["id_post"].'">post</a> su una delle tue squadre preferite.'; ?>
                                        <?php } else if($notifica["messaggio"] == "ha messo mi piace al tuo post."){ ?>
                                            <?php echo 'ha messo mi piace al tuo <a href="profilo.php?usr='.$_SESSION["username"].'&post='.$notifica["id_post"].'">post</a>'; ?>.
                                        <?php } else if($notifica["messaggio"] == "ha commentato il tuo post."){ ?>
                                            <?php echo 'ha commentato il tuo <a href="profilo.php?usr='.$_SESSION["username"].'&post='.$notifica["id_post"].'">post</a>'; ?>.
                                        <?php } else { ?>
                                            <?php echo $notifica["messaggio"]; ?>
                                        <?php } ?>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <hr class="text-dark my-0">
        <?php endforeach; ?>
    </div>
</div>
<!--

"Benvenuto su Footter!"
"ha caricato un post su una delle tue squadre preferite."
"ha messo mi piace al tuo post."
"ha commentato il tuo post."
"ha iniziato a seguirti."

-->