<?php

global $db;
$db = Database::getInstance()::getConnection();

function connexion($connexion){

    //On récupère le compte correspondant (ou pas)
    global $db;
    $query = $db->prepare("SELECT * FROM ACCOUNT WHERE email_user = :email");
    $query->execute(['email' => $connexion['email']]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    //On affiche une erreur si le compte existe pas
    if (count($data) < 1) {
        $error = "Le compte que vous cherchez n'exite pas";
        require './views/connexion.php';
        die();
    }
    //Erreur si les mots de passe ne correspondent pas
    if (!password_verify($connexion['password'], $data[0]['password_user'])) {
        $error = "Le mot de passe est incorrect !";
        require './views/connexion.php';
        die();
    }

    //Si on est arrivé jusqu'ici alors tout est bon
    $_SESSION['lastname'] = $data[0]['name_user'];
    $_SESSION['email'] = $data[0]['email_user'];
    header('Location: /game_collection/');
}

function create_user($inscription){
    global $db;
    //On retourne sur la page si les mots de passes ne correspondent pas
    if ($inscription['password'] !== $inscription['confirm-password']) {
        $error = "Le mot de passe et celui de confirmation ne se ressemblent pas !";
        require './views/inscription.php';
        die();
    }

    //On vérifie que le mail n'existe pas déjà dans la BDD
    $db = Database::getInstance()::getConnection();
    $query = $db->prepare("SELECT email_user FROM ACCOUNT WHERE email_user = :email");
    $query->execute(['email' => $inscription['email']]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    if (count($data) >= 1) {
        $error = "L'email a déjà été utilisé pour un autre compte !";
        require './views/inscription.php';
        die();
    }

    //Si on arrive ici, c'est qu'on va créer le compte
    $hashed_pass = password_hash($inscription['password'], PASSWORD_BCRYPT);
    $query = $db->prepare("INSERT INTO ACCOUNT (name_user, surname_user, email_user, password_user) VALUES(:name_user, :surname_user, :email_user, :password_user)");
    $res = $query->execute([
        'name_user' => $inscription['lastname'],
        'surname_user' => $inscription['firstname'],
        'email_user' => $inscription['email'],
        'password_user' => $hashed_pass
    ]);
    if ($res) {
        $_SESSION['lastname'] = $inscription['lastname'];
        $_SESSION['email'] = $inscription['email'];
        header('Location: /game_collection/');
    } else {
        $error = "Erreur lors de la création du compte !";
    }
}

function get_user($email){
    global $db;
    $query = $db->prepare("SELECT * FROM ACCOUNT WHERE email_user = :email");
    $query->execute(['email' => $email]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function get_games($email){
    global $db;
    $user = get_user($email);
    $query = $db->prepare("SELECT * FROM GAME JOIN LIBRARY ON LIBRARY.name_game = GAME.name_game WHERE id_user = :id_user");
    $query->execute(['id_user' => $user[0]['id_user']]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function addLibrary($email, $name_game){
    global $db;
    $user = get_user($email);
    $query = $db->prepare("INSERT INTO LIBRARY (id_user, name_game) VALUES(:id_user, :name_game)");
    $res = $query->execute([
        'id_user' => $user[0]['id_user'],
        'name_game' => $name_game
    ]);
    if ($res) {
        header('Location: /game_collection/');
    } else {
        $error = "Erreur lors de l'ajout du jeu !";
    }
}