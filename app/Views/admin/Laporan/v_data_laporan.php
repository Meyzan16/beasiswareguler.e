<?php $this->db = db_connect(); ?>

<?php if(session()->get('role_id') != 2){ ?>
<div class="col-lg-6">
    <form action=" <?= base_url('Backend/Laporan/pilih_tahun') ?>" method="post">
        <div class="row ">
            <div class="col-lg-6">
                <select class="form-control" name="tahun" required>
                <?php $tahun = $this->db->query("SELECT * FROM data_mahasiswa Group By tahun_pendaftar")->getResultArray(); ?>
                <option value=""  >Pilih Tahun</option>
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
            
            <div class="col-lg-6">
                <select  class="form-control" name="kategori" id="kategori" required>
                    <option value="" > Pilih Kategori </option>               
                    <option value="lolos"> LoLos</option>
                    <option value="belum lolos">Belum Lolos</option>
                    <option value="belum diverifikasi">Belum Diverifikasi</option>
                </select>

            </div>
        </div>
        <br>

        <div class="row">       
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary btn-block">Cari Data</button>
            </div>
        </div>
        <br>
    </form>
</div>

<?php } ?>


<div class="col-lg-12">

  <?php echo session()->getFlashdata('massage'); ?>

  <?php if(session()->getFlashdata('gagal')){ ?>
    <div class="alert alert-danger" role="alert">
         <?= session()->getFlashdata('gagal'); ?>
    </div>
  <?php } ?>


        <?php
                // foreach ($prodii as $data)
            if($tahunn == '') { ?>
                    <div class="card card-info">
                                    <div class="card-header">
                                    <h3 class="card-center"  style="text-align: center;">Data Pendaftar</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>                                   
                                        </thead>
                                        <tbody> 
                                        </tbody>
                                    </table>
                                    </div>
                            <!-- /.card-body -->

                    </div>          
            <?php } else {?>

             <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-center"  style="text-align: center;">Data Pendaftar <?=$kategori; ?> Beasiswa Tahun <?php echo $pilih_tahun ?> </h3>
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
                                <th class="text-center">PROGRAM STUDI</th>
                                <th class="text-center">NO REKENING</th>
                                <th class="text-center">NO HP MAHASISWA</th>
                                <th class="text-center">STATUS</th>
                          

                              </tr>
                          </thead>
                          <tbody>

                              <?php $i=1;
                              foreach($lolos as $data) :  ?>
                                  <tr>
                                      <td class="text-center"><?= $i++ ?></td>
                                      <td class="text-center"><?= $data['npm'] ?></td>
                                      <td class="text-center"><?= $data['nama_mhs'] ?></td>
                                      <td class="text-center"><?= $data['jenkel'] ?></td>
                                      <td class="text-center"><?= $data['nama_prodi'] ?></td>
                                      <td class="text-center"><?= $data['no_rek_mhs'] ?></td>
                                      <td class="text-center"><?= $data['no_hp_mhs'] ?></td>
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
