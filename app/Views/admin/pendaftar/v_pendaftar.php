<?php $this->db = db_connect(); ?>

<?php if(session()->get('role_id') != 1){ ?>
<div class="col-lg-6">
    <form action=" <?= base_url('Backend/Pendaftar_mhs/pilih_tahun') ?>" method="post">
        <div class="row ">
            <div class="col-lg-6">
                <select class="form-control" name="tahun" required>
                <?php $tahun = $this->db->query("SELECT * FROM data_mahasiswa Group By tahun_pendaftar")->getResultArray(); ?>
                <option value="" >Pilih Tahun</option>
                    <?php foreach ($tahun as $a) { 
                       $c = ""; 
                       if ($a['tahun_pendaftar'] == $pilih_tahun) $c = "selected";
                       ?>
                        <option value="<?= $a['tahun_pendaftar']; ?>" <?= $c; ?>>
                            <?=  $a['tahun_pendaftar']; ?>
                        </option>
                    <?php } ?>
                </select>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <button type="submit" target="_blank"  class="btn btn-primary btn-block">Cari Data</button>
            </div>
        </div>
        <br>
    </form>
</div>
<?php } ?>



<div class="col-lg-12">

<div class="autohide">
    <?php echo session()->getFlashdata('massage'); ?>
</div>

  <?php if(session()->getFlashdata('gagal')){ ?>
    <div class="alert alert-danger autohide" role="alert">
         <?= session()->getFlashdata('gagal'); ?>
    </div>
  <?php } ?>


      <?php
        // foreach ($prodii as $data)
      if($tahunn == null) { ?>
            <div class="card card-info">
                            <div class="card-header">
                              <h3 style="text-align: center;"> Data Pendaftar <?= strtolower(session()->get('nama_prodi')); ?> </h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">NPM</th>
                                        <th class="text-center">NAMA MAHASISWA</th>
                                        <th class="text-center">JENIS KELAMIN</th>
                                        <th class="text-center">TANGGAL LAHIR</th>
                                        <th class="text-center">TEMPAT LAHIR</th>
                                        <th class="text-center">PROGRAM STUDI</th>
                                        <th class="text-center">SEMESTER</th>
                                        <th class="text-center">IPK</th>
                                        <th class="text-center">NO REKENING</th>
                                        <th class="text-center">NO HP MAHASISWA</th>
                                        <th class="text-center">JUMLAH SAUDARA KANDUNG</th>
                                        <th class="text-center">PRESTASI NON AKADEMIK</th>
                                        <th class="text-center">ALAMAT MAHASISWA</th>
                                        <th class="text-center">NAMA AYAH</th>
                                        <th class="text-center">PEKERJAAN AYAH</th>
                                        <th class="text-center">NAMA IBU</th>
                                        <th class="text-center">PEKERJAAN IBU</th>
                                        <th class="text-center">PENGHASILAN ORTU</th>
                                        <th class="text-center">JUMLAH TANGGUNGAN ORTU</th>
                                        <th class="text-center">ALAMAT ORTU</th>
                                        <th class="text-center">NO HP ORTU</th>
                                        <th class="text-center">TAHUN MENDAFTAR</th>
                                        <th class="text-center">STATUS KELOLOSAN</th>
                                        <th class="text-center">STATUS BERKAS</th>
                                        <th class="text-center">LIHAT BERKAS</th>
                                        <th class="text-center">Aksi</th>
                                

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i=1;
                                    foreach($pendaftar as $data) :  ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td class="text-center"><?= $data['npm'] ?></td>
                                            <td class="text-center"><?= $data['nama_mhs'] ?></td>
                                            <td class="text-center"><?= $data['jenkel'] ?></td>
                                            <td class="text-center"><?= $data['tgl_lahir'] ?></td>
                                            <td class="text-center"><?= $data['tempat_lahir'] ?></td>
                                            <td class="text-center"><?= $data['nama_prodi'] ?></td>
                                            <td class="text-center"><?= $data['semester'] ?></td>
                                            <td class="text-center"><?= $data['nilai_ipk'] ?></td>
                                            <td class="text-center"><?= $data['no_rek_mhs'] ?></td>
                                            <td class="text-center"><?= $data['no_hp_mhs'] ?></td>
                                            <td class="text-center"><?= $data['data_kdg'] ?></td>
                                            <td class="text-center"><?= $data['data_prestasi'] ?></td>
                                            <td><?= $data['alamat_mhs'] ?></td>
                                            <td class="text-center"><?= $data['nama_ayah'] ?></td>
                                            <td class="text-center"><?= $data['pkj_ayah'] ?></td>
                                            <td class="text-center"><?= $data['nama_ibu'] ?></td>
                                            <td class="text-center"><?= $data['pkj_ibu'] ?></td>
                                            <td class="text-center"><?= $data['data_penghasilan'] ?></td>
                                            <td class="text-center"><?= $data['data_tanggungan'] ?></td>
                                            <td><?= $data['alamat_ortu'] ?></td>
                                            <td class="text-center"><?= $data['no_hp_ortu'] ?></td>
                                            <td class="text-center"><?= $data['tahun_pendaftar'] ?></td>

                                            <?php
                                                    $warna = " ";
                                                    if ($data['status'] == "belum diverifikasi") {
                                                        $warna = "info";
                                                    } else if ($data['status'] == "lolos") {
                                                        $warna = "success";
                                                    } else {
                                                        $warna = "danger";
                                                    }
                                                ?>

                                            <td class="text-center"><span class="badge badge-<?= $warna; ?>">
                                                <?php echo $data['status']; ?></span>  

                                            </td>

                                            <?php
                                                    $warna = " ";
                                                    $a = " ";
                                                    if ($data['status_berkas'] == "B" && $data['catatan_berkas'] == '' && $data['berkas_revisi'] == '') {
                                                        $warna = "info";
                                                        $a = "Belum Diverifikasi";
                                                    } else if ($data['status_berkas'] == "Y" && $data['catatan_berkas'] == '' && $data['berkas_revisi'] != '') {
                                                        $warna = "success";
                                                        $a = "Selesai Diverifikasi";
                                                    } elseif($data['status_berkas'] == "N" && $data['catatan_berkas'] != '' && $data['berkas_revisi'] == '') {
                                                        $warna = "danger";
                                                        $a = "Sudah Diverifikasi, dengan catatan".' '.$data['catatan_berkas'];
                                                    }elseif($data['status_berkas'] == "N" && $data['catatan_berkas'] != '' && $data['berkas_revisi'] != '') {
                                                        $warna = "warning";
                                                        $a = "file sudah diperbaki, menunggu diverifikasi ulang";
                                                    }
                                                ?>

                                            <td class="text-center"><span class="badge badge-<?= $warna; ?>">
                                                <?php echo $a; ?></span>  

                                            </td>



                                            <td class="text-center">
                                                <a href="<?php echo base_url('Backend/pendaftar_mhs/berkas_mhs/' . $data['npm']); ?>" target="_blank"> 
                                                            <button type="hidden" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-info"></i> Lihat Berkas </button>
                                                    </a>

                                              
                                            </td>

                                            <td>
                                                    <a href="<?php echo base_url('Backend/pendaftar_mhs/edit_data/' . $data['npm']); ?>" target="_blank"> 
                                                            <button type="hidden" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-edit"></i> Edit Data </button>
                                                    </a>


                                                        <form action="/Backend/pendaftar_mhs/hapus_data/<?= $data['npm']; ?>" method="post"  class="d-inline">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="hapus" value="DELETE">
                                                            <button type="submit" name="hapus"  class="btn btn-xs btn-danger " onclick="return confirm('Apakah Anda Yakin Hapus Data npm <?= $data['npm'] ?> ?')" > <i class="fa fa-fw fa-trash"> </i> Delete
                                                            </button>
                                                        </form>

                                            </td>

                                        </tr>
                                    <?php endforeach; ?>   
                                </tbody>
                            </table>
                    </div>

                      <!-- /.card-body -->
            </div>
      
      <?php } else {?>
             <div class="card card-info">
             
                    <div class="card-header">
                      <h3 style="text-align: center;">Data Pendaftar <?php echo $pilih_tahun ?> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">NPM</th>
                                        <th class="text-center">NAMA MAHASISWA</th>
                                        <th class="text-center">JENIS KELAMIN</th>
                                        <th class="text-center">TANGGAL LAHIR</th>
                                        <th class="text-center">TEMPAT LAHIR</th>
                                        <th class="text-center">PROGRAM STUDI</th>
                                        <th class="text-center">SEMESTER</th>
                                        <th class="text-center">IPK</th>
                                        <th class="text-center">NO REKENING</th>
                                        <th class="text-center">NO HP MAHASISWA</th>
                                        <th class="text-center">JUMLAH SAUDARA KANDUNG</th>
                                        <th class="text-center">PRESTASI NON AKADEMIK</th>
                                        <th class="text-center">ALAMAT MAHASISWA</th>
                                        <th class="text-center">NAMA AYAH</th>
                                        <th class="text-center">PEKERJAAN AYAH</th>
                                        <th class="text-center">NAMA IBU</th>
                                        <th class="text-center">PEKERJAAN IBU</th>
                                        <th class="text-center">PENGHASILAN ORTU</th>
                                        <th class="text-center">JUMLAH TANGGUNGAN ORTU</th>
                                        <th class="text-center">ALAMAT ORTU</th>
                                        <th class="text-center">NO HP ORTU</th>
                                        <th class="text-center">TAHUN MENDAFTAR</th>
                                        <th class="text-center">STATUS KELOLOSAN</th>
                                        <th class="text-center">STATUS BERKAS</th>
                                        <th class="text-center">LIHAT BERKAS</th>
                                        <th class="text-center">Aksi</th>
                                

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i=1;
                                    foreach($tahunn as $data) :  ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td class="text-center"><?= $data['npm'] ?></td>
                                            <td class="text-center"><?= $data['nama_mhs'] ?></td>
                                            <td class="text-center"><?= $data['jenkel'] ?></td>
                                            <td class="text-center"><?= $data['tgl_lahir'] ?></td>
                                            <td class="text-center"><?= $data['tempat_lahir'] ?></td>
                                            <td class="text-center"><?= $data['nama_prodi'] ?></td>
                                            <td class="text-center"><?= $data['semester'] ?></td>
                                            <td class="text-center"><?= $data['nilai_ipk'] ?></td>
                                            <td class="text-center"><?= $data['no_rek_mhs'] ?></td>
                                            <td class="text-center"><?= $data['no_hp_mhs'] ?></td>
                                            <td class="text-center"><?= $data['data_kdg'] ?></td>
                                            <td class="text-center"><?= $data['data_prestasi'] ?></td>
                                            <td><?= $data['alamat_mhs'] ?></td>
                                            <td class="text-center"><?= $data['nama_ayah'] ?></td>
                                            <td class="text-center"><?= $data['pkj_ayah'] ?></td>
                                            <td class="text-center"><?= $data['nama_ibu'] ?></td>
                                            <td class="text-center"><?= $data['pkj_ibu'] ?></td>
                                            <td class="text-center"><?= $data['data_penghasilan'] ?></td>
                                            <td class="text-center"><?= $data['data_tanggungan'] ?></td>
                                            <td><?= $data['alamat_ortu'] ?></td>
                                            <td class="text-center"><?= $data['no_hp_ortu'] ?></td>
                                            <td class="text-center"><?= $data['tahun_pendaftar'] ?></td>

                                            <?php
                                                    $warna = " ";
                                                    if ($data['status'] == "belum diverifikasi") {
                                                        $warna = "info";
                                                    } else if ($data['status'] == "lolos") {
                                                        $warna = "success";
                                                    } else {
                                                        $warna = "danger";
                                                    }
                                                ?>

                                            <td class="text-center"><span class="badge badge-<?= $warna; ?>">
                                                <?php echo $data['status']; ?></span>  
                                            </td>

                                            
                                            <?php
                                                    $warna = " ";
                                                    $a = " ";
                                                    if ($data['status_berkas'] == "B" && $data['catatan_berkas'] == '' && $data['berkas_revisi'] == '') {
                                                        $warna = "info";
                                                        $a = "Belum Diverifikasi";
                                                    } else if ($data['status_berkas'] == "Y" && $data['catatan_berkas'] == '' && $data['berkas_revisi'] != '') {
                                                        $warna = "success";
                                                        $a = "Selesai Diverifikasi";
                                                    } elseif($data['status_berkas'] == "N" && $data['catatan_berkas'] != '' && $data['berkas_revisi'] == '') {
                                                        $warna = "danger";
                                                        $a = "Sudah Diverifikasi, dengan catatan".' '.$data['catatan_berkas'];
                                                    }elseif($data['status_berkas'] == "N" && $data['catatan_berkas'] != '' && $data['berkas_revisi'] != '') {
                                                        $warna = "warning";
                                                        $a = "file sudah diperbaki, menunggu diverifikasi ulang";
                                                    }
                                                ?>

                                            <td class="text-center"><span class="badge badge-<?= $warna; ?>">
                                                <?php echo $a; ?></span>  

                                            </td>

                                            <td class="text-center">
                                                <a href="<?php echo base_url('Backend/pendaftar_mhs/berkas_mhs/' . $data['npm']); ?>" target="_blank"> 
                                                            <button type="hidden" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-info"></i> Lihat Berkas </button>
                                                    </a>
                                            </td>

                                            <td>
                                                    <a href="<?php echo base_url('Backend/pendaftar_mhs/edit_data/' . $data['npm']); ?>" target="_blank" 
                                                            class="btn btn-xs btn-info "> 
                                                    <i class="fa fa-fw fa-edit"></i> Edit Data </a>

                                                        

                                                        <form action="/Backend/pendaftar_mhs/hapus_data/<?= $data['npm']; ?>" method="post"  class="d-inline">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="hapus" value="DELETE">
                                                            <button type="submit" name="hapus"  class="btn btn-xs btn-danger " onclick="return confirm('Apakah Anda Yakin Hapus Data npm <?= $data['npm'] ?> ?')" > <i class="fa fa-fw fa-trash"> </i> Delete
                                                            </button>
                                                        </form>

                                            </td>

                                        </tr>
                                    <?php endforeach; ?>   
                                </tbody>
                            </table>
                    </div>
              <!-- /.card-body -->

             </div>
      
      <?php } ?> 
      
      <!--  -->

</div>
