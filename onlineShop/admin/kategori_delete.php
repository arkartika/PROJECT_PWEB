<?php
require "includes/header.php";

$id = $_GET['id'];

$sql= "DELETE FROM kategori WHERE id_kategori ='$id'";
$query= mysqli_query($con, $sql);

if($query){
    echo "<meta http-equiv='refresh' content='0, url=".BASE_URL."admin/kategori.php'/>";
}
?>