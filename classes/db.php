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

    function newArticle(Article $course){
        $inp = file_get_contents("./json/articles.json");
        $json = json_decode($inp);
        $json->{$course->getTitre()}["discipline"] = $course->getDiscipline();
        $json->{$course->getTitre()}["titre"] = $course->getTitre();
        $json->{$course->getTitre()}["contenu"] = $course->getContenu();
        $json->{$course->getTitre()}["auteur"] = $course->getAuteur();
        $jsonData = json_encode($json);
        file_put_contents("./json/articles.json", $jsonData);
    }
    function readArticles(){
        $inp = file_get_contents("./json/articles.json");
        $json = json_decode($inp);
        foreach($json as $key => $value){
            echo '<br/>'.$value->{'titre'}.'<br/>';
        }
    }

}
