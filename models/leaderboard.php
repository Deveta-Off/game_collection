<?php
require_once './assets/sql/database.php';

global $db;
$db = Database::getInstance()::getConnection();

function getLeaderboard() {
    global $db;
    $query = "SELECT name_user,surname_user,hours_played_game,name_game FROM LIBRARY INNER JOIN ACCOUNT ON ACCOUNT.Id_user = LIBRARY.Id_user ORDER BY hours_played_game DESC LIMIT 20";
    $result = $db->query($query);
    $leaderboard = $result->fetchAll(PDO::FETCH_ASSOC);
    return $leaderboard;
}