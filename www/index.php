<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$request = $_SERVER['REQUEST_URI'];

// routing
switch ($request) {
    case '/':
        echo $twig->render('index.html.twig');
        break;
    case '/register':
        echo $twig->render('register.html.twig');
        break;
    case '/login':
        echo $twig->render('login.html.twig');
        break;
    default:
        echo $twig->render('index.html.twig');
        break;
}
