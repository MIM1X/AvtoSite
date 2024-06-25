<?php
session_start();
require_once '../Auth/vendor/db.php';

// Проверка на авторизацию пользователя
if (!isset($_SESSION['user'])) {
    header('Location: ../Auth/Auth1.php'); // Перенаправление на страницу входа
    exit;
}

$idOrder = $_GET['id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <title>Ваши товары в заказе</title>
</head>

<body>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Общая стоимость</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM order_items WHERE OrderID = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param('i', $idOrder); // Привязка параметра
            $stmt->execute();
            $result = $stmt->get_result();
            
            
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $productID = $row['ProductID'];
                    $Quantity = $row['Quantity'];
                    $Price = $row['TotalPrice'];
                    echo '
                        <tr>
                            <th scope="row">' . $productID . '</th>
                            <td>' . $Quantity . '</td>
                            <td>' . $Price . '</td>
                    ';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>