<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://bootswatch.com/cyborg/bootstrap.css"/>
        <?php
        session_start();
        if (isset($_POST[0])) {
            $_SESSION['articleChoisi'] = $_POST[0];
        }
        require_once '../classes/db.php';
        $db = new db();
        ?>
        <title><?php
            if (isset($_POST[0])) {
                echo $db->readSingleArticle($_POST[0], "discipline");
            } else {
                echo $db->readSingleArticle($_SESSION['articleChoisi'], "discipline");
            }
            ?></title>
    </head>
    <body>
    <xmp theme="bootswatch" style="display:none;">

<?php
        if (isset($_POST[0])) {
            echo $db->readSingleArticle($_POST[0], "titre") . "\n";
            echo $db->readSingleArticle($_POST[0], "contenu") . "\n";
        } else {
            echo $db->readSingleArticle($_SESSION['articleChoisi'], "titre") . "\n";
            echo $db->readSingleArticle($_SESSION['articleChoisi'], "contenu") . "\n";
        }
?>
    </xmp>
    <a href="../index.php">Retour au menu</a>
    <script src="http://strapdownjs.com/v/0.2/strapdown.js"></script>
    <?php
    if (isset($_SESSION['connected'])) {
        echo "<form style='' action='' method='POST'>";
        echo "<label>Commentaire</label>";
        echo "<textarea style='width:50%;height:20%;resize: none;display: flex;' name='commentaire' id='content'></textarea>";
        echo "<input type='submit' value='envoyer'>";
        echo "</form>";
    }
    if (!empty($_POST['commentaire'])){
        $comment = new Commentaire($db->readSingleArticle($_SESSION['articleChoisi'],"id"), $_SESSION["pseudo"], $_POST['commentaire']);
        $db->newComment($comment);
    }
    $db->readComments($_POST[0]);
    ?>

</body>
</html>