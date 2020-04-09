<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Buku</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/buku_tambah'?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Buku Baru</a>
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-datatable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Judul Buku</th>
                            <th>Tahun Terbit</th>
                            <th>Penulis</th>
                            <th width="10%">Status</th>
                            <th width="13%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($buku as $b){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $b->judul; ?></td>
                                <td><?php echo $b->tahun; ?></td>
                                <td><?php echo $b->penulis; ?></td>
                                <td>
                                    <?php
                                    if($b->status == "1"){
                                        echo "<span class='badge badge-success'>Tersedia</span>";
                                    }else if($b->status == "2"){
                                        echo "<span class='badge badge-warning'>Sedang Dipinjam</span>";
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'petugas/buku_edit/'.$b->id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Edit</a>
                                    <a href="<?php echo base_url().'petugas/buku_hapus/'.$b->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>