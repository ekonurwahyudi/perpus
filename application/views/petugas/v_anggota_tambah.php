<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Anggota Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/anggota' ?>" class="btn btn-sm btn-light btn-outline-dark pull-right"><i class="fa fa-arrow-left"> Kembali</i></a>
            <br/>
            <br/>

            <form method="POST" action="<?php echo base_url().'petugas/anggota_tambah_aksi';?>">
                <div class="form-group">
                    <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan Nik" required="required">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" required="required">
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>