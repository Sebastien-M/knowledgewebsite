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

    /**
     * newUser
     *
     * creates a new user
     *
     * @param (Class) (Utilisateur) Utilisateur Class
     * @return (none) (none)
     * 
     */
    function newUser(Utilisateur $user) {
        $inp = file_get_contents("./json/users.json");
        $json = json_decode($inp);
        $json->{$user->getNom()}["email"] = $user->getEmail();
        $json->{$user->getNom()}["pseudo"] = $user->getNom();
        $json->{$user->getNom()}["age"] = $user->getAge();
        $json->{$user->getNom()}["avatar"] = $user->getAvatar();
        $json->{$user->getNom()}["bio"] = $user->getBio();
        $json->{$user->getNom()}["id"] = $user->getId();
        $json->{$user->getNom()}["password"] = $user->getPassword();
        $jsonData = json_encode($json);
        file_put_contents("./json/users.json", $jsonData);
    }

    /**
     * readUser
     *
     * check if good username and password written
     *
     * @param (str,str) (username,password) username,password
     * @return (bool) (true/false)
     * 
     */
    function readUser($username, $password) {
        $inp = file_get_contents("./json/users.json");
        $json = json_decode($inp);
        foreach ($json as $key => $value) {
            if ($value->{"pseudo"} === $username && $value->{"password"} === md5($password)) {
                return true;
            }
        }
        return false;
    }

    /**
     * newArticle
     *
     * creates a new article
     *
     * @param (Class) (Article) Article class
     *
     */
    function newArticle(Article $course) {
        $inp = file_get_contents("./json/articles.json");
        $json = json_decode($inp);
        $json->{$course->getTitre()}["discipline"] = $course->getDiscipline();
        $json->{$course->getTitre()}["titre"] = $course->getTitre();
        $json->{$course->getTitre()}["contenu"] = $course->getContenu();
        $json->{$course->getTitre()}["auteur"] = $course->getAuteur();
        $json->{$course->getTitre()}["id"] = $course->getId();
        $json->{$course->getTitre()}["upvotes"] = $course->getUpvotes();
        $json->{$course->getTitre()}["downvotes"] = $course->getDownvotes();
        $jsonData = json_encode($json);
        file_put_contents("./json/articles.json", $jsonData);
    }

    /**
     * readArticle
     *
     * readArticles
     *
     * @return (array) (articles) returns a form with articles inside
     * 
     */
    function readArticles() {
        $inp = file_get_contents("./json/articles.json");
        $json = json_decode($inp);
        $articles = [];
        foreach ($json as $key => $value) {
            array_push($articles, $value);
        }
        return $articles;
    }

    /**
     * readSingleArticle
     *
     * Opens a single article
     *
     * @param (str,str) (articlename,argument)
     * @return (array) (contents of article)
     * 
     */
    function readSingleArticle($nameArticle, $arg) {
        $inp = file_get_contents("../json/articles.json");
        $json = json_decode($inp);
        $contents = [$json->{$nameArticle}->{"discipline"},
            $json->{$nameArticle}->{"titre"},
            $json->{$nameArticle}->{"contenu"},
            $json->{$nameArticle}->{"auteur"},
            $json->{$nameArticle}->{"id"}];

        if ($arg === "discipline") {
            return $contents[0];
        } else if ($arg === "titre") {
            return "#" . $contents[1];
        } else if ($arg === "contenu") {
            return $contents[2];
        } else if ($arg === "auteur") {
            return $contents[3];
        } else if ($arg === "all") {
            return $contents;
        } else if ($arg === "id") {
            return $contents[4];
        }
    }

    /**
     * newComment
     *
     * creates a new comment
     *
     * @param (Class) (Commentaire) Commentaire Class
     * @return (none) (none)
     * 
     */
    function newComment(Commentaire $comment) {
        $inp = file_get_contents("../json/commentaires.json");
        $json = json_decode($inp);
        $rand = $comment->getId2();
        $json->{$comment->getAuteur() . "#" . $rand}["id"] = $comment->getId();
        $json->{$comment->getAuteur() . "#" . $rand}["auteur"] = $comment->getAuteur();
        $json->{$comment->getAuteur() . "#" . $rand}["commentaire"] = $comment->getCommentaire();
        $json->{$comment->getAuteur() . "#" . $rand}["date"] = $comment->getDate();
        $json->{$comment->getAuteur() . "#" . $rand}["id2"] = $comment->getId2();
        //$json->{$comment->getAuteur() . "#" . $rand}["upvotes"] = $comment->getUpvotes();
        //$json->{$comment->getAuteur() . "#" . $rand}["downvotes"] = $comment->getDownvotes();
        $jsonData = json_encode($json);
        file_put_contents("../json/commentaires.json", $jsonData);
    }

    /**
     * readComments
     *
     * list all comments
     *
     * @param (str) (ID) id number(same as article id)
     * @return (arr) (commentaire and form)
     * 
     */
    function readComments( $id)/*: Array*/ {
        $inp = file_get_contents("../json/commentaires.json");
        $json = json_decode($inp);
        $values = [];
        if (!empty($json)) {
            foreach ($json as $key => $value) {
                array_push($values, $value);
            }
            return $values;
        }
        
    }
    
    /**
     * deleteComment
     *
     * Deletes a comment
     *
     * @param (Object) ($value) Commentaire object from readComments()
     * @return (none) (none)
     * 
     */
    function deleteComment($auteur, $id) {
        $inp = file_get_contents("../json/commentaires.json");
        $json = json_decode($inp);
        unset($json->{$auteur."#".$id});
        file_put_contents('../json/commentaires.json',json_encode($json));
        unset($json);
    }

    /**
     * upvotes
     *
     * adds upvotes
     *
     * @param (Class) (Commentaire) Commentaire class
     * @return (none) (none)
     * 
     */
    function upvotes(Article $article, $upvote) {
        $votes = $article->setUpvotes();
        array_push($votes, $upvote);
    }

    /**
     * downvotes
     *
     * adds downvotes
     *
     * @param (Class) (Commentaire) Commentaire class
     * @return (none) (none)
     * 
     */
    function downvotes(Article $article) {
        $currentup = $comment->getUpvotes();
        $currentup += 1;
        $inp = file_get_contents("../json/commentaires.json");
        $json = json_decode($inp);
        $json->{$comment->getAuteur() . "#" . $comment->getId()}["upvotes"] = $currentup;
    }

}
