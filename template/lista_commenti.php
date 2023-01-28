<section class="w-100 p-4 d-flex justify-content-center pb-4">
    <form style="width: 22rem;" action="processa-inserimento.php?idpost=<?php echo $_GET["idpost"]; ?>" method="POST">
        <!-- Password input -->
        <div class="form-outline mb-2">
            <div class="input-group mb-3">
                <input type="hidden" id="usr" name="usr" value="<?php echo $dbh->getUsernameFromPost($_GET["idpost"])[0]["nickname"]; ?>">
                <label hidden for="textcommento">commento</label>
                <input type="text" class="form-control" id="textcommento" name="textcommento" placeholder="Inserisci il tuo commento" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                <input value="invia" class=" z-1btn btn-outline-primary" type="submit" id="button-addon2">
            </div>

        </div>
    </form>
</section>
<?php foreach ($templateParams["getComments"] as $commento) : ?>
    <article class="bg-white">
            <div class="px-4">
                <div class="row">
                    <div class="col-10">
                    <div>
                    <img class="image rounded-circle border border-1" src="<?php if($commento["immagine"] == null){echo UPLOAD_DIR."pfp.png";}else{ echo "data:image/jpg;charset=utf8;base64,".base64_encode($commento["immagine"]);}?>" alt="ImmagineUtente">

                </div>
                <div class="alignme">
                    <a class="text-black px-2" href="profilo.php?usr=<?php echo $commento["nickname"]; ?>"><?php echo $commento["nickname"]; ?></a>
                    <br />
                    <span class="small text-black px-2"><?php echo $commento["data_commento"]; ?></span>
                </div>
                    </div>
            <div class="col-2">
            <div class="px-0 text-end">
                        <button class="btn p-0" type="button" id="menuNotifica<?php echo $notifica["id"]; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                            <em class="bi bi-three-dots"></em>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="menuNotifica<?php echo $notifica["id"]; ?>">
                            <li>
                                <form action="notifiche.php" method="POST" id="form_eliminazione_notifica">
                                    <input type="hidden" id="eliminazione_notifica" name="eliminazione_notifica" value="<?php echo $notifica["id"]; ?>">
                                </form>
                                <button type="submit" class="btn" form="form_eliminazione_notifica" value="Submit"><em class="bi bi-trash"></em> Elimina</button>

                            </li>
                        </ul>
                    </div>
            </div>
                </div>
            </div>
        <section class="px-5">
            <p class="text-break"><?php echo $commento["testo"]; ?></p>
        </section>
        <hr class="text-black-50">
    </article>
<?php endforeach; ?>