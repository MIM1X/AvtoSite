    <script>
        var password = prompt('Введите пароль');
        if(password != "123"){
            window.stop();
            window.location.href = '../index.php';
        }
    </script>

<?php
session_start();
require_once '../Auth/vendor/db.php';
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
                <th scope="col">Общее кол-во</th>
                <th scope="col">Поставщик</th>
                <th scope="col">Номер запчасти</th>
                <th scope="col"><button class="btn btn-dark my-4" onclick="window.location.href = 'sendTovar.php'"
                        class="btn btn-warning my-2">Добавить новую запись в таблицу Товары</button></th>
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
                    $stock = $row['Stock'];
                    $supplier = supplierName($connect, $row['Supplier']);
                    $part_num = $row['Part_Num'];
                    echo '
                        <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $descrip . '</td>
                            <td>' . $charact . '</td>
                            <td>' . $price . '</td>
                            <td>' . $stock . '</td>
                            <td>' . $supplier . '</td>
                            <td>' . $part_num . '</td>
                            <td>
                                <button onclick="window.location.href = update.php' . $id . '" class="btn btn-warning my-2">Обновить данные</button>
                                <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Удалить товар
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="delete.php?id=' . $id . '">Удалить</a></li>
                                </ul>
                                </div>
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