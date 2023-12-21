<?php
require_once './assets/sql/database.php';

$error = "";

if (isset($_POST['email'])) {
    //Récupération des infos de connexion
    $connexion =
        array(
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        );

    //On récupère le compte correspondant (ou pas)
    $db = Database::getInstance()::getConnection();
    $query = $db->prepare("SELECT * FROM ACCOUNT WHERE email_user = :email");
    $query->execute(['email' => $connexion['email']]);
    $data = $query->fetch(PDO::FETCH_ASSOC);

    //On affiche une erreur si le compte existe pas
    if (count($data) < 1) {
        $error = "Le compte que vous cherchez n'exite pas";
        require './views/connexion.php';
        die();
    }
    //Erreur si les mots de passe ne correspondent pas
    if (!password_verify($connexion['password'], $data['password_user'])) {
        $error = "Le mot de passe est incorrect !";
        require './views/connexion.php';
        die();
    }

    //Si on est arrivé jusqu'ici alors tout est bon
    $_SESSION['lastname'] = $data['name_user'];
    header('Location: /game_collection/');
}


require './views/connexion.php';
