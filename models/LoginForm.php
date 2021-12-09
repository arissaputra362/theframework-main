<?php

namespace app\models;

use ti2018b\phpmvc\Application;
use ti2018b\phpmvc\Model;

/**
 * Class LoginForm
 * 
 * @author Aris Saputra <arissaputra362@gmail.com>
 * @package app\models
 */
class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    public function rules(): array
    {
        return [
            'email'     => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'  => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your Email',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email address');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorect');
            return false;
        }

        return Application::$app->login($user);
    }
}
