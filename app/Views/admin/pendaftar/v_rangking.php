<?php $this->db = db_connect(); ?>

<?php if(session()->get('role_id') != 1){ ?>
<div class="col-lg-6">
    <form action=" <?= base_url('Backend/MetSaw/pilih_tahun') ?>" method="post">
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
                <button type="submit" name="cari"  onclick="pilihtahun()" class="btn btn-primary btn-block">Cari Data</button>
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
                              <h3 style="text-align: center;">Data Pendaftar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            </div>
                      <!-- /.card-body -->

            </div>
      
      <?php } else { ?>
            <div class="card card-info">
                            <div class="card-header">
                              <h3 style="text-align: center;">Data Pendaftar <?php echo $pilih_tahun ?>  </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                     <tr>
                                        <th  class="align-center">No</th>
                                        <th  class="text-center">NPM</th>
                                        <th  class="text-center">NAMA MAHASISWA</th>
                                        <th  class="text-center">JENIS KELAMIN</th>
                                        <th  class="text-center">PROGRAM STUDI</th>
                                        <th  class="text-center">SEMESTER</th>
                                        <!-- <th  class="text-center">Normalisasi</th> -->
                                 

                              
                                        <th class="text-center" style="color: red;">IPK</th>
                                        <th class="text-center" style="color: red;">JUMLAH SAUDARA KANDUNG</th>
                                        <th class="text-center" style="color: red;">PRESTASI NON AKADEMIK</th>
                                        <th class="text-center" style="color: red;">PENGHASILAN ORTU</th>
                                        <th class="text-center" style="color: red;">JUMLAH TANGGUNGAN ORTU</th>
                                        <th class="text-center" style="color: red;">Perangkingan</th>
                                        <th class="text-center" >STATUS KELOLOSAN</th>
                                        <th class="text-center" >AKSI</th>

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
                                              <td class="text-center"><?= $data['nama_prodi'] ?></td>
                                              <td class="text-center"><?= $data['semester'] ?></td>
                                              <td class="text-center"><?= $data['nilai_ipk'] ?></td>
                                              <td class="text-center"><?= $data['data_kdg'] ?></td>
                                              <td class="text-center"><?= $data['data_prestasi'] ?></td>
                                              <td class="text-center"><?= $data['data_penghasilan'] ?></td>
                                              <td class="text-center"><?= $data['data_tanggungan'] ?></td>
                                              <td class="text-center"> <?= $data['preferensi'] ?> </td>
                                              <?php
                                                    $warna = "";
                                                    if ($data['status'] == "belum diverifikasi") {
                                                        $warna = "info";
                                                    } else if ($data['status'] == "lolos") {
                                                        $warna = "success";
                                                    } else {
                                                        $warna = "danger";
                                                    }
                                                ?>

                                              <td class="text-center"><span class="badge badge-<?= $warna ?>">
                                                  <?php echo $data['status']; ?></span>          
                                              </td>

                                              <td>
                                                    
                                                    <a href="<?php echo base_url('Backend/MetSaw/verifikasi/'.$data['npm']); ?>" class="btn btn-xs btn-info _btn" 
                                                    data-toggle="tooltip" target="_blank" title="Lolos" > 
                                                             <i class="fas fa-check"></i>
                                                    </a>

                                                    <a href="<?php echo base_url('Backend/MetSaw/tolak/'.$data['npm']); ?>" class="btn btn-xs btn-danger _btn" 
                                                    data-toggle="tooltip" target="_blank" title="Belum Lolos" > 
                                                             <i class="fas fa-fw fa-ban"></i>
                                                    </a>
                                                    
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>   
                                  </tbody>
                              </table>
                            </div>
                      <!-- /.card-body -->

            </div>

      <?php } ?>
</div>


<script>
    $(function() {
        $('.a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        console.log(activeTab);
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
        }
    });
</script> 

