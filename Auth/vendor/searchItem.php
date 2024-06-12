<?php

session_start();
require_once 'db.php';

$nameTovar = $_POST['searchTovar'];
$_SESSION['search'] = $nameTovar;

if (!empty($nameTovar)) {
    $check_tovar = mysqli_query($connect, "SELECT * FROM `products` WHERE `Name` LIKE '%$nameTovar%'");
    if (mysqli_num_rows($check_tovar) > 0) {

        $array = array();
        $index = 0;

        while ($row = mysqli_fetch_assoc($check_tovar)) {
            $array[$index] = $row;
            $index++;
        }
        $_SESSION['tovar'] = $array;
    } else {
        $_SESSION['message'] = 'Такого товара не нашлось, проверьте название';
    };
} else {
    $_SESSION['message'] = 'Вбейте, что-нибудь в поиск';
};
header('Location: ../../index.php');



// $_SESSION['tovar'] = ["nekiyTovar"=>[
//     "id" => $tovar ['ProductID'],
//     "name" => $tovar ['Name'],
//     "description" => $tovar ['Description'],
//     "charact" => $tovar ['Characteristics'],
//     "price" => $tovar ['Price'],
//     "stock" => $tovar ['Stock'],
//     "supplier" => $tovar ['Supplier'],
//     "partNum" => $tovar ['Part_Num']
// ]];