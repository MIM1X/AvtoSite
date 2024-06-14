<?php
session_start();
require_once '../Auth/vendor/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Админка запчастьCAR</title>
</head>

<body>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Характеристика</th>
                <th scope="col">Цена</th>
                <th scope="col">Поставщик</th>
                <th scope="col">Номер запчасти</th>
                <th scope="col"><button class="btn btn-dark my-4" onclick="window.location.href = 'sendTovar.php'" class="btn btn-warning my-2">Добавить новую запись в таблицу Товары</button></th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * from `products`";
            $res = mysqli_query($connect, $sql);
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['ProductID'];
                    $name = $row['Name'];
                    $descrip = $row['Description'];
                    $charact = $row['Characteristics'];
                    $price = $row['Price'];
                    $supplier = $row['Supplier'];
                    $part_num = $row['Part_Num'];
                    echo '
                        <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $descrip . '</td>
                            <td>' . $charact . '</td>
                            <td>' . $price . '</td>
                            <td>' . $supplier . '</td>
                            <td>' . $part_num . '</td>
                            <td>
                                <button onclick="window.location.href = update.php'.$id.'" class="btn btn-warning my-2">Обновить данные</button>
                                <button class="btn btn-danger" my-1"><a class="text-light" href="delete.php?id='.$id.'">Удалить товар</a></button>
                            </td>
                        </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>