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
class Articles {

    protected $discipline;
    protected $titre;
    protected $contenu;
    protected $upvotes;
    protected $downvotes;
    protected $date;
    protected $auteur;
    protected $tags;

    function __construct($discipline, $titre, $contenu, $upvotes, $downvotes, $date, $auteur, $tags) {
        $this->discipline = $discipline;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->upvotes = $upvotes;
        $this->downvotes = $downvotes;
        $this->date = $date;
        $this->auteur = $auteur;
        $this->tags = $tags;
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

}
