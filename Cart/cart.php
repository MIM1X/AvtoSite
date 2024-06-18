<?php
session_start();
require_once '../Auth/vendor/db.php';
if (empty($_SESSION['user'])) {
    header('Location: ../Auth/Auth1.php');
}
$idUser = $_SESSION['user']['id'];

if (!empty($_GET['id']) && !empty($_GET['name']) && !empty($_POST['count'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $count = $_POST['count'];

    $sql = "insert into `customers_cart` values('$idUser','$id','$count')";
    $res = mysqli_query($connect, $sql);
    if (!$res)
        die(mysqli_error($connect));
}
if (isset($_POST['count'])) {
    echo '<meta http-equiv="refresh" content="1; URL=cart.php">';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Корзина</title>
</head>

<body>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Кол-во</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * from `customers_cart` where CustomerID = $idUser";
            $res = mysqli_query($connect, $sql);
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $idProd = $row['ProductID'];
                    $quant = $row['Quantity'];
                    echo '
                        <tr>
                            <td scope="row">' . mysqli_fetch_assoc(products($connect, $idProd))['Name'] . '</td>
                            <td>
                                <input name="count" placeholder="Кол-во" type="number" min="1" max="999" required value="' . $quant . '"></input>
                            </td>
                            <td>
                                <button onclick= window.location.href="delete.php?id=' . $idProd . '" type="button" class="btn btn-danger" aria-expanded="false">Убрать из корзины</button>
                            </td>
                        </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button onclick="window.location.href = 'buy.php';" class="btn btn-success btn-lg">Заказать</button>
        </div>

</body>

</html>