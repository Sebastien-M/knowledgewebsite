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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-HzUaiJdCTIY/RL2vDPRGdEQHHahjzwoJJzGUkYjHVzTwXFQ2QN/nVgX7tzoMW3Ov" crossorigin="anonymous">
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

    </body>
</html>