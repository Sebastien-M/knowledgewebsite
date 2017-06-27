<header>
    <h1 class="navTitle">Knowledge Website</h1>
    <ul class="navMenu">
        <li><a href="./index.php">Cours</a></li>
        <?php
        if (!isset($_SESSION['connected'])) {
            echo "<li><a href='./connection.php'>Connexion</a></li>" .
            "<li><a href='./inscription.php'>Inscription</a></li>";
        }
        if (isset($_SESSION['connected'])) {
            echo "<li><a href='./addCourse.php'>Ajouter un cours</a></li>" .
//            "<li><a href='./connection.php'>Connexion</a></li>" .
            "<li><a href='./disconnect.php'>Déconnexion</a></li>";
        }
        ?>
    </ul>
    <?php
    ?>
</header>