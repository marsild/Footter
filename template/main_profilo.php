<div class="row mx-2">
    <div class="col-4 my-auto text-center my-3">
        <img class="rounded-circle border border-1" style="max-height: 80px;" src="<?php echo UPLOAD_DIR . $templateParams["profilo"]["immagine"]; ?>" alt="Immagine profilo">
    </div>
    <div class="col-8 my-3">
        <p><?php echo $templateParams["profilo"]["nome"]; ?> <?php echo $templateParams["profilo"]["cognome"]; ?> <br /> @<?php echo $templateParams["profilo"]["nickname"]; ?> </p>
        <form action="<?php echo $templateParams["actionPulsante"]; ?>" method="POST">
            <input type="hidden" id="un_follow" name="un_follow" value="<?php echo $templateParams["testoPulsante"]; ?>">
            <input type="submit" value="<?php echo $templateParams["testoPulsante"]; ?>" class="btn btn-light border">
        </form>
    </div>
</div>
<hr class="text-dark mt-0">
<div class="row mx-2 g-1">
    <div class="col text-center">
        <a href="elenco.php?d=Followers&u=<?php echo $templateParams["profilo"]["nickname"]; ?>"><?php echo $templateParams["profilo"]["n_follower"]; ?> <br /> follower </a>
    </div>
    <div class="col text-center">
        <a href="elenco.php?d=Seguiti&u=<?php echo $templateParams["profilo"]["nickname"]; ?>"><?php echo $templateParams["profilo"]["n_seguiti"]; ?> <br /> seguiti </a>
    </div>
    <div class="col text-center">
        <p><?php echo $templateParams["n_post"]["total"]; ?> <br /> post </p>
    </div>
</div>
<hr class="text-dark my-0">
<?php $count = 0; ?>
<?php foreach ($templateParams["getPosts"] as $post) : ?>
    <?php if ($post["nickname"] == $templateParams["profilo"]["nickname"]) { ?>
        <article class="bg-white">
            <div class="row mx-4 mx-lg-2">
                <div class="d-none d-lg-block col-lg-1 mt-3"></div>
                <div class="col-2 col-lg-1 px-0 text-end align-self-center mt-3">
                    <img style="max-height:50px" class="rounded-circle border border-1" src="<?php echo UPLOAD_DIR . $post["ImmagineUtente"]; ?>" alt="Immagine profilo utente">
                </div>
                <div class="col-6 col-md-7 pe-0 align-self-center mt-3">
                    <a class="text-break text-black" href="profilo.php?usr=<?php echo $post["nickname"]; ?>"><?php echo $post["nickname"]; ?></a><br />
                    <span class="small"><?php echo $post["data_post"]; ?></span>
                </div>
                <div class="col-4 col-md-3 col-lg-2 text-end align-self-center mt-3 text-end">
                    <?php foreach ($dbh->getSquadreTaggate($post["id"]) as $squadra) : ?>
                        <img style="max-height:30px" src="<?php echo UPLOAD_DIR . $squadra["logo"]; ?>" alt="<?php echo $squadra["nome"]; ?>">
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
                            <img class="border border-3 mx-auto img-fluid mt-2" style="max-height:500px; object-fit:contain" src="<?php echo UPLOAD_DIR . $post["ImmaginePost"]; ?>" alt="Immagine post" />
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col text-start ps-0">
                            <button type="button" class="btn px-0">
                                <em class="bi bi-heart fs-4"></em> <?php echo $post["n_like"]; ?>
                            </button>
                        </div>
                        <?php if ($templateParams["profilo"]["nickname"] == $_SESSION["username"]) { ?>
                            <div class="col text-center">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                    <em class="bi bi-trash3 fs-4 text-danger"></em>
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmModalLabel">Eliminazione post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Stai cercando di eliminare un post. Questa operazione è irriversibile, vuoi procedere?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                            <form action="profilo.php" method="POST">
                                                <input type="hidden" id="eliminazione_post" name="eliminazione_post" value="<?php echo $post["id"]; ?>">
                                                <input type="submit" value="Conferma" class="btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        <div class="col text-end pe-0">
                            <a href="commenti.php?idpost=<?php echo $post["id"] ?>" class="btn px-0"><?php echo $post["n_commenti"]; ?> <em class="bi bi-chat-dots fs-4"></em></a>
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
<?php endforeach; ?>
<?php if ($count == 0) { ?>
    <div class="row mx-2">
        <div class="col-12 mt-4 text-center">
            <?php if ($templateParams["testoPulsante"] == "Modifica") { ?>
                <a href="crea.php" class="text-break">Crea il tuo primo post.</a>
            <?php } else { ?>
                <p>Ancora nessun post pubblicato.</p>
            <?php } ?>
        </div>
    </div>
<?php } ?>