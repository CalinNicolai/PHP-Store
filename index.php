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
            case 'login':
                $user = new \pages\User($conn,$_GET,$_POST);
                $user->printLoginHtml();
                break;
            case 'registration':
                $user = new \pages\User($conn,$_GET,$_POST);
                $user->printRegistrationHtml();
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
                    echo "adding";
                    $product->addProduct($_POST);
                    header("Location: /");
                    exit; // Важно завершить выполнение скрипта после редиректа
                } elseif ($action === 'update_product') {
                    echo "editing";
                    $product->updateProduct($_POST);
                    header("Location: /");
                    exit;
                } elseif ($action === 'delete_product') {
                    // Логика удаления продукта
                    $productId = $_POST['ID'] ?? null;
                    if ($productId) {
                        $product->deleteProduct($productId);
                        echo "Product deleted   ";
                    } else {
                        echo "Product ID not provided";
                    }
                    header("Location: /");
                    exit;
                }
                break;
        }

        break;
}
