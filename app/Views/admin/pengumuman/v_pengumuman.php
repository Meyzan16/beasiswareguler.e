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
                      <h3 class="card-title">Data Pengumuman</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Judul Pengumuman</th>
                              <th class="text-center">Nama File</th>
                              <th class="text-center">Status Pengumuman</th>
                              <th class="text-center">Tanggal Upload</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i=1;
                            foreach($pengumuman as $data) :  ?>
                                <tr>
                                  <?php 
                                    $a = $data['updated_at'];
                                    
                                    $pst = strtotime($a);
                                    $post = date('d/M/Y   H:i:s', $pst );
                                  ?>

                                  <td class="text-center"><?= $i++ ?></td>
                                  <td class="text-center"><?= $data['judul_pengumuman'] ?></td>
                                  <td class="text-center" > <a href="<?=base_url('file_pengumuman/'.$data['upload_file']) ?>" target="_blank" class="btn btn-primary btn-sm "> <?= $data['upload_file'] ?> </a></td> 
                                  <?php
                                                    $warna = "";
                                                    if ($data['status'] == "belum umumkan") {
                                                        $warna = "danger";
                                                    } else {
                                                        $warna = "success";
                                                    }
                                                ?>
                                  <td class="text-center"><span class="badge badge-<?= $warna ?>">
                                                  <?php echo $data['status']; ?></span>                                                   
                                  </td>

                                  <td class="text-center"><?= $post ?></td>
                                  <td class="text-center">


                                  <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit_data<?= $data['id_pengumuman'] ?>">
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



<!-- awal edit data -->
 <?php foreach($pengumuman as $data) { ?> 
<div class="modal fade" id="edit_data<?= $data['id_pengumuman'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                    <form action="<?= base_url('Backend/pengumuman/update'); ?>" method="post" enctype="multipart/form-data">
                         <input type="hidden" name="id_pengumuman" value="<?= $data['id_pengumuman']; ?>">
                         <input type="hidden" name="fileLama" value="<?= $data['upload_file']; ?>">
                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="text" class="form-control" name="judul"
                                value="<?php echo $data['judul_pengumuman']; ?>" autofocus >
                            </div>

                           

                            <div class="form-group">
                               <label>Nama File</label>   
                                  <input type="file" class="form-control" name="file"
                                  <?= $data['upload_file'] ?> autofocus  >                                  
                            </div>

                            <label>Status</label>
                                            <select class="form-control" id="status" name="status" required >  
                                                <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>   
                                              
                                                    <?php if($data['status'] == "umumkan") { ?>              
                                                        <option value="belum umumkan"> Belum Umumkan </option> 
                                                      <?php } else { ?>  
                                                             <option value="umumkan ">Umumkan</option>
                                                        <?php } ?>                         
                                </select>  
                                

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
<!-- akhir edit data -->






