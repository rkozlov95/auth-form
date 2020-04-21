<?php

require_once 'index.php';

$connect = mysqli_connect('db', 'user', 'test', 'myDb');

$errorMessage = '';

$email = trim($_POST['email']);

$password = trim($_POST['password']);

$query = "SELECT * From User WHERE email='$email' AND password='$password' LIMIT 1";
$result = mysqli_query($connect, $query);

$params = $result->fetch_array(MYSQLI_ASSOC);

if (empty($email) || empty($password)) {
    $errorMessage = "Please fill all fields!";
    $params = compact('errorMessage', 'email', 'password');
    echo $twig->render('login.html.twig', $params);
} elseif ($params['email'] != $email || $params['password'] != $password) {
    $errorMessage = "Invalid email or password entered!";
    $params = compact('errorMessage', 'email', 'password');
    echo $twig->render('login.html.twig', $params);
} else {
    echo $twig->render('info.html.twig', $params);
}
