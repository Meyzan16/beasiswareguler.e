<!-- Sidebar -->


<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">Hello, <?= session()->get('nama_user'); ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="<?= base_url('Backend/Home')  ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            
            <?php 
            if(session()->get('role_id') == '1') { ?>

            <li class="nav-item ">
                <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-fw fa-database"></i>
                    <p>
                        Manajemen Pengaturan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>


                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/jadwal_pembukaan') ?>" class="nav-link" name="mapel">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>
                                    Setting Pembukaan
                                </p>
                            </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/Informasi') ?>" class="nav-link" name="mapel">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>
                                    Setting Infromasi
                                </p>
                            </a>
                    </li>
                </ul>

                 <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/Dokumen') ?>" class="nav-link" name="mapel">
                            <i class="nav-icon fas fa-fw fa-book"></i>
                            <p>
                                Setting Dokumen
                            </p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/pengumuman') ?>" class="nav-link" name="mapel">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>
                                    Setting Pengumuman
                                </p>
                         </a>
                    </li>

                </ul>

                 <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/Verifikator') ?>" class="nav-link" name="mapel">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>
                                    Setting Verifaktor
                                </p>
                         </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/WakilDekan') ?>" class="nav-link" name="mapel">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>
                                    Setting Wakil Dekan
                                </p>
                         </a>
                    </li>

                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/Parameter') ?>" class="nav-link" name="mapel">
                                <i class="nav-icon fas fa-fw fa-book"></i>
                                <p>
                                    Setting Parameter
                                </p>
                         </a>
                    </li>

                </ul>

            </li>

            <li class="nav-item ">
                        <a class="nav-link ">
                            <i class="nav-icon fas fa-fw fa-database"></i>
                            <p>
                                Manajemen Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="<?= base_url('Backend/Laporan') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-sign"></i>
                                    <p>
                                        Data Laporan
                                    </p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="<?= base_url('Backend/cetak_laporan') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-sign"></i>
                                    <p>
                                        Cetak Laporan
                                    </p>
                                </a>
                            </li>
                        </ul>

                        
               </li> 

            


            <?php } else { ?>

               

                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/pendaftar_mhs') ?>" class="nav-link" name="pendaftar">
                            <i class="nav-icon fas fa-fw fa-book"></i>
                            <p>
                                Data Pendaftar
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="<?= base_url('Backend/MetSaw') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign"></i>
                            <p>
                                Hasil Rangking
                            </p>
                        </a>
                    </li>
                    

                   

            <?php } ?>


                     

            <li class="nav-item ">
                <a href="<?= base_url('Rumahku/logout') ?>" class="nav-link">
                    <i class="nav-icon fa sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!--  -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $sub_title; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- isi dari v_home -->