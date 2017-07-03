<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commentaire
 *
 * @author seb
 */
class Commentaire {

    protected $id;
    protected $auteur;
    protected $commentaire;
    protected $date;

    function __construct($id, $auteur, $commentaire) {
        $this->id = $id;
        $this->auteur = $auteur;
        $this->commentaire = $commentaire;
        $this->date = date("m/d/y");
    }

    function getId() {
        return $this->id;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function getDate() {
        return $this->date;
    }


}
