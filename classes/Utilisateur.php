<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auteur
 *
 * @author seb
 */

class Utilisateur {
    protected $nom;
    protected $email;
    protected $avatar;
    protected $bio;
    protected $age;
    protected $id;
            
    function __construct($nom, $email, $avatar, $bio, $age) {
        $this->nom = $nom;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->bio = $bio;
        $this->age = $age;
    }
    function getNom() {
        return $this->nom;
    }
    
    function getEmail(){
        return $this->email;
    }
    
    function getAvatar() {
        return $this->avatar;
    }

    function getBio() {
        return $this->bio;
    }

    function getAge() {
        return $this->age;
    }
    
    function getId(){
        return $this->id;
    }


}
