<?php
function registerLoggedUser($user){
    $_SESSION["username"] = $user["username"];
}
function registerFilter($filtro){
    $_SESSION["filtra"] = $filtro;
}
function isUserLoggedIn(){
    return !empty($_SESSION["username"]);
}
function flatArray($array_in, $msg){
    $i = 0;
    $array_out = array();
    foreach($array_in as $user){
        $array_out[$i] = $user[$msg];
        $i = $i + 1;
    }
    return $array_out;
}
?>