<?php

$connect = mysqli_connect(hostname: '127.0.0.1', username: 'root', password: '', database: 'cardetailshop');

if(!$connect){
    die("ConnecFAild". mysqli_connect_error());
}else{

}