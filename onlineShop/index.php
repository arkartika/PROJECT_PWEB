<?php
$title = "HOME";
require "includes/header.php";

if (isset($_GET['filter'])){
    $query = mysqli_query($con, "SELECT * FROM barang WHERE id_kategori= '".$_GET['filter']."'");
    $data = mysqli_fetch_assoc($query);
}else
if (isset($_GET['s'])){
    $key = "%".$_GET['s']."%";
    $query = mysqli_query($con, "SELECT * FROM barang WHERE nama_barang like '$key'");
    $data = mysqli_fetch_assoc($query);
}else{
    $query = mysqli_query($con, "SELECT * FROM barang order by id_barang DESC");
    $data = mysqli_fetch_assoc($query);
}
?>
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">ROLY SHOP</h1>
                <div class="list-group">
                <a href="<?=BASE_URL;?>" class="list-group-item">Semua Kategori</a>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM kategori order by nama_kategori ASC");
                    $kategori = mysqli_fetch_assoc($sql);
                    do{

                    ?>
                    <a href="filter=<?=$kategori['id_kategori'];?>" class="list-group-item=<?=$kategori['nama_kategori'];?>"></a>
                    <?php
                    }while($kategori = mysqli_fetch_assoc($sql));
                    ?>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <form action="">
                            <div class="form-group">
                                <input class="form-control" type="search" value="<?php if (isset($_GET['s'])){echo $_GET['s'];}?>" name="s" placeholder="Masukkan Nama Produk">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-ingo btn-sm" value="Cari Produk">
                            </div>
                        </form>
                    </div>
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
                                        <h5>Rp.<?=number_format($data['harga_barang']);?></h5>
                                    </h4>                                
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

<?php require "includes/footer.php";?>