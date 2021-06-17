<?php
    $title = "Beli Produk";
    require "includes/header.php";

?>
        <form action="bayar.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <h2>Silahkan Mengisi Detail Informasi Anda</h2>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input class="form-control" type="text" name="phone" placeholder="No. Telp" required>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <textarea class="form-control" name="nama" placeholder="Alamat Lengkap" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <input class="btn btn-sm btn-success" type="submit" name="bayar" value="Bayar Sekarang">
                            <input type="hidden" name="qty" value="<?=$_POST['qty'];?>">
                            <input type="hidden" name="id" value="<?=$_POST['id'];?>">
                    </div>
                </div>
            </div>
        </form> 
<?php require="includes/footer.php";?>
