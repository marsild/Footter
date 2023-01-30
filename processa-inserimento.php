<?php
 
require_once("bootstrap.php");
/* Se un utente si è appena registrato */
if(isset($_POST["reg_username"])){
    // Crea un hash random.
    $random_hash = hash("sha512", uniqid(mt_rand(1, mt_getrandmax()), true));
    // Utiliza l'hash appena creato assieme alla password inserita per generare la password hash da salvare nel db.
    $psw_hash = hash("sha512", $_POST["reg_password"].$random_hash);

    $dbh->insertUtente($_POST["reg_username"], $_POST["reg_nome"], $_POST["reg_cognome"], $psw_hash, $random_hash, $_POST["reg_email"]);

    foreach($dbh->getSquads() as $squadra){
        $id_squadra = "checkbox";
        $id_squadra = $id_squadra.$squadra["nome"];
        if(isset($_POST[$id_squadra])){
            $dbh->insertPreferiti($squadra["nome"],$_POST["reg_username"]);
        }
    }
    $dbh->createNotificaIniziale("Benvenuto su Footter!", $_POST["reg_username"]);
    $login_result = $dbh->checkLogin($_POST["reg_username"], $psw_hash);
    
    if(count($login_result)==0){
        $templateParams["errorelogin"] = "Errore durante la registrazione.";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
    header('Location: ./index.php');
}


//se si sta crando un post
if (isset($_POST["textarea"])) {
    if(!empty($_FILES["imgpost"]["name"])) { 
        $maxKB=500;
        // Get file info 
        $fileName = basename($_FILES["imgpost"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['imgpost']['tmp_name']; 
            $imgContent = file_get_contents($image); 
             
            if($_FILES["imgpost"]["size"]<($maxKB*1024)){
                $id_post = $dbh->insertPost($imgContent, $_POST["textarea"], $_SESSION["username"]);
            } else{
                //non carica
                $imgpostnull = NULL;
                $id_post = $dbh->insertPost($imgpostnull, $_POST["textarea"], $_SESSION["username"]);

            }
        }else{ 
            //non caricare immagine
            unset($_POST["imgpost"]);
            $id_post = $dbh->insertPost($_POST["imgpost"], $_POST["textarea"], $_SESSION["username"]);
        } 
    } else {
        $id_post = $dbh->insertPost($_POST["imgpost"], $_POST["textarea"], $_SESSION["username"]);
    }
    if (isset($_POST["second-squad"])) {
        if ($_POST["first-squad"] != $_POST["second-squad"]) {
            $dbh->insertSquadsPost($id_post, $_POST["first-squad"], $_POST["second-squad"]);
        } else {
            $dbh->insertSquadsPost($id_post, $_POST["first-squad"], null);
        }
    } else {
        $dbh->insertSquadsPost($id_post, $_POST["first-squad"], null);
    }
    //per ogni follower 
    foreach($dbh->getFollowers($_SESSION["username"]) as $utente){
        $notifica = false;
        
        //per ogni sua suqdra preferita
        foreach($dbh->getPreferiti($utente["username"]) as $squadraPreferita){
            foreach($dbh->getSquadreTaggate($id_post) as $squadraTaggata){
                if($squadraPreferita["squadra"]==$squadraTaggata["nome"]){
                    $notifica = true;
                }
            }
        }
        if($notifica==true){
            $dbh->createNotify("ha caricato un post su una delle tue squadre preferite.",$utente["username"],$_SESSION["username"],$id_post);
        }
    }
    header('Location: ./crea.php?result=successful');
    
}

//quando si inserisce un commento
if(isset($_POST["textcommento"], $_POST["usr"])){
    $dbh->insertComment($_POST["textcommento"],$_SESSION["username"],$_GET["idpost"]);
    $dbh->increaseCommentsNumber($_GET["idpost"]);
    $dbh->createNotify("ha commentato il tuo post.",$_POST["usr"],$_SESSION["username"],$_GET["idpost"]);
    header('Location: ./commenti.php?idpost='.$_GET["idpost"]);
}

//aggiorna preferiti
if(isset($_POST["aggiorna_preferiti"])){
    $dbh->azzeraPreferiti($_SESSION["username"]);
    foreach($dbh->getSquads() as $squadra){
        if(isset($_POST["box".$squadra["nome"]])){
            var_dump($_POST["box".$squadra["nome"]]);
            $dbh->insertPreferiti($squadra["nome"],$_SESSION["username"]);
        }
    }
    header('Location: ./preferiti.php?result=successful');

}


?>