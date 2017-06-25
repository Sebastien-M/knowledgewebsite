
<form action=""method="POST">
    <label for="">Nom</label>
    <input type="text" name="nom">
    <label for="">Email</label>
    <input type="email" name="email">
    <label for="">Avatar</label>
    <input type="file" name="avatar">
    <label for="">Bio</label>
    <input type="text" name="bio">
    <label for="">age</label>
    <input type="number" name="age">
    <input type="submit" value="Envoyer">
</form>
<?php
include_once '../classes/Utilisateur.php';
if(!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["avatar"]) && !empty($_POST["age"])){
    $utilisateur = new Utilisateur($_POST["nom"], $_POST["email"], $_POST["avatar"], $_POST["bio"], $_POST["age"]);
}
else{
    echo "truc manquant";
}
?>