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
        $dataattuale = date("Y-m-d h:i:s");
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
    
    public function getUtente($username){
        $stmt = $this->db->prepare("SELECT nome, cognome, email, immagine, n_follower, n_seguiti, nickname FROM utente WHERE nickname=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNrOfPost($username){
        $stmt = $this->db->prepare("SELECT count(*) as total FROM post WHERE nickname=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertSegue($nickname_segue, $nickname_seguito){
        $query = "INSERT INTO segue (nickname_segue, nickname_seguito) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $nickname_segue, $nickname_seguito);
        return $stmt->execute();
    }
    public function deleteSegue($nickname_segue, $nickname_seguito){
        $query = "DELETE FROM segue WHERE nickname_segue=? AND nickname_seguito=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $nickname_segue, $nickname_seguito);
        return $stmt->execute();
    }
    public function increaseFollowerSeguiti($nickname_segue, $nickname_seguito){
        $stmt = $this->db->prepare("UPDATE utente SET n_seguiti=n_seguiti + 1 WHERE nickname=?");
        $stmt->bind_param("s", $nickname_segue);
        $stmt->execute();
        $stmt1 = $this->db->prepare("UPDATE utente SET n_follower=n_follower + 1 WHERE nickname=?");
        $stmt1->bind_param("s", $nickname_seguito);
        return $stmt1->execute();
    }
    public function decreaseFollowerSeguiti($nickname_segue, $nickname_seguito){
        $stmt = $this->db->prepare("UPDATE utente SET n_seguiti=n_seguiti - 1 WHERE nickname=?");
        $stmt->bind_param("s", $nickname_segue);
        $stmt->execute();
        $stmt1 = $this->db->prepare("UPDATE utente SET n_follower=n_follower - 1 WHERE nickname=?");
        $stmt1->bind_param("s", $nickname_seguito);
        return $stmt1->execute();
    }
    public function getUtentiSeguiti($username){
        $stmt = $this->db->prepare("SELECT s.nickname_seguito as username, u.immagine FROM segue as s, utente as u WHERE s.nickname_segue = ? AND s.nickname_seguito = u.nickname");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getFollowers($username){
        $stmt = $this->db->prepare("SELECT s.nickname_segue as username, u.immagine FROM segue as s, utente as u WHERE s.nickname_seguito = ? AND s.nickname_segue = u.nickname");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insertPost($immagine, $testo, $nickname){
        $dataattuale = date("Y-m-d h:i:s");
        $query = "INSERT INTO post (immagine, testo, n_like, n_commenti, data_post, nickname) VALUES (?, ?, 0, 0, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss',$immagine, $testo, $dataattuale, $nickname);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function insertSquadsPost($id_post,$squadra1,$squadra2){
        $query = "INSERT INTO riguarda (squadra, id_post) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$squadra1,$id_post);
        if(isset($squadra2)){
            $query1 = "INSERT INTO riguarda (squadra, id_post) VALUES (?, ?)";
            $stmt1 = $this->db->prepare($query1);
            $stmt1->bind_param('si',$squadra2,$id_post);
            $stmt1->execute();
        }
        $stmt->execute();
    }
    public function deleteComments($id_post){
        $query = "DELETE FROM commento WHERE id_post=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_post);
        return $stmt->execute();
    }
    public function deleteLikes($id_post){
        $query = "DELETE FROM piace WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_post);
        return $stmt->execute();
    }
    public function deleteTeamTags($id_post){
        $query = "DELETE FROM riguarda WHERE id_post=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_post);
        return $stmt->execute();
    }
    public function deletePost($id_post){
        $query = "DELETE FROM post WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id_post);
        return $stmt->execute();
    }
    public function createNotify($messaggio,$nickname_riceve,$nickname_causa,$id_post){
        if($nickname_causa!=$nickname_riceve){
        $dataattuale = date("Y-m-d h:i:s");
        $query = "INSERT INTO notifica (data_notifica, messaggio, visualizzato, nickname_riceve, nickname_causa, id_post) VALUES (?, ?, false, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssi',$dataattuale, $messaggio, $nickname_riceve, $nickname_causa,$id_post);
        return $stmt->execute();
        }
        else{
            return;
        }
        

    }

}

?>