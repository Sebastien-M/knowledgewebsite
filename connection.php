<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/header.css"/>
        <title></title>
    </head>
    <body>
        <?php
        require_once 'website-parts/header.php';
        require_once './classes/db.php';
        ?>
        <form action="" method="POST">
            <input type="text" placeholder="Pseudo" name="pseudo">
            <input type="password" placeholder="Mot de passe" name="password">
            <input type="submit" value="envoyer">
        </form>
        <?php
        $db = new db();
        if(isset($_POST["pseudo"]) && isset($_POST["password"])){
            $db->readUser(htmlspecialchars($_POST["pseudo"]), htmlspecialchars($_POST["password"]));
        }
        else{
            echo "pseudo ou mdp non entré";
        }
        ?>
    </body>
</html>
