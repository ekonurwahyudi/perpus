<html>
<head>
    <title>Admin -  Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTables/datatables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/awesome/css/font-awesome.css'?>">
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/DataTables/datatables.js'?>"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url().'admin';?>">Sistem Perpustakaan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'admin';?>"><i class="fa fa-home"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'admin/petugas';?>"><i class="fa fa-user"></i> Petugas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'admin/anggota';?>"><i class="fa fa-users"></i> Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'admin/buku';?>"><i class="fa fa-book"></i> Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'admin/laporan';?>"><i class="fa fa-book"></i> Laporan Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'admin/ganti_password';?>"><i class="fa fa-lock"></i> Ganti Password</a>
                        </li>
                    </ul>

                    <span class="navbar-text mr-3 text-center">
                        Halo, <?php echo $this->session->userdata('username'); ?>
                    </span>

                    <a href="<?php echo base_url().'admin/logout' ?>" class="btn btn-danger ml-1"><i class="fa fa-power-off"></i> KELUAR</a>
                </div>
        </div>
    </nav>

    <br/>
    <br/>