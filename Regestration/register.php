<?php
require_once('../db.php');
$Email = $_POST['Email'];
$Passwd = $_POST['Passwd'];
$PasswdRepyt = $_POST['PasswdRep'];

if(empty($Email) || empty($Passwd) || empty($PasswdRepyt)){
    echo "Заполните все поля";
}else{
    if($Passwd != $PasswdRepyt){
        echo "Пароли не совпадают";
    }else{
        $sql = "insert into `customers` (EmailAddress, Password) values ('$Email', '$Passwd')";
        if($connect -> query($sql)){
            echo "Регестрация прошла успешно!";
        }else{
            echo "Ошибка-> ". $connect->error;
        }
        
    }
}
