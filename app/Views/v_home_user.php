<div class="main-panel">   
  
<?php $this->db = db_connect(); ?>

<?php 
$npm = session()->get('npm');
$data = $this->db->query("SELECT * FROM DATA_MAHASISWA WHERE npm='$npm'")->getRow(); ?>

        <div class="content-wrapper">     
          <?php echo session()->getFlashdata('message'); ?>  
            <div class="autohide">
              <?php echo session()->getFlashdata('message_berhasil'); ?>    
            </div>

            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card tale-bg shadow mb-4">
                          <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">PROFIL <?= session()->get('nama') ?> </h6>
                            </div>
                            <div class="card-body ">

                            <div class="row">
                                    <table class="table table-hover">
                                          <tr><td>NPM</td><td> : </td><td><?= session()->get('npm') ?></td></tr>
                                          <tr><td>Nama</td><td> : </td><td><?= session()->get('nama') ?></td></tr>
                                          <tr><td>Jenis Kelamin</td><td> : </td><td><?= session()->get('jenkel') ?></td></tr>
                                          <tr><td>Tanggal Lahir</td><td> : </td><td><?= session()->get('tgl_lahir') ?></td></tr>
                                          <tr><td>Program Studi</td><td> : </td><td><?= session()->get('nama_prodi') ?></td></tr>
                                          <tr><td>Fakultas</td><td> : </td><td><?= session()->get('nama_fak') ?></td></tr>
                                    </table>
                            </div>
                      </div>

                    </div>

                </div>

                <?php if($data->status_berkas == 'N'){ ?>
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-title">Pesan Kesalahan, File hanya bisa 1 kali upload</p>
                        <p class="font-weight-500" style="color:red;">Catatan : <?= $data->catatan_berkas; ?></p>
                        <div class="d-flex flex-wrap mb-5">
                          
                        <?php if(($data->catatan_berkas != null) && ($data->status_berkas == 'N') && ($data->berkas_revisi) ) { ?>
                          <p class="font-weight-500 btn btn-primary">Pesan : File berhasil diupload, Menunggu diverifikasi ulang </p>
                          <?php } elseif(($data->catatan_berkas != null) && ($data->status_berkas == 'N') && ($data->berkas_revisi == '' ) )  { ?>
                            <form action="/Dashboard/revisi_file" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                                <label for="name">File Revisi</label>
                                  <input type="file" name="berkas_revisi" class="form-control <?= ($validation->hasError('berkas_revisi')) ? 'is-invalid' : ''; ?>" id="berkas_revisi" required>
                                  <div class="invalid-feedback autohide">
                                            <?= $validation->getError('berkas_revisi'); ?>
                                  </div>
                                  <button type="submit" name="file_revisi" class="btn btn-primary mr-2 float-left mt-3"  onclick="return confirm('Apakah data anda sudah benar ? file revisi hanya bisa 1 kali upload')">Submit</button>
                            </form>
                        <?php } ?>  
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                </div>
        </div>