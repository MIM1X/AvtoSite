<?php

$connect = mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'cardetailshop');

if(!$connect)
    die("ConnecFAild DB". mysqli_connect_error());

    function supplierName($connect, $idSupplier){
        $check_suppl_name = mysqli_query($connect, "SELECT Name FROM Suppliers where SupplierID = $idSupplier;");
        $suppl_name = mysqli_fetch_assoc($check_suppl_name);
        $suppl_name = $suppl_name['Name'];
        return $suppl_name;
    } 

    function suppliers($connect){
        $check_suppl = mysqli_query($connect, "SELECT SupplierID, Name FROM Suppliers;");
        return $check_suppl;
    } 

    function products($connect, $id){
        $check_suppl = mysqli_query($connect, "SELECT Name FROM Products where ProductID = $id;");
        return $check_suppl;
    } 