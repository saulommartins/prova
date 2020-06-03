<?php

require __DIR__ . '/vendor/autoload.php';



use Models\Database;
//Initialize Illuminate Database Connection
new Database();

// defino o método http e a url amigável
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'] ?? '/';

$users = new Controllers\UserController();
$users->create([
    "login" => "teste",
    "password" => "12345",
]);

$company = new Controllers\CompanyController();
$company->create([
    "name" => "teste",
    "phone" => "12345",
]);


$router = new Cooper\Router($method, $path);

// registro as rotas
$router->get('/users', function () {
    $users = new Controllers\UserController();
    return $users->find();
});
$router->get('/users/{id}', function ($params) {
    $users = new Controllers\UserController();
    return $users->get($params[1]);
});
$router->post('/users', function ($data) {
    $users = new Controllers\UserController();
    return $users->create($_POST);
});

$router->delete('/users/{id}', function ($params) {
    $users = new Controllers\UserController();
    return $users->delete($params[1]);
});


$router->get('/companies', function () {
    $company = new Controllers\CompanyController();
    return $company->find();
});
$router->get('/companies/{id}', function ($params) {
    $company = new Controllers\CompanyController();
    return $company->get($params[1]);
});
$router->post('/companies', function () {
    $company = new Controllers\CompanyController();
    return $company->create($_POST);
});

$router->delete('/companies/{id}', function ($params) {
    $company = new Controllers\CompanyController();
    return $company->delete($params[1]);
});



// faço o router encontrar a rota que o usuário acessou
$result = $router->handler();

// se retornar false, dou um erro 404 de página não encontrada
if (!$result) {
    http_response_code(404);
    echo 'Página não encontrada!';
    die();
}

// imprimo a página atual
echo $result($router->getParams());