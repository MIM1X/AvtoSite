<?php
require_once '../Auth/vendor/db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="delete from `products` where ProductID = $id";
    $res=mysqli_query($connect,$sql);
    if($res){
        header('location:adm.php');
    }else
    die(mysqli_error($connect));
};