<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './classes/Utilisateur.php';
        include_once './classes/Articles.php';
        $utilisateur1 = new Utilisateur("nom1", "avatar", "bio utilisateur", "89");
        $article1 = new Articles("maths", "titre", "blablablabal", "12","1", "12/12/12", "nom1", "maths,blabla")
        ?>
        <form action="" method="POST">
            <input type="text" name="titre" placeholder="Titre">
            <input type="text" name="contenu" placeholder="Contenu">
            <input type="submit" value="Envoyer">
        </form>
        <div>
        <?php
        echo $utilisateur1->getNom();
        echo $article1->makeArticle();
        ?>
        </div>
    </body>
</html>