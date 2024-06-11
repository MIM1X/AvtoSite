<?php

session_start();
require_once 'db.php';

$email = $_POST['email'];
$pass = md5($_POST['pass']);

$check_user = mysqli_query($connect, "SELECT * FROM `customers` where `EmailAddress` = '$email' and `Password` = '$pass'");
if(mysqli_num_rows($check_user) > 0){
$user = mysqli_fetch_assoc($check_user);

$_SESSION['user'] = [
    "id" => $user ['CustomerID'],
    "email" => $user ['EmailAddress'],
];

header('Location: ../../index.php');

}else{
    $_SESSION['message'] = 'Не верная почта или пароль';
    header('Location: ../Auth1.php');
};