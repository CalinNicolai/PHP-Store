<?php
require 'config.php';

function createDatabaseAndTable() {
    global $DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME;

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Создаем базу данных
    $sql = "CREATE DATABASE IF NOT EXISTS {$DB_NAME}";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully or already exists";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Подключаемся к созданной/существующей базе данных
    $conn->select_db($DB_NAME);

    // Создаем таблицу для продуктов
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        category VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        description TEXT NOT NULL,
        image VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully or already exists";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}

// Вызываем функцию для создания базы данных и таблицы
createDatabaseAndTable();

