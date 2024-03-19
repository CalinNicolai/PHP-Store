<?php
include(__DIR__ . '/createDB.php');

function ConnectDB() {
    // Создаем подключение к MySQL
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Проверка соединения
    if ($connect->connect_error) {
        die("Error connect DataBase: " . $connect->connect_error);
    }

    // Проверяем наличие таблицы users
    $result = $connect->query("SHOW TABLES LIKE 'users'");
    if ($result->num_rows == 0) {
        // Таблицы users нет, вызываем функцию создания базы данных и таблиц
        createDatabaseAndTable();
    }

    return $connect;
}
