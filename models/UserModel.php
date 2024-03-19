<?php

namespace models;

class UserModel
{
    /** @var string $password User password */
    public string $password;
    /** @var string $email User email */
    public string $email;

    /**
     * @param string $email Email address
     * @param string $password Password
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

//    /**
//     * @return string
//     */
//    public function __toString()
//    {
//        return "User Object";
//    }
}