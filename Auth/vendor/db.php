<?php

$connect = mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'cardetailshop');

if(!$connect)
    die("ConnecFAild DB". mysqli_connect_error());

    function sumCountTovar($connect, $id){
        $check_tovar_count = mysqli_query($connect, "SELECT SUM(Quantity) FROM warehouse_items WHERE ProductID = '$id';");
        $tovarCount = mysqli_fetch_assoc($check_tovar_count);
        return $tovarCount;
    }