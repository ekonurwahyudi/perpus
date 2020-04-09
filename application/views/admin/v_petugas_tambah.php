<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Petugas Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'admin/petugas'?>" class="btn btn-sm btn-light btn-outline-dark pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br/>
            <br/>
            <form method="POST" action="<?php echo base_url().'admin/petugas_tambah_aksi';?>">
                <div class="form-group">
                    <label class="font-weight-bold" for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan username" required="required">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Masukkan password" required="required">
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>