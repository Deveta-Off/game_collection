<?php
require_once './models/user.php';
if (isset($_POST['email'])) {
    connexion(array(
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ));
}
require './views/connexion.php';
