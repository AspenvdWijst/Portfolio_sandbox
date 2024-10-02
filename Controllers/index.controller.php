<?php

class Router{

    private $routes = [];

    public function addRoute($method, $path, $controller, $action){
        $this->routes[$method][$path] = [
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public function handleRequest(){
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        if (isset($this->routes[$method][$path])) {
            $route = $this->routes[$method][$path];
            $controller = new $route['controller'];
            $controller->{$route['action']}();
        }   else {
            echo '404';
        }
    }
}


class HomeController{
    public function index(){
        include '../Views/index.view.php';
        echo 'test';
    }
}

class AboutController{
    public function index(){
        include '../Views/about.view.php';
    }
}

class ProjectsController{
    public function index(){
        include '../Views/projects.view.php';
    }
}

class DownloadsController{
    public function index(){
        include './Views/downloads.view.php';
    }
}

class ContactController{
    public function index(){
        include './Views/contact.view.php';
    }
}


$router = new Router();

$router->addRoute('GET', '/', 'HomeController', 'index');
$router->addRoute('GET', '/about', 'AboutController', 'index');
$router->addRoute('GET', '/projects', 'ProjectsController', 'index');
$router->addRoute('GET', '/downloads', 'DownloadsController', 'index');
$router->addRoute('GET', '/contact', 'ContactController', 'index');

$router->handleRequest();