<?php
$title ="Tambah Barang";
require "includes/header.php ";

$id = $_GET['id'];

if (isset($_POST['update'])){
    $nama =$_POST['nama'];
    $harga =$_POST['harga'];
    $stok =$_POST['stok'];
    $satuan =$_POST['satuan'];
    $kategori =$_POST['kategori'];

    if(!empty($_FILES['gambar']['name'])){
        $gambar =$_FILES['gambar']['name'];
        $file = $_FILES['gambar']['tmp_name'];
        
        $path= "../assets/barang/ ";
        (move_uploaded_file($file, $path.$gambar));
        $sql = "UPDATE barang set nama_barang = '$nama', harga_barang = '$harga', stok_barang = '$stok', satuan_barang = '$satuan', id_kategori = '$kategori', gambar_barang ='$gambar' where id_barang ='$id'";
        $query=mysqli_query($con,$sql);



    }else{

        $sql = "UPDATE barang set nama_barang = '$nama', harga_barang = '$harga', stok_barang = '$stok', satuan_barang = '$satuan', id_kategori = '$kategori' where id_barang ='$id'";
        $query=mysqli_query($con,$sql);
    }

    if ($sql){
        echo "<meta http-equiv='refresh' content='0,url=".BASE_URL."admin/barang.php'";
        }
        
   
}

$query = mysqli_query($con,"SELECT * FROM barang where id_barang ='$id'");
$barang = mysqli_fetch_assoc($query);

?>

<div class="container-fluid">

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?BASE_URL;?>admin/">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
    <a href="<?BASE_URL;?>admin/barang.php">Table Barang</a>
    </li>
    <li class="breadcrumb-item active">Edit Barang</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>Edit Data Barang</div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name = "nama" value="<?=$barang['nama_barang'];?>" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="number" name = "harga" value="<?=$barang['harga_barang'];?>" class="form-control" placeholder="Harga Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Stok Barang</label>
                        <input type="number" name = "stok" value="<?=$barang['stok_barang'];?>" class="form-control" placeholder="Stok Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan Barang</label>
                        <input type="text" name = "satuan" value="<?=$barang['satuan_barang'];?>" class="form-control" placeholder="Satuan Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Barang</label>
                        <input type="file" name = "gambar" class="form-control">
                        <img src="<?=BASE_URL;?>assets/barang/<?=$barang['satuan_barang'];?>">
                    </div>
                    <div class="form-group">
                        <label>Kategori Barang</label>
                        <select name = "kategori" class="form-control" required>
                            <option>--- Pilih Kategori</option>
                            <?php
                            $sql= mysqli_query($con, "SELECT * FROM kategori");
                            $kategori = mysqli_fetch_assoc($sql);

                            do{
                                $select = "";
                                if ($barang['id_kategori'] == $kategori['id_kategori']){
                                    $select = "selected";
                                }
                            ?>
                                <option value="<?=$kategori['id_kategori'];?>"<?=$select;?>><?=$kategori['nama_kategori'];?></option>
                            <?php
                            }while($kategori = mysqli_fetch_assoc($sql))
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-success">
                    </div>
                </div>
            </div>
            
        </form>
    </div>

    </div>

    </div>
    </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik logout jika ingin mengakhiri sesi</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<script src="<?=BASE_URL;?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=BASE_URL;?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=BASE_URL;?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?=BASE_URL;?>assets/js/sb-admin.min.js"></script>


</body>

</html>