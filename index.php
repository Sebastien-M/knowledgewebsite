<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="css/header.css"/>
        <title>Knowledge website</title>
    </head>
    <body>
        <?php
        require_once './website-parts/header.php';
        include_once './classes/Utilisateur.php';
        include_once './classes/Articles.php';
        $article1 = new Articles("maths", "titre", "blablablabal", "12", "1", "12/12/12", "nom1", "maths,blabla");
        session_start();
        if(!isset($_SESSION['connected'])){
            echo "Déconnecté";
        }
        ?>
        
    </body>
</html>