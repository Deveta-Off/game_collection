<?php 
    require_once './assets/sql/database.php';
    require_once './models/game.php';

    $search = isset($_POST["search"]) ? $_POST["search"] : "";
    $games = getGames($search);
    require './views/ajouterJeu.php';