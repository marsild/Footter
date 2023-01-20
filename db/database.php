<?php

class DatabaseHelper{
    private $db;
    
    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connessione fallita al db");
        }
    }
    public function getSquadreTaggate($idPost){
        $stmt = $this->db->prepare("SELECT s.logo FROM riguarda as r, squadra as s WHERE r.id_post = ? and  r.squadra = s.nome");
        $stmt->bind_param("i",$idPost);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getPosts(){
        $stmt = $this->db->prepare("SELECT p.id,p.immagine as ImmaginePost, p.testo, p.n_like, p.n_commenti, p.data_post, p.nickname, u.immagine as ImmagineUtente FROM post as p, utente as u where p.nickname = u.nickname");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getCategories(){
        $stmt = $this->db->prepare("SELECT idcategoria, nomecategoria FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>