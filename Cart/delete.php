<?php
session_start();
require_once '../Auth/vendor/db.php';

$sql = "delete from `customers_cart` where CustomerID = ".$_SESSION['user']['id']." and ProductID = ".$_GET['id']."";
    $res = mysqli_query($connect, $sql);
    if (!$res)
        die(mysqli_error($connect));
header('location: cart.php');