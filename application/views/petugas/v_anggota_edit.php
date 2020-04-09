<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Anggota</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/anggota'?>" class="btn btn-sm btn-light btn-outline-dark pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br/>
            <br/>

            <?php foreach($anggota as $a){
                ?>
                <form method="POST" action="<?php echo base_url().'petugas/anggota_update'; ?>">
                    <div class="form-group">
                        <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                        <input type="hidden" value="<?php echo $a->id; ?>" name="id">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required" value="<?php echo $a->nama; ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" required="required" value="<?php echo $a->nik; ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" required="required"><?php echo $a->alamat; ?></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            <?php } ?>
        </div>
    </div>
</div>
