<section class="w-100 p-4 d-flex justify-content-center pb-4">
    <form style="width: 22rem;" action="processa-inserimento.php?idpost=<?php echo $_GET["idpost"]; ?>" method="POST">
        <!-- Password input -->
        <div class="form-outline mb-2">
            <div class="input-group mb-3">
                <input type="hidden" id="usr" name="usr" value="<?php echo $dbh->getUsernameFromPost($_GET["idpost"])[0]["nickname"]; ?>">
                <label hidden for="textcommento">commento</label>
                <input type="text" class="form-control" id="textcommento" name="textcommento" placeholder="Inserisci il tuo commento" aria-describedby="button-addon2" required>
                <input value="invia" class=" z-1btn btn-outline-primary" type="submit" id="button-addon2">
            </div>

        </div>
    </form>
</section>
<?php foreach ($templateParams["getComments"] as $commento) : ?>
    <article class="bg-white">
        <div class="px-4">
            <div class="row">
            <?php if ($_SESSION["username"] == $commento["nickname"]) { ?>

                <div class="col-10">
                    <?php }else{ ?>
                        <div class="col-12">
                  <?php  } ?>
                    <div>
                        <img class="image rounded-circle border border-1" src="<?php if ($commento["immagine"] == null) {
                                                                                    echo UPLOAD_DIR . "pfp.png";
                                                                                } else {
                                                                                    echo "data:image/jpg;charset=utf8;base64," . base64_encode($commento["immagine"]);
                                                                                } ?>" alt="ImmagineUtente">

                    </div>
                    <div class="alignme">
                        <a class="text-black px-2" href="profilo.php?usr=<?php echo $commento["nickname"]; ?>"><?php echo $commento["nickname"]; ?></a>
                        <br />
                        <span class="small text-black px-2"><?php echo $commento["data_commento"]; ?></span>
                    </div>
                </div>
                <?php if ($_SESSION["username"] == $commento["nickname"]) { ?>
                <div class="col-2">
                    <div class="px-0 text-end">
                            <div class="dropdown">
                                <button class="btn" type="button" id="dropdownMenuButton<?php echo $commento["id"]; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    <em class="bi bi-three-dots"></em>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $commento["id"]; ?>">
                                    <li>
                                        <form action="commenti.php?idpost=<?php echo $commento["id_post"]; ?>" method="POST" id="form_eliminazione_commento<?php echo $commento["id"]; ?>">
                                            <input type="hidden" id="eliminazione_commento" name="eliminazione_commento" value="<?php echo $commento["id"]; ?>">
                                        </form>
                                        <button type="submit" class="dropdown-item" form="form_eliminazione_commento<?php echo $commento["id"]; ?>" value="Submit"><em class="bi bi-trash"></em> Elimina</button>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
        <section class="px-5">
            <p class="text-break"><?php echo $commento["testo"]; ?></p>
        </section>
        <hr class="text-black-50">
    </article>
<?php endforeach; ?>