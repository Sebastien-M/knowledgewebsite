<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author seb
 */
include_once 'Utilisateur.php';
include_once 'Article.php';
include_once 'Commentaire.php';

class db {

    private $dbh;

    function __construct() {
        $this->dbh = new PDO('mysql:host=localhost;dbname=knowledge_websitedb', 'root', 'toor');
    }

    function new_user(Utilisateur $user) {
        $query = $this->dbh->query("INSERT INTO users(pseudo, password, email, reg_date) " .
                "VALUES ('" . $user->getNom() . "','" . $user->getPassword() . "','" . $user->getEmail() . "',NOW() );");
        if (!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->dbh->errorInfo());
        }
    }

    function newArticle(Article $cours) {
        $query = $this->dbh->query("INSERT INTO articles (discipline, titre, contenu, auteur, creation_date) VALUES ('"
                . $cours->getDiscipline() . "', '" . $cours->getTitre() . "', '" . $cours->getContenu() . "', '" . $cours->getAuteur() . "', NOW());");
        if (!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->dbh->errorInfo());
        }
    }

    function connect($user, $password) {
        $verif_login = $this->dbh->query("SELECT COUNT(*) FROM users WHERE pseudo = '" . $user . "';");
        if ($verif_login->fetchColumn() == 0) {
            //echo "Pseudo inexistant";
        } else {
            $reponse_login = $this->dbh->query("SELECT password FROM users WHERE pseudo ='" . $user . "' LIMIT 1;");
            $donnees = $reponse_login->fetch();
            $passresult = password_verify($password, $donnees['password']);
            if ($passresult == TRUE) {
                return TRUE;
            }
        }
    }

    function readArticles() {
        $arr = [];
        $query = $this->dbh->query("SELECT * FROM articles");
        if (!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->dbh->errorInfo());
        }
        while ($row = $query->fetch()) {
            $arr[$row['id']]["discipline"] = $row['discipline'];
            $arr[$row['id']]["titre"] = $row['titre'];
            $arr[$row['id']]["contenu"] = $row['contenu'];
            $arr[$row['id']]["auteur"] = $row['auteur'];
            $arr[$row['id']]["creation"] = $row['creation_date'];
        }
        return $arr;
    }
    
    function readSingleArticle($chosen){
        $arr = [];
        $query = $this->dbh->query("SELECT * FROM articles where titre='".$chosen."' LIMIT 1;");
        if (!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->dbh->errorInfo());
        }
        while ($row = $query->fetch()) {
            $arr['titre'] = $row['titre'];
        }
    }

}
