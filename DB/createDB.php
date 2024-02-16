<?php
function createDatabaseAndTable() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "Istore";
    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Nope";
    }

    // Создаем базу данных
    $sql = "CREATE DATABASE IF NOT EXISTS {$db}";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully or already exists";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Подключаемся к созданной/существующей базе данных
    $conn->select_db($db);

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
?>
