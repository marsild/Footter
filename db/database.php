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
        $stmt = $this->db->prepare("SELECT s.logo, s.nome FROM riguarda as r, squadra as s WHERE r.id_post = ? and  r.squadra = s.nome");
        $stmt->bind_param("i",$idPost);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getPosts(){
        $stmt = $this->db->prepare("SELECT p.id,p.immagine as ImmaginePost, p.testo, p.n_like, p.n_commenti, p.data_post, p.nickname, u.immagine as ImmagineUtente FROM post as p, utente as u where p.nickname = u.nickname ORDER BY p.data_post desc");
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

    public function checkLogin($username, $password){
        $stmt = $this->db->prepare("SELECT nickname as username FROM utente WHERE nickname = ? AND psw = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    } 
    public function getComments($id_post){
        $stmt = $this->db->prepare("SELECT c.data_commento, c.nickname, c.testo, u.immagine FROM commento as c, utente as u WHERE id_post=? and c.nickname=u.nickname ORDER BY c.data_commento desc");
        $stmt->bind_param("i", $id_post);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSquads(){
        $stmt = $this->db->prepare("SELECT nome, logo FROM squadra");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>