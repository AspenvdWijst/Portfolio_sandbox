<?php
$uri= $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/about':
        require __DIR__ . '/Views/about.view.php';
        break;

    case '/projects':
        require __DIR__ . '/Views/projects.view.php';
        break;

    case '/downloads':
        require __DIR__ . '/Views/downloads.view.php';
        break;

    case '/contact':
        require __DIR__ . '/Views/contact.view.php';
        break;

    default:
        require __DIR__ . '/Views/index.view.php';
        break;
}
