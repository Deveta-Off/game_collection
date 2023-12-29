<?php
require_once './assets/sql/database.php';

global $db;
$db = Database::getInstance()::getConnection();

function connexion($connexion)
{
    //On récupère le compte correspondant (ou pas)
    global $db;
    $query = $db->prepare("SELECT * FROM ACCOUNT WHERE email_user = :email");
    $query->execute(['email' => $connexion['email']]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    //On affiche une erreur si le compte existe pas
    if (count($data) < 1) {
        $error = "Le compte que vous cherchez n'existe pas";
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
    $_SESSION['id'] = $data['id_user'];
    header('Location: /game_collection/');
}

function create_user($inscription)
{
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
        $lastInsertedId = $db->lastInsertId(); //Récupère l'id de l'utilisateur inséré
        $_SESSION['id'] = $lastInsertedId; //On l'utilisera pour récupérer les infos
        header('Location: ./');
    } else {
        $error = "Erreur lors de la création du compte !";
    }
}

function get_user()
{
    global $db;
    $query = $db->prepare("SELECT * FROM ACCOUNT WHERE id_user = :id");
    $query->execute(['id' => $_SESSION['id']]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function getUserGames()
{
    global $db;
    $query = $db->prepare("SELECT * FROM GAME JOIN LIBRARY ON LIBRARY.name_game = GAME.name_game WHERE id_user = :id_user");
    $query->execute(['id_user' => $_SESSION['id']]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function addLibrary($name_game)
{
    global $db;
    $query = $db->prepare("INSERT INTO LIBRARY (id_user, name_game) VALUES(:id_user, :name_game)");
    $res = $query->execute([
        'id_user' => $_SESSION['id'],
        'name_game' => $name_game
    ]);
    if ($res) {
        header('Location: /game_collection/');
    } else {
        $error = "Erreur lors de l'ajout du jeu !";
    }
}
