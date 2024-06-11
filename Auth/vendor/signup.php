<?php

session_start();
require_once 'db.php';

$email = $_POST['email'];
$pass = $_POST['pass'];
$reppass = $_POST['reppass'];

if (empty($email) || empty($pass) || empty($reppass)) {
    $_SESSION['message'] = 'Заполните пустые поля';
    header('Location: ../Register.php');
} else {
    if ($pass === $reppass) {
        $pass= md5($pass);

        mysqli_query($connect, "INSERT INTO `customers` (`EmailAddress`, `Password`) VALUES ('$email', '$pass')");
        
        $_SESSION['message'] = 'Регестрация прошла успешно!';
        header('Location: ../Auth1.php');

    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../Register.php');
    }
}