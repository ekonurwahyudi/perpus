<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Buku</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/buku'?>" class="btn btn-sm btn-light btn-outline-dark pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
            <br/>
            <br/>

            <?php foreach ($buku as $b) {
                ?>
                <form method="POST" action="<?php echo base_url().'petugas/buku_update';?>">
                    <div class="form-group">
                        <label class="font-weight-bold" for="judul">Judul Buku</label>
                        <input type="hidden" name="id" value="<?php echo $b->id; ?>">
                        <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku" required="required" value="<?php echo $b->judul; ?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="tahun">Tahun Terbit</label>
                        <select class="form-control" name="tahun" required="required">
                            <option value="">- Pilih Tahun</option>
                            <?php for($tahun=date('Y');$tahun>=1990;$tahun--){
                                ?>
                                <option <?php if($tahun==$b->tahun){echo "selected='selected'";}?> value="<?php echo $tahun; ?>"><?php echo $tahun;?> </option>)
                           <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="penulis">Penulis Buku</label>
                        <input type="text" class="form-control" name="penulis" placeholder="Masukkan nama penulis" required="required" value="<?php echo $b->penulis;?>">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="status">Status Buku</label>
                        <select class="form-control" name="status" required="required">
                            <option value="">- Pilis status</option>
                            <option <?php if($b->status=="1"){echo "selected='selected'";}?> value="1">Tersedia</option>
                            <option <?php if($b->status=="2"){echo "selected='selected'";}?> value="2">Sedang Dipinjam</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            <?php } ?>
        </div>
    </div>
</div>