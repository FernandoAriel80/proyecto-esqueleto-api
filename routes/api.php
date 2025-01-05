<?php

use App\Core\Router;
use App\Controllers\UserController;
use App\Controllers\ProductController;


$userController = new UserController();
$productController = new ProductController();

Router::get('/',[$userController, 'index']);
Router::get('/productos',[$productController, 'index']);
Router::post('/carga-usuario',[$userController,'store']);
//Router::dispatch();
/*$router->addRoute('POST', '/users', function () use ($userController) {
    $data = json_decode(file_get_contents('php://input'), true);
    $userController->store($data);
});*/

/*$router->addRoute('DELETE', '/users/{id}', function () use ($userController) {
    $id = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $userController->delete($id);
});*/

