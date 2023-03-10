<?php $count = 0; ?>
<?php foreach ($templateParams["getPosts"] as $post) : ?>
    <?php if (in_array($post["nickname"], flatArray($dbh->getSeguiti($_SESSION["username"]), "nickname_seguito"))) { ?>
        <?php
        $showpost = true;
        if (isset($_SESSION["filtra"]) && $_SESSION["filtra"] == "preferiti") {
            $showpost = false;
            foreach ($dbh->getSquadreTaggate($post["id"]) as $squadra) {
                if (in_array($squadra["nome"], flatArray($dbh->getPreferiti($_SESSION["username"]), "squadra"))) {
                    $showpost = true;
                }
            }
        }
        ?>
        <?php if ($showpost == true) { ?>
            <article class="bg-white" aria-label="Post di un utente seguito">
                <div class="row mx-4 mx-lg-2">
                    <div class="d-none d-lg-block col-lg-1 mt-3"></div>
                    <div class="col-2 col-lg-1 px-0 text-end align-self-center mt-3">
                        <img class="img50 rounded-circle border border-1" src="<?php if($post["ImmagineUtente"] == null){echo UPLOAD_DIR . "pfp.png";}else{ echo "data:image/jpg;charset=utf8;base64,".base64_encode($post["ImmagineUtente"]);} ?>" alt="Immagine profilo utente">
                    </div>
                    <div class="col-6 col-md-7 pe-0 align-self-center mt-3">
                        <a class="text-break text-black" href="profilo.php?usr=<?php echo $post["nickname"]; ?>"><?php echo $post["nickname"]; ?></a><br>
                        <span class="small"><?php echo formatDate($post["data_post"]); ?></span>
                    </div>
                    <div class="col-4 col-md-3 col-lg-2 text-end align-self-center mt-3 text-end px-0">
                        <?php foreach ($dbh->getSquadreTaggate($post["id"]) as $squadra) : ?>
                            <img class="img30" src="<?php echo UPLOAD_DIR . $squadra["logo"]; ?>" alt="<?php echo $squadra["nome"]; ?>" title="<?php echo $squadra["nome"]; ?>">
                        <?php endforeach; ?>
                    </div>
                    <div class="d-none d-lg-block col-lg-1 mt-3"></div>
                </div>
                <div class="row mx-2">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                        <div class="row mt-2">
                            <p class="text-break px-0 my-2"><?php echo $post["testo"]; ?></p>
                        </div>
                        <?php if (!empty($post["ImmaginePost"])) { ?>
                            <div class="row text-center">
                                <img class="border border-3 mx-auto img-fluid mt-2 imgpost" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($post["ImmaginePost"]); ?>" alt="Immagine post">
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col text-start ps-0">
                                <button type="button" class="btn px-0" onclick="updateLikes(<?php echo $post['id'] ?>, '<?php echo $_SESSION['username'] ?>', '<?php echo $post['nickname'] ?>')">
                                    <span id="like-heart<?php echo $post["id"] ?>" class="bi bi-heart<?php if ($dbh->hasLiked($post['id'], $_SESSION["username"])[0]["nr"] > 0) {echo "-fill text-danger";} ?> fs-4"></span> <span id="numero-like<?php echo $post["id"] ?>"><?php echo $post["n_like"]; ?></span>
                                </button>
                            </div>
                            <div class="col text-end pe-0">
                                <a href="commenti.php?idpost=<?php echo $post["id"] ?>" class="btn px-0"><?php echo $post["n_commenti"]; ?> <span class="bi bi-chat-dots fs-4"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
            </article>
            <?php $count = $count + 1; ?>
            <hr class="text-dark">
        <?php } ?>
    <?php } ?>
<?php endforeach; ?>
<?php if ($count == 0) { ?>
    <div class="row mx-2">
        <div class="col-12 mt-4 text-center">
            <?php if (isset($_SESSION["filtra"]) && $_SESSION["filtra"] == "preferiti") { ?>
                <p class="text-break">Nessun post riguarda i tuoi preferiti. <br>
                    <a href="cerca.php" class="text-break btn btn-info my-2">Segui di pi??</a> <br>
                    oppure <br>
                    <a href="preferiti.php" class="text-break btn btn-info my-2">Aggiungi squadre preferite</a>
                </p>
            <?php } else { ?>
                <a href="cerca.php" class="text-break btn btn-info my-2">Inizia a seguire utenti per vedere post!</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>