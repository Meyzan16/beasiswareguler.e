<?php $this->db = db_connect(); ?>

<div class="col-lg-12">

<div class="autohide">
  <?php echo session()->getFlashdata('massage'); ?>
</div>

  <?php if(session()->getFlashdata('gagal')){ ?>
    <div class="alert alert-danger autohide" role="alert">
         <?= session()->getFlashdata('gagal'); ?>
    </div>
  <?php } ?>

      
     <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Pengaturan Jadwal Pembukaan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Tanggal mulai</th>
                              <th>Tanggal selesai</th>
                              <th>Status</th>
                              <th>File Gambar</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $i=1;
                        foreach($jadwal as $data) :  ?>
                            <tr>
                            <?php 
                                $a = $data['tanggal_mulai'];
                                $b = $data['tanggal_selesai'];
                                $mulai = strtotime($a);
                                $selesai = strtotime($b);
                                $mulaii = date('Y-M-d', $mulai );
                                $selesaii = date('Y-M-d', $selesai );
                              ?>

                              <td><?= $i++ ?></td>
                              <td><?= $data['judul'] ?></td>
                              <td><?= $mulaii ?></td>
                              <td><?= $selesaii ?></td>
                                  <?php
                                      $warna = "";
                                      if ($data['status'] == "dibuka") {
                                          $warna = "success";
                                      } else if ($data['status'] == "belum dibuka") {
                                          $warna = "info";
                                      } else {
                                          $warna = "danger";
                                      }
                                      ?>
                              <td class="text-center"><span class=" badge badge-<?= $warna ?>">
                                    <?php echo $data['status']; ?></span>  </td> 

                              <td class="text-center"> <img src="/img/<?= $data['upload_file']; ?>" width="70" class="img-thumbnail"></td>         

                              <td>
                                  <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit_data<?= $data['id_jejak'] ?>">
                                      <i class="fa fa-fw fa-edit"></i>
                                        Edit
                                  </button>

                                 
                              </td>
                            </tr>
                         <?php endforeach; ?>   
                        </tbody>
                      </table>
                    </div>
              <!-- /.card-body -->
     </div>
</div>



<!-- edit -->
 <?php foreach($jadwal as $data) { ?> 
<div class="modal fade" id="edit_data<?= $data['id_jejak'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Pembukaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                    <form action="<?= base_url('Backend/jadwal_pembukaan/update'); ?>" method="post" enctype="multipart/form-data" >
                          <input type="hidden" name="id_jejak" value="<?= $data['id_jejak']; ?>">
                           <input type="hidden" name="fotoLama" value="<?= $data['upload_file']; ?>">

                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" value="<?php echo $data['judul']; ?>" name="judul" placeholder="Contoh : 1A1 = 10 IPA 1" autofocus required >  

                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" value="<?php echo $data['tanggal_mulai']; ?>" name="tgl_mulai" placeholder="Contoh : 1A1 = 10 IPA 1" autofocus required > 
                                

                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control" value="<?php echo $data['tanggal_selesai']; ?>" name="tgl_selesai" placeholder="Nama Kelas" autofocus required >  

                                <label>Status</label>
                                            <select class="form-control" id="status" name="status" required >  
                                                <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>   
                                              
                                                  <?php if($data['status'] == "dibuka") { ?>              
                                                        <option value="belum dibuka">Belum dibuka</option>
                                                        <option value="ditutup">ditutup</option> 
                                                        <?php } else if(($data['status'] == "belum dibuka")) { ?>    
                                                            <option value="dibuka">dibuka</option>
                                                            <option value="ditutup">ditutup</option> 
                                                        <?php } else { ?>  
                                                             <option value="dibuka">dibuka</option>
                                                            <option value="belum dibuka">belum dibuka</option> 
                                                        <?php } ?>                         
                                            </select>  

                                            


                                          <label for="foto" class="col-md-4 col-form-label">Gambar Carousel</label>                            
                                          <div class="row">
                                                <div class="col-sm-4">
                                                          <img src="/img/<?= $data['upload_file'] ?>" class="img-thumbnail img-preview">
                                                  </div>

                                                <div class="col-sm-8">
                                                      <div class="custom-file-label">
                                                          <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" 
                                                          id="file" name="foto" onchange="preview()">
                                                                <div class="invalid-feedback">
                                                                <?= $validation->getError('foto'); ?>
                                                                </div>
                                                          <label for="foto" class="custom-file-label"> <?= $data['upload_file']; ?> </label>
                                                      </div>
                                                  </div>
            
                                          </div> 
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                            </div>
                      </form>
              </div>

				</div>
			</div>
		</div>
    <?php }  ?> 
<!-- akhir edit -->







