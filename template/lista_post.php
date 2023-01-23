
<?php foreach($templateParams["getPosts"] as $post):?>
    <article class="bg-white border-top border-bottom border-2 border-dark">
        <header class="pt-3">
            <div class="px-4">
                <div>
                    <img class="image rounded-circle border border-1" src="<?php echo UPLOAD_DIR.$post["ImmagineUtente"];?>" alt="Immagine Profilo">
                    <div class="float-end">
                        <?php foreach( $dbh->getSquadreTaggate($post["id"]) as $squadra):?>
                            <img src="<?php echo UPLOAD_DIR.$squadra["logo"];?>" alt="">
                         <?php endforeach; ?>
                    </div>
                </div>
                <div class="alignme">
                    <a class="text-black px-2" href="#"><?php echo $post["nickname"];?></a>
                    <br />
                    <span class="small text-black px-2"><?php echo $post["data_post"];?></span>
                </div>
            </div>
        </header>
        <section class="px-5">
            <p class="text-break"><?php echo $post["testo"];?></p>
            <div class="w-100 text-center">
                <img class="border border-3 img-fluid" src="<?php echo UPLOAD_DIR.$post["ImmaginePost"];?>" alt="Immagine Post" />
            </div>
        </section>
        <footer class="px-3 pb-3">
            <button type="button float-start" class="btn">
                <em class="bi bi-heart fs-4"></em> <?php echo $post["n_like"];?>
            </button>

            <a href="commenti.php?idpost=<?php echo $post["id"]?>" class="btn float-end" role="button">
            <?php echo $post["n_commenti"];?> <em class="bi bi-chat-dots fs-4"></em>
            </a>
        </footer>
    </article>     
<?php endforeach; ?>
                        
                    