<?php


$page = $_GET['page'] ?? 'index';
include(__DIR__ . '/DB/db_connection.php');
$conn = ConnectDB();

foreach (glob(__DIR__ . "/pages/*.php") as $filename) {
    include $filename;
}

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        switch ($page) {
            case 'index':
                $product = new \pages\Product($conn, $_GET, $_POST);
                $product->printHtml();
                break;
            case 'admin/panel':
                $product = new \pages\Product($conn, $_GET, $_POST);
                $admin = new \pages\Admin($conn, $_GET, $_POST);
                $admin->products($product);
                break;
            default:
                include '404/404.php';
        };
        break;
    case 'POST':
        switch ($page) {
            case 'admin/panel':
                $action = $_POST['action'] ?? '';
                $product = new \pages\Product($conn, $_GET, $_POST);
                if ($action === 'add_product') {
                    $product->addProduct($_POST);
                } elseif ($action === 'update_product') {
                    // Логика обновления продукта
                    $product->updateProduct($_POST);
                }
                break;
        }

        break;
}
