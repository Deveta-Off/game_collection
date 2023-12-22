<?php 

global $db;
$db = Database::getInstance()::getConnection();

function addGame($game_infos) {
    var_dump($game_infos);
}

function getGames($search) {
    global $db;

    $filterQuery = "";

    if(empty($search) && $search != "") {
        $filterQuery = " WHERE name_game LIKE '".$search."%'";
    }
    $query = $db->query("SELECT * FROM GAME".$filterQuery.";");
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}