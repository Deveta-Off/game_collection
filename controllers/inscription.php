<?php
require_once './assets/sql/database.php';

$error = "";

if (isset($_POST['lastname'])) {
    //Récupération des infos d'inscription
    $inscription =
        array(
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirm-password' => $_POST['confirm-password'],
        );

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
        header('Location: /game_collection/');
    } else {
        $error = "Erreur lors de la création du compte !";
    }
}


require './views/inscription.php';
