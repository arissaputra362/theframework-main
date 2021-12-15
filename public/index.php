<?php

use Dotenv\Dotenv;
use app\controllers\TestController;
use app\models\User;
use ti2018b\phpmvc\Application;
use app\controllers\AuthController;
use app\controllers\SiteController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);
$app->on(Application::EVENT_BEFORE_REQUEST, function () {
});

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/coba', [AuthController::class, 'test']);

// '/test' => route baru 
// TestController => nama class controller
// 'index' => function yang dieksekusi di dalam class controller
$app->router->get('/test', [TestController::class, 'index']);

$app->run();
