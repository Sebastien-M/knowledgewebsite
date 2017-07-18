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
        $this->dbh = new PDO('mysql:host=localhost;dbname=knowledge_websitedb', 'root', 'rga42fm');
    }

    function new_user($pseudo, $password, $email) {
        $this->dbh->exec("INSERT INTO users( pseudo, password,email,reg_date) ".
                "VALUES ('$pseudo','".md5($password). "',' $email',NOW());");
    }

    function display(){
        return $this->dbh->query('SELECT * FROM users');
    }
}
