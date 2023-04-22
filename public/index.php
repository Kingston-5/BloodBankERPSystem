<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\ProfileController;
use app\controllers\AppointmentController;
use app\controllers\AdminController;
use app\controllers\OrderController;
use thecodeholic\phpmvc\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function(){
    // echo "Before request from second installation";
});

// URL structure : /controller/method/{params}

// Site controller
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [SiteController::class, 'about']);

// AuthController
$app->router->get('/auth/register', [AuthController::class, 'register']);
$app->router->post('/auth/register', [AuthController::class, 'register']);
$app->router->get('/auth/login', [AuthController::class, 'login']);
$app->router->post('/auth/login', [AuthController::class, 'login']);
$app->router->get('/auth/logout', [AuthController::class, 'logout']);

// ProfileController
$app->router->get('/profile/{user_id}', [ProfileController::class, 'profile']);
$app->router->get('/profile/edit/{id}', [ProfileController::class, 'edit']);
$app->router->post('/profile/edit/{id}', [ProfileController::class, 'edit']);

// AppointmentController
$app->router->get('/appointments/create', [AppointmentController::class, 'create']);
$app->router->post('/appointments/create', [AppointmentController::class, 'create']);
$app->router->get('/appointments/view/{center_id}', [AppointmentController::class, 'view']);
$app->router->get('/appointments/cancel/{id}', [AppointmentController::class, 'cancel']);
$app->router->post('/appointments/fill/{appointment_id}/{user_id}/{center_id}', [AppointmentController::class, 'fill']);

// AdminController
$app->router->post('/admin/editclerk/{user_id}/', [AdminController::class, 'editClerk']);
$app->router->get('/admin/makecenter', [AdminController::class, 'makeCenter']);
$app->router->post('/admin/makecenter', [AdminController::class, 'makeCenter']);
$app->router->get('/admin/viewaccounts', [AdminController::class, 'viewAccounts']);
$app->router->get('/admin/appointments/view', [AdminController::class, 'viewAppointments']);
$app->router->get('/admin/vieworders', [AdminController::class, 'viewOrders']);

$app->router->get('/admin/vieworders/fill/{order_id}/', [AdminController::class, 'fillOrder']);
$app->router->get('/admin/vieworders/cancel/{order_id}/', [AdminController::class, 'cancelOrder']);

$app->router->get('/admin/viewcenters', [AdminController::class, 'viewCenters']);
$app->router->get('/admin/viewstock', [AdminController::class, 'viewStock']);
$app->router->post('/admin/viewstock', [AdminController::class, 'viewStock']);

//OrderController
$app->router->get('/orders/view/{center_id}', [OrderController::class, 'view']);
$app->router->get('/orders/create', [OrderController::class, 'create']);
$app->router->post('/orders/create/{user_id}/{center_id}', [OrderController::class, 'create']);
$app->router->post('/appointments/create', [AppointmentController::class, 'create']);
$app->router->get('/appointments/cancel/{id}', [AppointmentController::class, 'cancel']);
$app->router->post('/appointments/fill/{user_id}/{center_id}', [AppointmentController::class, 'fill']);

$app->run();
