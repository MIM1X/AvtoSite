<?php
require_once '../Auth/vendor/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from `products` where ProductID =$id";
    $res = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($res);
    $name = $row['Name'];
    $descrip = $row['Description'];
    $charact = $row['Characteristics'];
    $price = $row['Price'];
    $supplier = $row['Supplier'];
    $part_num = $row['Part_Num'];


    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $descrip = $_POST['descr'];
        $charact = $_POST['charac'];
        $price = $_POST['price'];
        $supplier = $_POST['suppl'];
        $part_num = $_POST['partnum'];

        $sql = "update `products` set Name = '$name', Description = '$descrip', Characteristics = '$charact', Price = '$price', Supplier = '$supplier', Part_Num = '$part_num' where ProductID = $id";
        $res = mysqli_query($connect, $sql);
        if ($res) {
            header('location:adm.php');
        } else {
            die(mysqli_error($connect));
        }
    }
    ;
}
;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Обновление данных</title>
</head>

<body>
    <form style="padding: 50px 50px 50px 50px" method="post">
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input name="name" type="text" class="form-control" placeholder="" value=<?php echo $name ?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea id="area1" name="descr" class="form-control"
                aria-label="With textarea"><?php echo $descrip ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Характеристика</label>
            <textarea name="charac" class="form-control" aria-label="With textarea"><?php echo $charact ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Цена</label>
            <input name="price" type="text" class="form-control" placeholder="" value="<?php echo $price ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Поставщик</label>
            <input name="suppl" type="text" class="form-control" placeholder="" value="<?php echo $supplier ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Номер запчасти</label>
            <input name="partnum" type="text" class="form-control" placeholder="" value="<?php echo $part_num ?>">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Обновить</button>
    </form>
</body>

</html>