<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/header.css"/>
        <link rel="stylesheet" href="css/inscription.css"/>
        <title>Document</title>
    </head>
    <body>
        <?php
        session_start();
        require_once 'website-parts/header.php';
        ?>
        <main>
            <form class="inscription" action=""method="POST">
                <label for="">Nom</label>
                <input type="text" name="nom">
                <label for="">Email</label>
                <input type="email" name="email">
                <label for="">Mot de passe</label>
                <input type="password" name="password">
                <label for="">Avatar</label>
                <input type="file" name="avatar">
                <label for="">Bio</label>
                <input type="text" name="bio">
                <label for="">age</label>
                <input type="date" name="age">
                <input type="submit" value="Envoyer">
            </form>
        </main>
        <?php
        include_once 'classes/Utilisateur.php';
        include_once 'classes/db.php';
        $save = new db();
        $randomId = rand(0, 1000000);
        if (!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["avatar"]) && !empty($_POST["age"])) {
            $utilisateur = new Utilisateur(htmlspecialchars($_POST["nom"]), htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["avatar"]), htmlspecialchars($_POST["bio"]), htmlspecialchars($_POST["age"]), $randomId);
            $utilisateur->setPassword(md5(htmlspecialchars($_POST["password"])));
            $save->newUser($utilisateur);
        } else {
            echo "truc manquant";
        }
        ?>
    </body>
</html>