<?php
require_once('../db.php');

$Email = $_POST['Email'];
$Passwd = $_POST['Passwd'];

if(empty($Email) || empty($Passwd)){
    echo "Заполните все поля";
}else {
    $sql="select * from `Customers` where EmailAddress = '$Email' and Password = '$Passwd'";
    $result = $connect->query($sql);

    if($result !== false && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "Добро пожаловать " . $row['EmailAddress'];
        }
    }else{
        echo "Почта или пароль введены неверно либо пользователя не существует";
    }
}