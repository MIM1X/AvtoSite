<?php
require_once '../Auth/vendor/db.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $descrip=$_POST['descr'];
    $charact=$_POST['charac'];
    $price=$_POST['price'];
    $supplier=$_POST['suppl'];
    $part_num=$_POST['partnum'];

    $sql = "insert into `products` (Name, Description, Characteristics, Price, Supplier, Part_Num) 
    values('$name','$descrip','$charact','$price','$supplier','$part_num')";
    $res = mysqli_query($connect, $sql);
    if($res){
        header('location:adm.php');
    }else{
        die(mysqli_error($connect));
    }
};
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Добавление новых товаров</title>
</head>

<body>
    <form style="padding: 50px 50px 50px 50px" method="post">
        <div class="mb-3">
            <label class="form-label">Название</label>
            <input name="name" type="text" class="form-control" placeholder="">
        </div>
        <div class="mb-3">
            <label class="form-label">Описание</label>
            <textarea name="descr" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Характеристика</label>
            <textarea name="charac" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Цена</label>
            <input name="price" type="text" class="form-control" placeholder="">
        </div>
        <div class="mb-3">
            <label class="form-label">Поставщик</label>
            <input name="suppl" type="text" class="form-control" placeholder="">
        </div>
        <div class="mb-3">
            <label class="form-label">Номер запчасти</label>
            <input name="partnum" type="text" class="form-control" placeholder="">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Отправить</button>
    </form>
</body>

</html>