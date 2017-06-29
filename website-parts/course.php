<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css"/>
        <?php
        require_once '../classes/db.php';
        $db = new db();
        session_start();
        
        //au clic sur la page article choisi = article cliqué
        if (!isset($_POST['commentaire'])) {
            $_SESSION['articleChoisi'] = $_POST[0];
        }
        ?>
        <title><?php
        //useless?
            if ($_SESSION['articleChoisi']) {
                echo $db->readSingleArticle($_SESSION['articleChoisi'], "discipline");
            } 
            ?></title>
    </head>
    <body>
    <xmp theme="bootswatch" style="display:none;">

<?php
        //useless2?
        if ($_SESSION['articleChoisi']) {
            echo $db->readSingleArticle($_SESSION['articleChoisi'], "titre") . "\n";
            echo $db->readSingleArticle($_SESSION['articleChoisi'], "contenu") . "\n";
        } 
?>
    </xmp>
    <a href="../index.php">Retour au menu</a>
    <script src="http://strapdownjs.com/v/0.2/strapdown.js"></script>
    <?php
    // si connecté afficher form pour commentaires
    if (isset($_SESSION['connected'])) {
        echo "<form style='' action='' method='POST'>";
        echo "<label>Nouveau commentaire</label>";
        echo "<textarea style='width:50%;height:20%;resize: none;display: flex;' name='commentaire' id='content'></textarea>";
        echo "<input type='submit' value='envoyer'>";
        echo "</form>";
    }
    //si connecté et commentaire rempli
    if (!empty($_POST['commentaire'])){
        $comment = new Commentaire($db->readSingleArticle($_SESSION['articleChoisi'],"id"), $_SESSION["pseudo"], $_POST['commentaire']);
        $db->newComment($comment);
    }
    // si non connecté pas de commentaires possible
    else if( !isset($_SESSION['connected'])){}
    //si connecté et commentaire vide
    else if (isset($_POST['commentaire']) && $_POST['commentaire'] === ""){
        echo "Commentaire vide";
    }
    //lire commentaires
    $db->readComments($db->readSingleArticle($_SESSION['articleChoisi'], "id"));
    ?>

</body>
</html>