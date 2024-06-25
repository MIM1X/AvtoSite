<?php
session_start();
require_once '../Auth/vendor/db.php';

$idUser = $_SESSION['user']['id'];

$today = date("Y-m-d H:i:s");

$sql = "INSERT INTO `orders`(`Customer`, `OrderDate`) VALUES ($idUser, '$today')";
$res = mysqli_query($connect, $sql);

sleep(1);

$sql = "SELECT OrderID from `orders` where OrderDate = '$today' and Customer = $idUser";
$res = mysqli_query($connect, $sql);
$orderID = mysqli_fetch_assoc($res);

// Запрос на выборку товаров из корзины покупателя
$sql = "SELECT * FROM customers_cart WHERE CustomerID = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param('i', $idUser); // Привязка параметра
$stmt->execute();
$result = $stmt->get_result();


// Цикл для вставки товаров в таблицу order_items
if ($result->num_rows > 0) {
 foreach ($result as $row) {
 $productID = $row['ProductID'];
 $Quantity = $row['Quantity'];

 // Вставка товара в таблицу order_items
 $sql = "INSERT INTO order_items (orderID, ProductID, Quantity) VALUES (?, ?, ?)";
 $stmt = $connect->prepare($sql);
 $stmt->bind_param('iii', $orderID['OrderID'], $productID, $Quantity); // Привязка параметров
 $stmt->execute();
 }
}

header('Location: ../Orders/orders.php');