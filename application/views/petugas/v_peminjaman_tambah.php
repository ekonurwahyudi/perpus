<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Proses Transaksi Peminjaman Buku</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/peminjaman'?>" class="btn btn-sm btn-light btn-outline-dark pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br/>
            <br/>

            <form method="POST" action="<?php echo base_url().'petugas/peminjaman_aksi';?>">
                <div class="form-group">
                    <label class="font-weight-bold" for="buku">Buku</label>
                    <select name="buku" class="form-control">
                        <option value="">- Pilih Buku</option>
                        <?php foreach($buku as $b){
                            ?>
                            <option value="<?php echo $b->id; ?>"><?php echo $b->judul. ' | ' .$b->tahun. ' | ' .$b->penulis;?></option>
                            <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="anggota">Anggota</label>
                    <select name="anggota" class="form-control">
                        <option value="">- Pilih anggota</option>
                        <?php foreach($anggota as $a){
                            ?>
                            <option value="<?php echo $a->id;?>"><?php echo "Nama : ".$a->nama.' | NIK : '.$a->nik; ?></option>
                            <?php
                        }?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="tanggal_mulai">Tanggal Mulai Pinjam</label>
                    <input type="date" class="form-control" name="tanggal_mulai" placeholder="Massukan tanggal mulai pinjam">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="tanggal_sampai">Tanggal Selesai Pinjam</label>
                    <input type="date" class="form-control" name="tanggal_sampai" placeholder="Massukan tanggal sampai pinjam">
                </div>

                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>