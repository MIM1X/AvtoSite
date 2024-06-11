<?php

$connect = mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'cardetailshop');

if(!$connect)
    die("ConnecFAild DB". mysqli_connect_error());