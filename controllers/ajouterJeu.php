<?php
require_once './models/game.php';
require_once './models/user.php';

$search = isset($_POST["search"]) ? $_POST["search"] : "";
$games = getGames($search);
if (isset($_POST["submit"])) {
    if ($_POST["submit"]  == "Ajouter à la bibliothèque") {
        if ($isLoggedIn) {
            header('Location: ./connexion');
            exit();
        }
        if (isset($_POST["name_game"]))
            addLibrary($_POST["name_game"]);
    } else {
        if (isset($_POST["game_name"]) && isset($_POST["game_editor"]) && isset($_POST["game_release_date"]) && isset($_POST["game_description"]) && isset($_POST["game_image"]) && isset($_POST["url_site_game"]) && isset($_POST["platforms"])) {
            $game_infos = array(
                "name_game" => $_POST["game_name"],
                "editor_game" => $_POST["game_editor"],
                "release_date_game" => $_POST["game_release_date"],
                "description_game" => $_POST["game_description"],
                "url_image_game" => $_POST["game_image"],
                "url_site_game" => $_POST["url_site_game"],
                "platforms" => $_POST["platforms"]
            );
            addGame($game_infos);
            addLibrary($_POST["game_name"]);
        }
    }
}
require './views/ajouterJeu.php';
