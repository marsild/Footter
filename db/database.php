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

       public function insertComment($testo,$username,$id_post){
        $dataattuale = date("Y-m-d");
        $stmt = $this->db->prepare("INSERT INTO commento (data_commento,testo,nickname,id_post) VALUES (?,?,?,?)");
        $stmt->bind_param("sssi",$dataattuale, $testo, $username, $id_post);
        return $stmt->execute();
    }

    public function insertUtente($nickname, $nome, $cognome, $psw, $email){
        $pfp = "pfp.png";
        $query = "INSERT INTO utente (nickname, nome, cognome, psw, email, immagine, n_follower, n_seguiti) VALUES (?, ?, ?, ?, ?, ?, 0, 0)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss',$nickname, $nome, $cognome, $psw, $email, $pfp);
        return $stmt->execute();
    }

    public function insertPreferiti($squadra, $nickname){
        $query = "INSERT INTO preferiti (squadra, nickname) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $squadra, $nickname);
        return $stmt->execute();
    }

    public function getSeguiti($username){
        $stmt = $this->db->prepare("SELECT nickname_seguito FROM segue WHERE nickname_segue = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPreferiti($username){
        $stmt = $this->db->prepare("SELECT squadra FROM preferiti WHERE nickname=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function increaseCommentsNumber($id_post){
        $stmt = $this->db->prepare("UPDATE post  SET n_commenti=n_commenti + 1 WHERE id=?");
        $stmt->bind_param("i", $id_post);
        return $stmt->execute();

    }
}

?>