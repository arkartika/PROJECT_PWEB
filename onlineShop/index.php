<?php
$title = "HOME";
require "includes/header.php";

if (isset($_GET['filter'])){
    $query = mysqli_query($con, "SELECT 8 FROM barang WHERE id_kategori= '".$_GET['filter']."'");
    $data = mysqli_fetch_assoc($query);
}else{
    $query = mysqli_query($con, "SELECT 8 FROM barang order by id_barang DESC");
    $data = mysqli_fetch_assoc($query);
}
?>
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">PasOn</h1>
                <div class="list-group">
                <a href="<?=BASE_URL;?>" class="list-group-item">Semua Kategori</a>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM kategori order by nama_kategori ASC");
                    $kategori = mysqli_fetch_assoc($sql);
                    do{

                    ?>
                    <a href="?filter=<?=$kategori['id_kategori'];?>" class="list-group-item"><?=$kategori['nama_kategori'];?></a>
                    <?php
                    }while($kategori = mysqli_fetch_assoc($sql));
                    ?>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <?php
                    if (mysqli_num_rows($query)>0){
                        do{

                        ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="tampil.php?id=<?=$data['id_barang'];?>"><img class="card-img-top" src="<?=BASE_URL;?>assets/barang/<?=$data['gambar_barang'];?>" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="tampil.php?id=<?=$data['id_barang'];?>"><?=$data['nama_barang'];?></a>
                                        <h5>Rp.<?=$data['harga_barang'];?></h5>
                                    </h4>                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>
                        <?php
                        }while($data = mysqli_fetch_assoc($query));
                    
                    }else{
                        echo "Tidak Ada Produk yang Tersedia....";
                    }
                    ?>
                </div>
            </div>

        </div>