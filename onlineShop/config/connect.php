<?php

define("BASE_URL", "http://localhost/onlineShop/");
define("WEBNAME","Online Shop");

$con = mysqli_connect("localhost", "root","","olshop");

if (mysqli_connect_errno()){
    echo "Koneksi database gagal :".mysqli_connect_error();
}
?>