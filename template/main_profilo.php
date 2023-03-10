<div class="row mx-2">
    <div class="col-4 my-auto text-center my-3">
        <img class="rounded-circle border border-1 img80" src="<?php if ($templateParams["profilo"]["immagine"] == null) {
                                                                    echo UPLOAD_DIR . "pfp.png";
                                                                } else {
                                                                    echo "data:image/jpg;charset=utf8;base64," . base64_encode($templateParams["profilo"]["immagine"]);
                                                                } ?>" alt="Immagine profilo">
    </div>
    <div class="col-8 my-3">
        <p class="mb-2"><?php echo $templateParams["profilo"]["nome"]; ?> <?php echo $templateParams["profilo"]["cognome"]; ?> <br> @<?php echo $templateParams["profilo"]["nickname"]; ?> </p>
        <form action="<?php echo $templateParams["actionPulsante"]; ?>" method="POST">
            <input type="hidden" id="un_follow" name="un_follow" value="<?php echo $templateParams["testoPulsante"]; ?>">
            <input type="submit" value="<?php echo $templateParams["testoPulsante"]; ?>" class="btn btn-primary border">
        </form>
    </div>
</div>
<div class="row g-0">
    <div class="col text-center ps-2 <?php echo $templateParams["bg-followers"]; ?>">
        <a class="text-dark" href="profilo.php?usr=<?php echo $templateParams["profilo"]["nickname"]; ?>&view=followers">
            <div class="row mx-0">
                <div class="col-12 py-2 px-0">
                    <?php echo $templateParams["profilo"]["n_follower"]; ?> <br> follower
                </div>
            </div>
        </a>
    </div>
    <div class="col text-center <?php echo $templateParams["bg-seguiti"]; ?>">
        <a class="text-dark" href="profilo.php?usr=<?php echo $templateParams["profilo"]["nickname"]; ?>&view=seguiti">
            <div class="row mx-0">
                <div class="col-12 py-2 px-0">
                    <?php echo $templateParams["profilo"]["n_seguiti"]; ?> <br> seguiti
                </div>
            </div>
        </a>
    </div>
    <div class="col text-center pe-2 <?php echo $templateParams["bg-post"]; ?>">
        <a class="text-dark" href="profilo.php?usr=<?php echo $templateParams["profilo"]["nickname"]; ?>">
            <div class="row mx-0">
                <div class="col-12 py-2 px-0">
                    <?php echo $templateParams["n_post"]["total"]; ?> <br> post
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Se siamo nella pagina followers oppure seguiti-->
<?php if (isset($templateParams["elenco"])) { ?>
    <?php $count = 0; ?>
    <div class="mb-4">
    <?php foreach ($templateParams["elenco"] as $utente) : ?>
        <div class="row mx-3 my-3">
            <div class="col-2 text-end">
                <img class="rounded-circle border border-1 img30" src="<?php if ($utente["immagine"] == null) {
                                                                            echo UPLOAD_DIR . "pfp.png";
                                                                        } else {
                                                                            echo "data:image/jpg;charset=utf8;base64," . base64_encode($utente["immagine"]);
                                                                        } ?>" alt="ImmagineProfilo">
            </div>
            <div class="col-10 align-self-center">
                <a href="profilo.php?usr=<?php echo $utente["username"]; ?>" class="text-dark"><?php echo $utente["username"]; ?></a>
            </div>
        </div>
        <hr class="text-dark my-1">
        <?php $count = $count + 1; ?>
    <?php endforeach; ?>
    </div>
    <?php if ($count == 0) {
        echo '<div class="row mx-3 my-3"><div class="col-12 text-center">Nessun utente trovato.</div></div>';
    } ?>
    <!-- Se siamo nella pagina dei post -->
