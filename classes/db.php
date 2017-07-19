<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class managing all database usages
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
        //$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * new user
     *
     * creates a new user
     *
     * @param Class Utilisateur User class
     * @return (none) (none)
     * 
     */
    function new_user(Utilisateur $user) {
        $pseudo = $user->getNom();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $date = 'NOW()';
        $query = $this->dbh->prepare("INSERT INTO users(pseudo, password, email, reg_date) " .
                "VALUES (:pseudo, :password, :email, :reg_date);");
        $query->bindParam('pseudo', $pseudo);
        $query->bindParam('password', $password);
        $query->bindParam('email', $email);
        $query->bindParam('reg_date', $date);
        $query->execute();
        if (!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->dbh->errorInfo());
        }
    }

    /**
     * newArticle
     *
     * creates a new article
     *
     * @param (Class) (Article) Article Class
     * @return (none) 
     * 
     */
    function newArticle(Article $cours) {
        $discipline = $cours->getDiscipline();
        $titre = $cours->getTitre();
        $contenu = $cours->getContenu();
        $auteur = $cours->getAuteur();
        $date = 'NOW()';
        $query = $this->dbh->prepare("INSERT INTO articles (discipline, titre, contenu, auteur, creation_date) "
                . "VALUES (:discipline,:titre, :contenu, :auteur, :creation_date);");
        $query->bindParam('discipline', $discipline);
        $query->bindParam('titre', $titre);
        $query->bindParam('contenu', $contenu);
        $query->bindParam('auteur', $auteur);
        $query->bindParam('creation_date', $date);
        $query->execute();
//        if (!$query) {
//            echo "\nPDO::errorInfo():\n";
//            print_r($this->dbh->errorInfo());
//        }
    }
    
    /**
     * connect
     *
     * check if pseudo and password matches with an existing one
     *
     * @param (str,str) $user,$password pseudo and password sent inside inputs
     * @return (Bool) (True if connection is okay)
     * 
     */
    function connect($user, $password) {
        $verif_login = $this->dbh->query("SELECT COUNT(*) FROM users WHERE pseudo = '" . $user . "';");
        if ($verif_login->fetchColumn() == 0) {
            //Pseudo inexistant
        } else {
            $reponse_login = $this->dbh->query("SELECT password FROM users WHERE pseudo ='" . $user . "' LIMIT 1;");
            $donnees = $reponse_login->fetch();
            $passresult = password_verify($password, $donnees['password']);
            if ($passresult == TRUE) {
                return TRUE;
            }
        }
    }
    
    /**
     * readArticles
     *
     * display articles
     *
     * @param none
     * @return (associative array) (Associative array containing discipline, titre, contenu, auteur and creation date)
     * 
     */
    function readArticles() {
        $arr = [];
        $query = $this->dbh->query("SELECT * FROM articles");
//        if (!$query) {
//            echo "\nPDO::errorInfo():\n";
//            print_r($this->dbh->errorInfo());
//        }
        while ($row = $query->fetch()) {
            $arr[$row['id']]["discipline"] = $row['discipline'];
            $arr[$row['id']]["titre"] = $row['titre'];
            $arr[$row['id']]["contenu"] = $row['contenu'];
            $arr[$row['id']]["auteur"] = $row['auteur'];
            $arr[$row['id']]["creation"] = $row['creation_date'];
        }
        return $arr;
    }
    
    /**
     * readSingleArticle
     *
     * Display content of an article
     *
     * @param str $chosen Title of article
     * @return (array) (Array containing discipline, titre, contenu, auteur and creation date)
     * 
     */
    function readSingleArticle($chosen){
        $arr = [];
        $query = $this->dbh->query("SELECT * FROM articles where titre='".$chosen."' LIMIT 1;");
//        if (!$query) {
//            echo "\nPDO::errorInfo():\n";
//            print_r($this->dbh->errorInfo());
//        }
        while ($row = $query->fetch()) {
            $arr['id'] = $row['id'];
            $arr['discipline'] = $row['discipline'];
            $arr['titre'] = $row['titre'];
            $arr['contenu'] = $row['contenu'];
            $arr['auteur'] = $row['auteur'];
            $arr['creation'] = $row['creation_date'];
        }
        return $arr;
    }

    function newComment(){
        
    }
    
    function readComments(){
        
    }
}
