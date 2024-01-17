<?php
require_once './assets/sql/database.php';
global $db;
$db = Database::getInstance()::getConnection();

function addGame($game_infos)
{
    global $db;

    $query = $db->prepare("INSERT INTO GAME (name_game, editor_game, release_date_game, description_game, url_image_game, url_site_game) VALUES(:name_game, :editor_game, :release_date_game, :description_game, :url_image_game, :url_site_game)");
    $res = $query->execute([
        'name_game' => $game_infos['name_game'],
        'editor_game' => $game_infos['editor_game'],
        'release_date_game' => $game_infos['release_date_game'],
        'description_game' => $game_infos['description_game'],
        'url_image_game' => $game_infos['url_image_game'],
        'url_site_game' => $game_infos['url_site_game']
    ]);
    if ($res) {
        foreach ($game_infos['platforms'] as $platform) {
            $query = $db->prepare("INSERT INTO DISPONIBILITY (name_game, name_platform) VALUES(:name_game, :name_platform)");
            $res = $query->execute([
                'name_game' => $game_infos['name_game'],
                'name_platform' => $platform
            ]);
        }
        header('Location: ./');
    } else {
        $error = "Erreur lors de l'ajout du jeu !";
    }
}

function getGames($search)
{
    global $db;

    $filterQuery = "";

    if (!empty($search) && $search != "") {
        $filterQuery = " WHERE name_game LIKE '" . $search . "%'";
    }
    $query = $db->query("SELECT * FROM GAME" . $filterQuery . ";");
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getPlatforms($name_game)
{
    global $db;

    $query = $db->prepare("SELECT name_platform FROM DISPONIBILITY WHERE name_game = :name_game;");
    $query->bindParam(':name_game', $name_game);
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getAllPlatforms()
{
    global $db;

    $query = $db->query("SELECT name_platform FROM PLATFORM;");
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function getGame($name_game)
{
    global $db;

    $query = $db->prepare("SELECT * FROM GAME WHERE name_game = :name_game;");
    $query->bindParam(':name_game', $name_game);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
    return $data;
}