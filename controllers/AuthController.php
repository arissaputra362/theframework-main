<?php

namespace app\controllers;

use ti2018b\phpmvc\Request;
use app\models\User;
use ti2018b\phpmvc\Response;
use ti2018b\phpmvc\Controller;
use ti2018b\phpmvc\Application;
use app\models\LoginForm;
use ti2018b\phpmvc\middlewares\AuthMiddleware;

/**
 * Class AuthController
 * 
 * @author Aris Saputra <arissaputra362@gmail.com>
 * @package app\controllers
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');

        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $errors = [];
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for register');
                Application::$app->response->redirect('/');
                exit;
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
