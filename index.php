<?php

session_start();

$page = $_GET['page'] ?? 'index';
include(__DIR__ . '/DB/db_connection.php');
$conn = ConnectDB();

foreach (glob(__DIR__ . "/controllers/*.php") as $filename) {
    include $filename;
}

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        switch ($page) {
            case 'index':
                $product = new \controllers\Product($conn, $_GET, $_POST);
                $product->printHtml();
                break;
            case 'admin/panel':
                $product = new \controllers\Product($conn, $_GET, $_POST);
                $admin = new \controllers\Admin($conn, $_GET, $_POST);
                $admin->products($product);
                break;
            case 'login':
                $user = new \controllers\User($conn, $_GET, $_POST);
                $user->printLoginHtml();
                break;
            case 'registration':
                $user = new \controllers\User($conn, $_GET, $_POST);
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
                $product = new \controllers\Product($conn, $_GET, $_POST);
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
            case 'login':
                $action = $_POST['action'] ?? '';
                $user = new \controllers\User($conn, $_GET, $_POST);
                $email = $_POST['email'];
                $password = $_POST['password'];
                echo "logging in";
                $user->login($email, $password);
                break;
            case 'register':
                $action = $_POST['action'] ?? '';
                $user = new \controllers\User($conn, $_GET, $_POST);
                $email = $_POST['email'];
                $password = $_POST['password'];
                echo "registering";
                $user->register($email, $password);
                break;
            case 'logout':
                $action = $_POST['action']?? '';
                $user = new \controllers\User($conn, $_GET, $_POST);
                echo "logging out";
                $user->login();
                break;
            default:

        }

        break;
}
