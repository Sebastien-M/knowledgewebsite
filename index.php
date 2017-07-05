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
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
        <link rel="stylesheet" href="css/header.css"/>
        <link rel="stylesheet" href="css/index.css"/>
        <title>Knowledge website</title>
    </head>
    <body>

        <?php
        session_start();
        require_once './website-parts/header.php';
        require_once 'classes/db.php';
        include_once './classes/Utilisateur.php';
        include_once './classes/Article.php';
        ?>
        <main>
            <?php
            $db = new db();
            if (!isset($_SESSION['connected'])) {
                echo "Déconnecté";
            }
            $articles = $db->readArticles();
            $i = 0;
            foreach ($articles as $key => $value) {
                echo "<form class='coursForm' action='website-parts/course.php' method='POST'>";
                echo "<input class='coursButton' type='submit' name='article' value='" . $value->{'titre'} . "'style='width:100%'>";
                echo "</form>";
            }
            ?>
        </main>
    </body>
</html>