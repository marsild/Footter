<?php

class DatabaseHelper{
    private $db;
    
    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connessione fallita al db");
        }
        var_dump($this->db);
    }

    public function getPosts(){
        $stmt = $this->db->prepare("SELECT immagine, testo, nLike, nCommenti, dataPost, nickname,  FROM POST");
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