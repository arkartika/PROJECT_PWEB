<?php
    $title = "Tampil Produk";
    require "includes/header.php";

    if (isset($_GET['id'])){
        $query = mysqli_query($con,"select kategori.*, barang.* from barang left join kategori on kategori.id_kategori = barang.id_kategori where barang.id_barang = '".$_GET['id']."'");
        $data = mysqli_fetch_assoc($query);
    }
?>
        <form action="beli.php" method="post">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                           
                                <img class="card-img-top " src="<?=BASE_URL;?>assets/barang/ <?=$data['gambar_barang'];?>" alt="">
                            
                        </div>
                    </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5>Rp.<?=number_format($data['harga_barang']);?>/<?=$data['satuan_barang'];?></h5>
                                <div class="form-group">
                                    <label>qty</label>
                                    <input type="number" value="1" name="qty" class="col-lg-2 form-control" required>
                            </div>
                        </div>
                    </div>
                <div class="col-md-3">
                    <h1 class="my-4"><?=$data['nama_barang'];?></h1>
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small><br>
                    <span>Kategori:<?=$data['nama_kategori'];?></span><br>
                    <input type="submit" class="btn btn-success btn-sm" name="beli" value="beli">
                    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                </div>
            </div>
        </form>
<?php require "includes/footer.php";?>