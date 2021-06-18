<?php
    $title = "Bayar Produk";
    require "includes/header.php";
    
    if(isset($_POST['bayar'])){

        $nama = $_POST['nama'];
        $telp = $_POST['phone'];
        $alamat = $_POST['alamat'];

        $insert = mysqli_query($con,"insert into customer (nama_customer, alamat_customer, telp_customer) value ('$nama','$alamat','$telp')");
        if($insert){
            $cust_id = mysqli_query($con,"select id_customer from customer order by id_customer DESC limit 1");
            $res_cust = mysqli_fetch_array($cust_id);
            $customer_id = $res_cust['id_customer']; 
            $qty = $_POST['qty'];
            $id = $_POST['id'];
            $setPenjualan = mysqli_query($con,"insert into penjualan (qty_penjualan, id_barang, id_customer) value ('$qty','$id','$customer_id')");

            if($setPenjualan){

                $Qbarang = mysqli_query($con,"select * from barang where id_barang = $id");
                $data = mysqli_fetch_array($Qbarang);
                
?>
            <div class="row">
                <div class="col-md-4">
                    <h2>Detail yang harus dibayar</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>qty</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$data['nama_barang'];?></td>
                                <td>Rp.<?=number_format($data['harga_barang']);?></td>
                                <td><?=$qty;?></td>
                                <td>Rp.<?=number_format($data['harga_barang'] * $qty);?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h3>Total yang harus dibayar :Rp.<?=number_format($data['harga_barang'] * $qty);?></h3>
                </div>
            </div>
<?php
        }    
    }
    }
?>
<?php 
require_once "includes/footer.php";
?>