<?php } else { ?>
    <?php $count = 0; ?>
    <?php foreach ($templateParams["getPosts"] as $post) : ?>
        <?php if ($post["nickname"] == $templateParams["profilo"]["nickname"]) { ?>

            <?php
            $showpost = true;
            if (isset($_GET["filtra"]) && $_GET["filtra"] == "preferiti") {
                $showpost = false;
                foreach ($dbh->getSquadreTaggate($post["id"]) as $squadra) {
                    if (in_array($squadra["nome"], flatArray($dbh->getPreferiti($_SESSION["username"]), "squadra"))) {
                        $showpost = true;
                    }
                }
            }
            ?>
            <?php if ($showpost == true) { ?>
                <article class="bg-white" aria-label="Post">
                    <div class="row mx-4 mx-lg-2">
                        <div class="d-none d-lg-block col-lg-1 mt-3"></div>
                        <div class="col-2 col-lg-1 px-0 text-end align-self-center mt-3">
                            <img class="img50 rounded-circle border border-1" src="<?php if ($post["ImmagineUtente"] == null) {
                                                                                        echo UPLOAD_DIR . "pfp.png";
                                                                                    } else {
                                                                                        echo "data:image/jpg;charset=utf8;base64," . base64_encode($post["ImmagineUtente"]);
                                                                                    } ?>" alt="Immagine profilo utente">
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
                                    <img class="imgpost border border-3 mx-auto img-fluid mt-2" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($post["ImmaginePost"]); ?>" alt="Immagine post">
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col text-start ps-0">
                                    <button type="button" class="btn px-0" onclick="updateLikes(<?php echo $post['id'] ?>, '<?php echo $_SESSION['username'] ?>','<?php echo $post['nickname'] ?>')">
                                        <span id="like-heart<?php echo $post["id"] ?>" class="bi bi-heart<?php if ($dbh->hasLiked($post['id'], $_SESSION["username"])[0]["nr"] > 0) {
                                                                                                                echo "-fill text-danger";
                                                                                                            } ?> fs-4"></span> <span id="numero-like<?php echo $post["id"] ?>"><?php echo $post["n_like"]; ?></span>
                                    </button>
                                </div>
                                <?php if ($templateParams["profilo"]["nickname"] == $_SESSION["username"]) { ?>
                                    <div class="col text-center">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton<?php echo $post["id"]; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="bi bi-three-dots fs-4"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $post["id"]; ?>">

                                                <li>
                                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#likeModal<?php echo $post["id"]; ?>">
                                                        <span class="bi bi-search-heart"></span> Elenco like
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirmModal<?php echo $post["id"]; ?>">
                                                        <span class="bi bi-trash"></span> Elimina
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Modal Elimina -->
                                    <div class="modal fade" id="confirmModal<?php echo $post["id"]; ?>" tabindex="-1" aria-labelledby="confirmModalLabel<?php echo $post["id"]; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmModalLabel<?php echo $post["id"]; ?>">Eliminazione post</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Stai cercando di eliminare un post e relativi commenti. Questa operazione ?? irriversibile, vuoi procedere?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                    <form action="profilo.php" method="POST">
                                                        <input type="hidden" id="eliminazione_post<?php echo $post["id"]; ?>" name="eliminazione_post" value="<?php echo $post["id"]; ?>">
                                                        <input type="submit" value="Conferma" class="btn btn-primary">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal elenco like-->
                                    <div class="modal fade" id="likeModal<?php echo $post["id"]; ?>" tabindex="-1" aria-labelledby="likeModalLabel<?php echo $post["id"]; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="likeModalLabel<?php echo $post["id"]; ?>">Likes</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $countlikes = 0; ?>
                                                    <?php foreach ($dbh->getLikes($post["id"]) as $utente) : ?>
                                                        <div class="row my-3">
                                                            <div class="col-2 text-end">
                                                                <img class="img30 rounded-circle border border-1" src="<?php if ($utente["immagine"] == null) {
                                                                                                                            echo UPLOAD_DIR . "pfp.png";
                                                                                                                        } else {
                                                                                                                            echo "data:image/jpg;charset=utf8;base64," . base64_encode($utente["immagine"]);
                                                                                                                        } ?>" alt="ImmagineProfilo">
                                                            </div>
                                                            <div class="col-10 align-self-center">
                                                                <a href="profilo.php?usr=<?php echo $utente["username"]; ?>" class="text-dark"><?php echo $utente["username"]; ?></a>
                                                            </div>
                                                        </div>
                                                        <hr class="text-dark my-1">
                                                        <?php $countlikes = $countlikes + 1; ?>

                                                    <?php endforeach; ?>
                                                    <?php if ($countlikes == 0) {
                                                        echo 'Nessun utente trovato.';
                                                    } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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
                <?php if ($templateParams["testoPulsante"] == "Modifica") { ?>
                    <?php if (isset($_GET["filtra"]) && $_GET["filtra"] == "preferiti") { ?>
                        <p class="text-break">
                            Non hai ancora pubblicato nulla sui tuoi preferiti. <br>
                            <a href="crea.php" class="text-break btn btn-info my-2">Crea un post ora</a> <br>
                            oppure <br>
                            <a href="preferiti.php" class="text-break btn btn-info my-2">Aggiorna i preferiti</a>
                        </p>
                    <?php } else { ?>
                        <a href="crea.php" class="text-break btn btn-info my-2">Crea il tuo primo post</a>
                    <?php } ?>
                <?php } else { ?>
                    <?php if (isset($_GET["filtra"]) && $_GET["filtra"] == "preferiti") { ?>
                        <p class="text-break">
                            Nessun post riguarda i tuoi preferiti. <br>
                            <a href="preferiti.php" class="text-break btn btn-info my-2">Aggiorna i preferiti</a>
                        </p>
                    <?php } else { ?>
                        <p>Ancora nessun post pubblicato.</p>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>