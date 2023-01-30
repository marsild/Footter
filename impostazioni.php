<?php

require_once("bootstrap.php");
if(!isUserLoggedIn()){
    header('Location: ./index.php');
}

if(!empty($_FILES["imgutente"]["name"])) { 
 // Get file info 
 $fileName = basename($_FILES["imgutente"]["name"]); 
 $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
  
 $maxKB=500;
 // Allow certain file formats 
 $allowTypes = array('jpg','png','jpeg','gif'); 
 if(in_array($fileType, $allowTypes) && $_FILES["imgutente"]["size"]<($maxKB*1024) ){ 
     $image = $_FILES['imgutente']['tmp_name']; 
     $imgContent = file_get_contents($image); 
     $dbh->updateProfile($_SESSION["username"],$imgContent);
 }else{ 
     //non caricare immagine
 }
 }
$templateParams["active"] = "Impostazioni";
$templateParams["nome"] = "form_impostazioni.php";
$templateParams["profilo"]=$dbh->getUtente($_SESSION["username"])[0];
require("template/base.php");
