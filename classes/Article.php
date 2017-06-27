<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articles
 *
 * @author seb
 */
class Article {

    protected $discipline;
    protected $titre;
    protected $contenu;
    protected $upvotes;
    protected $downvotes;
//    protected $date;
    protected $auteur;
    protected $tags;

    function __construct($discipline, $titre, $contenu, $auteur) {
        $this->discipline = $discipline;
        $this->titre = $titre;
        $this->contenu = $contenu;
//        $this->date = date("m/d/y");
        $this->auteur = $auteur;
    }

    function makeArticle() {
        echo "<div class='article'>";
        echo "<p>" . $this->titre . "</p>";
        echo "<p>" . $this->contenu . "</p>";
        echo "<p>" . $this->auteur . "</p>";
        echo "<p>" . $this->date . "</p>";
        echo "<p>" . $this->discipline . "</p>";
        echo "<p>" . $this->tags . "</p>";
        echo "<p>" . $this->upvotes . "</p>";
        echo "</div>";
    }
    function getDiscipline() {
        return $this->discipline;
    }

    function getTitre() {
        return $this->titre;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getUpvotes() {
        return $this->upvotes;
    }

    function getDownvotes() {
        return $this->downvotes;
    }

    function getDate() {
        return $this->date;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getTags() {
        return $this->tags;
    }


}
