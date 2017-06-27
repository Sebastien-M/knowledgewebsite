<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" href="css/header.css"/>
        <meta charset="UTF-8">
        <title>Ajouter un cours</title>
    </head>
    <body>
        <?php
        session_start();
        require_once './classes/db.php';
        require_once './classes/Article.php';
        require_once './website-parts/header.php';
        ?>
        <form style="height:80vh;" action="" method="POST">
            <label>Titre</label>
            <input type="text" name="titre">
            <label>Catégorie</label>
            <input type="text" name="categorie">
            <label>Cours</label>
            <textarea style="width:100%;height:80%;resize: none;" name="cours" id="content"></textarea>
            <input type="submit" value="envoyer">
        </form>
        <?php
        if(isset($_POST['titre'])&& isset($_POST['categorie'])&& isset($_POST['cours'])){
            $db = new db();
            var_dump($db);
            $course = new Article($_POST['categorie'], $_POST['titre'], $_POST['cours'], $_SESSION["pseudo"]);
            $db->newArticle($course);
        }

        ?>

    </body>
</html>
