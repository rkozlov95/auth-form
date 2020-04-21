<?php

require_once 'index.php';

$connect = mysqli_connect('db', 'user', 'test', 'myDb');

$errorMessage = '';
$successMessage = '';

$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$about = $_POST['about'];
$image = $_POST['image'];

$params = compact('email', 'password', 'password2', 'about', 'image');

$isValid = true;

if ($email == '' || $password == '' || $password2 == '' || $about == '' || $image == '') {
     $isValid = false;
     $errorMessage = "Please fill all fields!";
     echo $twig->render('register.html.twig', array_merge($params, ['errorMessage' => $errorMessage]));
} elseif ($password !== $password2) {
     $isValid = false;
     $errorMessage = "Confirm password not matching!";
     echo $twig->render('register.html.twig', array_merge($params, ['errorMessage' => $errorMessage]));
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $errorMessage = "Invalid E-mail!";
     echo $twig->render('register.html.twig', array_merge($params, ['errorMessage' => $errorMessage]));
}

$query = "INSERT INTO User (email, password, about, image) VALUES ('$email','$password', '$about', '$image')";

$result = mysqli_query($connect, $query);

if ($result) {
    echo "Информация занесена в базу данных";
} else {
    echo "Информация не занесена в базу данных";
}

mysqli_close($connect);
