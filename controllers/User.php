<?php

namespace controllers;

require_once 'models/UserModel.php';

use models\UserModel;
use Exception;

/**
 * Controller that handles the creation of a new user
 * @author Calin Nicolai
 */
class User
{
    /** @var string $connect Connect */
    private $connect;
    /** @var array $get  Get */
    private array $get;
    /** @var array $post Post */
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

    /**
     * @param string $email User email
     * @param string $password User password
     * @return void
     */
    public function login(string $email, string $password)
    {
        try {
            $query = "SELECT * FROM users WHERE email='$email'";
            $result = $this->connect->query($query);

            if ($result && $result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['userEmail'] = $email;
                    echo "Login successful";
                    header("Location: /");
                } else {
                    throw new Exception("Incorrect email address or password");
                }
            } else {
                throw new Exception("Incorrect email address or password");
            }
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }
    }


    /**
     * @param string $email User email address
     * @param string $password User password
     * @return void
     */
    public function register(string $email, string $password)
    {
        try {
            // Проверка соответствия email регулярному выражению
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format");
            }

            // Проверка уникальности email
            $query = "SELECT * FROM users WHERE email='$email'";
            $result = $this->connect->query($query);
            if ($result->num_rows > 0) {
                throw new Exception("Email already exists");
            }

            // Проверка пароля на длину и наличие цифры
            if (strlen($password) < 6 || strlen($password) > 30 ||!preg_match('/\p{Nd}/u', $password)) {
                throw new Exception("Password must be between 6 and 30 characters long and contain at least one digit");
            }

            // Вставка данных пользователя в базу данных
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->connect->prepare("INSERT INTO users (email, password) VALUES (?,?)");
            $stmt->bind_param("ss", $email, $hashed_password);
            if (!$stmt->execute()) {
                throw new Exception("Error adding user: ". $stmt->error);
            }
            $stmt->close();
            $_SESSION['userEmail'] = $email;
            echo "User added successfully";
            header("Location: /");
        } catch (Exception $e) {
            echo ("Error: ". $e->getMessage(). "\n"); // Логируем ошибку в файл
            echo "An error occurred. Please try again later."; // Сообщение для пользователя
        }
    }


    public function logout()
    {
       session_destroy();
       header("Location: /login");
    }

    public function printLoginHtml()
    {
        include(__DIR__. '/../views/Auth/Login.php');
    }

    public function printRegistrationHtml()
    {
        include(__DIR__. '/../views/Auth/Registration.php');
    }
}