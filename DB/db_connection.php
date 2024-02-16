<?php
function ConnectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "Istore";
// Создаем подключение к MySQL
    $connect = mysqli_connect($servername, $username, $password,$db);

// Проверка соединения
    if ($connect->connect_error) {
        die("Error connect DataBase: " . $connect->connect_error);
    }
    return $connect;
}

