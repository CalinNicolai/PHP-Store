<?php
function ConnectDB(){
    global $DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME;
// Создаем подключение к MySQL
    $connect = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD,$DB_NAME);

// Проверка соединения
    if ($connect->connect_error) {
        die("Error connect DataBase: " . $connect->connect_error);
    }
    $exists = mysqli_select_db($connect, $DB_NAME);
    if (!$exists) {
        createDatabaseAndTable($connect, $DB_NAME);
    }
    return $connect;
}

