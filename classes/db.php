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

    function readUser($username, $password) {
        $inp = file_get_contents("./json/users.json");
        $json = json_decode($inp);
        //PUT SOME SHITTY CODE HERE
        foreach ($json as $key => $value) {
            if ($value->{"pseudo"} === $username && $value->{"password"} === md5($password)) {
                return true;
            }
        }
        return false;
    }

    function newArticle(Article $course) {
        $inp = file_get_contents("./json/articles.json");
        $json = json_decode($inp);
        $json->{$course->getTitre()}["discipline"] = $course->getDiscipline();
        $json->{$course->getTitre()}["titre"] = $course->getTitre();
        $json->{$course->getTitre()}["contenu"] = $course->getContenu();
        $json->{$course->getTitre()}["auteur"] = $course->getAuteur();
        $json->{$course->getTitre()}["id"] = $course->getId();
        $jsonData = json_encode($json);
        file_put_contents("./json/articles.json", $jsonData);
    }

    function readArticles() {
        $inp = file_get_contents("./json/articles.json");
        $json = json_decode($inp);
        $i = 0;
        foreach ($json as $key => $value) {
            echo "<form action='website-parts/course.php' method='POST'>";
            echo "<input type='submit' name='" . $i . "' value='" . $value->{'titre'} . "'";
            echo "<form/>";
        }
    }

    function readSingleArticle($nameArticle, $arg) {
        $inp = file_get_contents("../json/articles.json");
        $json = json_decode($inp);
        $contents = [$json->{$nameArticle}->{"discipline"},
            $json->{$nameArticle}->{"titre"},
            $json->{$nameArticle}->{"contenu"},
            $json->{$nameArticle}->{"auteur"},
            $json->{$nameArticle}->{"id"}];
            
        if($arg === "discipline"){
            return $contents[0];
        }
        else if($arg === "titre"){
            return "#".$contents[1];
        }
        else if($arg === "contenu"){
            return $contents[2];
        }
        else if($arg === "auteur"){
            return $contents[3];
        }
        else if($arg === "all"){
            return $contents;
        }
        else if ($arg === "id"){
            return $contents[4];
        }
        
    }
    
    function newComment(Commentaire $comment){
        $inp = file_get_contents("../json/commentaires.json");
        $json = json_decode($inp);
        $rand = rand(0, 1000000000);
        $json->{$comment->getAuteur()."#".$rand}["id"] = $comment->getId();
        $json->{$comment->getAuteur()."#".$rand}["auteur"] = $comment->getAuteur();
        $json->{$comment->getAuteur()."#".$rand}["commentaire"] = $comment->getCommentaire();
        $json->{$comment->getAuteur()."#".$rand}["date"] = $comment->getDate();
        $jsonData = json_encode($json);
        file_put_contents("../json/commentaires.json", $jsonData);
    }
    function readComments($id){
        $inp = file_get_contents("../json/commentaires.json");
        $json = json_decode($inp);
        echo "<p>Commentaires : </p>";
        foreach ($json as $key => $value) {
            if($value->{'id'} === $id){
                echo $value->{'commentaire'}."<br/>".$value->{'date'}."<br/>";
            }
        }
    }
}
