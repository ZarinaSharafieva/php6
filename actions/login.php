<?php

if($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST)) {

    header('Location: ../index.php');

    die();

}

require_once '../database/Database.php';

$connection = new \database\Database('localhost', 'users', 'root', '');

$connection = $connection->getConnection();

if(gettype($connection) === 'string') die($connection);

session_start();

$sql = "SELECT * FROM `users` where `email` = '{$_POST['email']}' AND `password` = '{$_POST['password']}'";

$user = $connection->query($sql);


if(!$user->fetch()) {

    header('Location: ../index.php');

    $_SESSION['attempt'] = 'Неверный логин или пароль';

    die();

}

// ' OR '1=1

$user = $user->fetch(PDO::FETCH_COLUMN);

$_SESSION['user'] = $user;

header('Location: ../index.php');