<?php
$page = $_GET['page'] ?? 'index';

switch ($page) {
    case 'index':
        include 'mainPage/index.php';
        break;
    case 'admin_panel':
            include 'adminPage/admin_panel.php';
        break;
    default:
        include '404/404.php';
}
