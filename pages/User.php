<?php

namespace pages;

class User
{
    private $connect;
    private array $get;
    private array $post;
    public function __construct($connect, array $get, array $post)
    {
        $this->connect = $connect;
        $this->get = $get;
        $this->post = $post;

        if (isset($this->get['action'])) {
            switch ($this->get['action']) {
                case 'login':
                    $this->login();
                    break;
                case 'register':
                    $this->register();
                    break;
                case 'logout':
                    $this->logout();
                    break;
            }
        }
    }

    private function login()
    {
        // Проверка логина и пароля и установка сессии для авторизации
    }

    private function register()
    {
        // Регистрация нового пользователя
    }

    private function logout()
    {
        // Завершение сессии и выход из учетной записи
    }
    public function printLoginHtml(){
        include(__DIR__ . '/../views/Auth/Login.php');
    }
    public function printRegistrationHtml(){
        include(__DIR__ . '/../views/Auth/Registration.php');
    }
}