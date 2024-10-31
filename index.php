<?php
require 'vendor/autoload.php';

require_once 'config.php';
session_start();

$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'login':
        require_once 'app/controllers/AuthController.php';
        (new AuthController())->login();
        break;
    case 'dashboard':
        require_once 'app/controllers/DashboardController.php';
        (new DashboardController())->index();
        break;
    default:
        echo "Welcome to the Legislation Process Management System!";
}

