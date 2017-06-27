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
        <?php require_once './website-parts/header.php'; ?>
        <form style="height:80vh;"action="" method="POST">
            <label>Titre</label>
            <input type="text" name="titre">
            <label>Catégorie</label>
            <input type="text" name="categorie">
            <label>Cours</label>
            <textarea style="width:100%;height:80%;" name="contenu" id="content"></textarea>
            <input type="submit" value="envoyer">
        </form>
        <?php
        ?>
    <xmp theme="united" style="display:none;">
        # Markdown text goes in here

        ## Chapter 1

        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
        et dolore magna aliqua. 

        ## Chapter 2

        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
        culpa qui officia deserunt mollit anim id est laborum.
    </xmp>
    <script src="http://strapdownjs.com/v/0.2/strapdown.js"></script>
</body>
</html>
