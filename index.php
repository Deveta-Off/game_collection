<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'homepage';
$pageFile = 'controllers/' . $page . '.php';
$isLoggedIn = isset($_SESSION['id']);

if (file_exists($pageFile)) {
    require $pageFile;
} else {
    require 'views/404.php';
}
