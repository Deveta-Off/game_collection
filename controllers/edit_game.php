<?php
require_once './models/user.php';
if (isset($_GET['game'])) {
    $game = getUserGame($_GET['game']);
}

if (isset($_POST["submit"])) {
    if ($_POST["submit"]  == "Ajouter") {
        if (isset($_POST["hours_played"]) && isset($_POST["name_game"])) {
            addHoursPlayedUserGame($_POST["name_game"], $_POST["hours_played"]);
        }
    }
    if ($_POST["submit"]  == "Supprimer le jeu de ma bibliothèque") {
        if (isset($_POST["name_game"])) {
            deleteUserGame($_POST["name_game"]);
        }
    }
}
require './views/edit_game.php';
