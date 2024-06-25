<?php
session_start();
require_once '../Auth/vendor/db.php';

// Проверка на авторизацию пользователя
if (!isset($_SESSION['user'])) {
    header('Location: ../Auth/Auth1.php'); // Перенаправление на страницу входа
    exit;
}

$idUser = $_SESSION['user']['id'];


// Получение информации о пользователе
$query_user = "SELECT EmailAddress FROM `Customers` WHERE CustomerID = $idUser";
$result_user = mysqli_query($connect, $query_user);
$user = mysqli_fetch_assoc($result_user);


// Получение списка всех заказов пользователя
$query_orders = "SELECT * FROM `orders` WHERE Customer = $idUser ORDER BY OrderDate DESC";
$result_orders = mysqli_query($connect, $query_orders);

$orders = [];
if ($result_orders && mysqli_num_rows($result_orders) > 0) {
    while ($row = mysqli_fetch_assoc($result_orders)) {
        $orders[] = $row;
    }
}

// Получение информации о конкретном заказе, если указан
$order_id = isset($_GET['OrderID']) ? (int) $_GET['OrderID'] : 0;
$order = null;
$order_items = [];

if ($order_id > 0) {
    $query_order = "SELECT orders.OrderID as OrderID, orders.Cost, orders.OrderDate, customers.EmailAddress
                    FROM `orders`
                    JOIN `customers` ON orders.Customer = customers.CustomerID
                    WHERE orders.OrderID = $order_id AND orders.Customer = $idUser";
    $result_order = mysqli_query($connect, $query_order);
    $order = mysqli_fetch_assoc($result_order);

    // Получение товаров в заказе
    $query_items = "SELECT products.Name, order_items.Quantity
                    FROM `order_items`
                    JOIN `products` ON order_items.ProductID = products.ProductID
                    WHERE order_items.OrderID = $order_id";
    $result_items = mysqli_query($connect, $query_items);

    if ($result_items && mysqli_num_rows($result_items) > 0) {
        while ($row = mysqli_fetch_assoc($result_items)) {
            $order_items[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заказы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</head>
<body>
    <?php if ($order): ?>
        <h2>Детали заказа №<?= htmlspecialchars($order['order_id']) ?></h2>
        <p><strong>Фамилия:</strong> <?= htmlspecialchars($order['Surname']) ?></p>
        <p><strong>Имя:</strong> <?= htmlspecialchars($order['Name']) ?></p>
        <p><strong>Отчество:</strong> <?= htmlspecialchars($order['Middle_name']) ?></p>
        <p><strong>Дата заказа:</strong> <?= htmlspecialchars($order['order_date']) ?></p>
        <p><strong>Общая сумма:</strong> <?= htmlspecialchars($order['total_price']) ?> ₽</p>

        <h3>Товары в заказе</h3>
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена за единицу</th>
                <th>Общая стоимость</th>
            </tr>
            <?php foreach ($order_items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['Name']) ?></td>
                    <td><?= htmlspecialchars($item['Quantity']) ?></td>
                    <td><?= htmlspecialchars($item['Price']) ?> ₽</td>
                    <td><?= htmlspecialchars($item['Quantity'] * $item['Price']) ?> ₽</td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="orders.php">Вернуться к списку заказов</a>
    <?php else: ?>
        <?php if (count($orders) > 0): ?>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>Номер заказа</th>
                    <th>Дата заказа</th>
                    <th>Общая сумма</th>
                    <th>Действия</th>
                </tr>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['OrderID']) ?></td>
                        <td><?= htmlspecialchars($order['OrderDate']) ?></td>
                        <td><?= htmlspecialchars($order['Cost']) ?> RUB</td>
                        <td width="8%">
                            <?php 
                            echo '
                            <button onclick= window.location.href="check.php?id=' . $order['OrderID'] . '" type="button" class="btn btn-secondary">Просмотр</button>
                            '
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Тут пока пусто, но вы можете это исправить</p>
        <?php endif; ?>
    <?php endif; ?>
    <div class="d-grid gap-2 col-6 mx-auto">
    <button class="btn btn-dark my-3 btn-lg pd-3" onclick="window.location.href = '../index.php'">Вернуться</button>
    </div>
</body>

</html>