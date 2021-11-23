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

  
      <ol class="breadcrumb">
        <li>
        <button class="btn btn-fill btn-primary" data-toggle="modal" data-target="#tambah_data"><i class="fa fa-fw fa-plus"></i>Tambah Data</button>
        </li>
      </ol>  

     <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th class="text-center" >No</th>
                              <th class="text-center">Judul Dokumen</th>
                              <th class="text-center">Tanggal Update</th>
                              <th class="text-center">File</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i=1;
                            foreach($dokumen as $data) :  ?>
                                <tr>
                                  <?php 
                                    $a = $data['updated_at'];
                                    
                                    $pst = strtotime($a);
                                    $post = date('d-m-Y H:i:s', $pst );
                                  ?>

                                  <td class="text-center"><?= $i++ ?></td>
                                  <td class="text-center"><?= $data['judul_dokumen'] ?></td>
                                  <td class="text-center"><?= $post ?></td>
                                  <td class="text-center" > <a href="<?=base_url('file/'.$data['upload_file']) ?>" target="_blank" class="btn btn-primary btn-sm "> <?= $data['upload_file'] ?> </a></td>       
                                  <td class="text-center">
                                  
                              

                                  <form action="/Backend/dokumen/hapus/<?= $data['id_dokumen']; ?>" method="post"  class="d-inline">
                                   <?= csrf_field() ?>
                                  <input type="hidden" name="hapus" value="DELETE">
                                    <button type="submit" name="hapus"  class="btn btn-xs btn-danger " onclick="return confirm('Apakah Anda Yakin Hapus Data ?')" > <i class="fa fa-fw fa-trash"> </i> Delete
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
</div>

<!-- tambah data -->
		<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Judul Dokumen</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
          
					<div class="modal-body">
						<form action="<?= base_url('Backend/dokumen/create'); ?>" method="post"  enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label>Judul Dokumen</label>
                        <input type="text" class="form-control >" name="judul" placeholder="Judul Dokumen" autofocus required >  

                        <label for="foto" class="col-md-4 col-form-label">File Dokumen</label>
                        <input type="file" class="form-control >" name="file"  autofocus required >
                        <h6 style="color: red;">*Silahkan upload dokumen pdf</h6> 
                                       

                                                                   
                    </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
                      </div>
              </form>
					</div>

				</div>
			</div>
		</div>
<!-- akhir tambah data -->





