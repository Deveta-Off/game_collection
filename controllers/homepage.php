<?php
require './models/user.php';
require './models/game.php';
$userName = $isLoggedIn ? get_user()['surname_user'] : "";
$games = $isLoggedIn ? getUserGames() : getGames("");
require './views/homepage.php';
