<?php

require_once './assets/sql/database.php';
require_once './models/leaderboard.php';
$leaderboard = getLeaderboard();
require_once './views/leaderboard.php';