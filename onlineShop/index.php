<?php
$title = "HOME";
require "includes/header.php";

if (isset($_GET['filter'])){
    $query = mysqli_query($con, "SELECT * FROM barang WHERE id_kategori= '".$_GET['filter']."'");
    $data = mysqli_fetch_array($query);
}else{

    if (isset($_GET['s'])){
        $key = "%".$_GET['s']."%";
        $query = mysqli_query($con, "SELECT * FROM barang WHERE nama_barang like '$key'");
        $data = mysqli_fetch_array($query);
    }else{
        $query = mysqli_query($con, "SELECT * FROM barang order by id_barang DESC");
    }
}
?>
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">SELAMAT DATANG</h1>
                <h2>RoLyShop</h2>
                <div class="list-group">
                <a href="<?=BASE_URL;?>" class="list-group-item">Semua Kategori</a>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM kategori");
                    while($kategori = mysqli_fetch_array($sql)){
                    ?>
                    <a href="index.php?filter=<?=$kategori['id_kategori'];?>" class="list-group-item"><?=$kategori['nama_kategori'];?></a>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <form action="" class="form-search-c" >
                            <div class="row">
                                <div class= "col-md-9">
                                    <div class="form-group">
                                        <input class="form-control" type="search" value="<?php if (isset($_GET['s'])){echo $_GET['s'];}?>" name="s" placeholder="Masukkan Nama Produk">
                                    </div>
                                </div>
                                <div class= "col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-info" value="Cari Produk">
                                    </div>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php

                        while($data = mysqli_fetch_array($query)){

                        ?>
                        <div class="col-4">
                            <div class="card">
                                <a class= "link-image-product" href="tampil.php?id=<?=$data['id_barang'];?>">
                                    <img class="card-img-top " style ="height :300px;" src="<?=BASE_URL;?>assets/barang/ <?=$data['gambar_barang'];?>" alt="">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="tampil.php?id=<?=$data['id_barang'];?>"><?=$data['nama_barang'];?></a>
                                        <h5>Rp.<?=number_format($data['harga_barang']);?></h5>
                                    </h4>
                                </div>                    
                                <div class="card-footer">
                                    <a class="btn-beli" href="tampil.php?id=<?=$data['id_barang'];?>">BELI</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        
                    ?>
                </div>
            </div>

        </div>

<?php require "includes/footer.php";?>