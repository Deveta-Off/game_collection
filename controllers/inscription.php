<?php
require_once './models/user.php';
$error = "";

if (isset($_POST['lastname'])) {
    create_user(array(
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'confirm-password' => $_POST['confirm-password']
    ));
}


require './views/inscription.php';
