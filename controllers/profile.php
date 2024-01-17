<?php
require_once './models/user.php';
if (!$isLoggedIn) {
    header('Location: ./connexion');
    exit();
}

$action = isset($_POST["action"]) ? $_POST["action"] : "";
$user_infos = get_user();
if ($action == "modify" && isset($_POST['sendChanges'])) {
    $newName = isset($_POST['newName']) ? $_POST['newName'] : "";
    $newSurname = isset($_POST['newSurname']) ? $_POST['newSurname'] : "";
    $newMail = isset($_POST['newMail']) ? $_POST['newMail'] : "";
    $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
    $confirmPass = isset($_POST['confirmPass']) ? $_POST['confirmPass'] : "";
    edit_user([
        'name' => $newName,
        'surname' => $newSurname,
        'email' => $newMail,
        'password' => $pass,
        'confirmPass' => $confirmPass
    ]);
}
if ($action == "delete" || $action == "logout") {
    if ($action == "delete") {
        delete_user();
    }
    $_SESSION = array();
    header('Location: ./');
}


require './views/profile.php';
