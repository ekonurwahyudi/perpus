<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Ganti Password</h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['alert'])){
                        if($_GET['alert'] =="sukses"){
                            echo "<div class='alert alert-success'>Password berhasil diganti.</div>";
                        }
                    }
                    ?>

                    <?php echo validation_errors();?>
                    <form method="POST" action="<?php echo base_url().'petugas/ganti_password_aksi';?>">
                        <div class="form-group">
                            <label class="font-weight-bold" for="password_baru">Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" placeholder="Masukan password baru">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="password_ulang">Ulangi Password Baru</label>
                            <input type="password" class="form-control" name="password_ulang" placeholder="Ulangi password baru">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Ubah Password">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>