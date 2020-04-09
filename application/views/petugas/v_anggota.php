<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Anggota</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/anggota_tambah'?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Anggota Baru</a>
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th width="28%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($anggota as $a){
                            ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $a->nama;?></td>
                                <td><?php echo $a->nik; ?></td>
                                <td><?php echo $a->alamat; ?></td>
                                <td>
                                    <a target="_blank" href="<?php echo base_url().'petugas/anggota_kartu/'.$a-id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-address-card"></i> Cetak Kartu</a>
                                    <a target="_blank" href="<?php echo base_url().'petugas/anggota_edit/'.$a-id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Edit</a>
                                    <a target="_blank" href="<?php echo base_url().'petugas/anggota_hapus/'.$a-id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>