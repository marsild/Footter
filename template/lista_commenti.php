<section class="w-100 p-4 d-flex justify-content-center pb-4">
                            <form style="width: 22rem;"action="commenti.php?idpost=<?php echo $_GET["idpost"]?>" method="POST">
                                <!-- Password input -->
                                <div class="form-outline mb-2">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="textcommento" name="textcommento" placeholder="Inserisci il tuo commento" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                        <input value="invia" class="btn btn-outline-primary" type="submit" id="button-addon2">
                                      </div>

                                </div>
                            </form>
                        </section>
                        <?php foreach($templateParams["getComments"] as $commento):?>
                        <article class="bg-white">
                            <header class="pt-1">
                                
                                <div class="px-4">
                                    <div>
                                        <img class="image rounded-circle border border-1" src="<?php echo UPLOAD_DIR.$commento["immagine"];?>" alt="ImmagineUtente">
                                        
                                    </div>
                                    <div class="alignme">
                                        <a class="text-black px-2" href="#"><?php echo $commento["nickname"];?></a>
                                        <br />
                                        <span class="small text-black px-2"><?php echo $commento["data_commento"];?></span>
                                    </div>
                                </div>
                            </header>
                            <section class="px-5">
                            <p class="text-break"><?php echo $commento["testo"];?></p>
                            </section>
                        <hr class="text-black-50">
                        </article>
                        <?php endforeach;?>