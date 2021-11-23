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
                      <h3 class="card-title">Data Parameter</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Parameter</th>
                              <th>Bobot</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $i=1;
                        foreach($parameter as $data) :  ?>
                            <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $data['nama_prm']; ?></td>
                              <td><?= $data['bobot_prm']; ?>%</td>
                              <td>
                              
                                  <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit_data<?= $data['id_parameter'] ?>">
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
 <?php foreach($parameter as $data) { ?> 
<div class="modal fade" id="edit_data<?= $data['id_parameter'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                    <form action="<?= base_url('Backend/parameter/update'); ?>" method="post" >
                         <input type="hidden" name="id_parameter" value="<?= $data['id_parameter']; ?>">

                            <div class="form-group">
                                <label>Nama Parameter</label>
                                <input type="text" class="form-control" name="nama"  maxlength="30"
                                value="<?php echo $data['nama_prm']; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="text" class="form-control" name="bobot" 
                                value="<?php echo $data['bobot_prm']; ?>" maxlength="2" autofocus >
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
<!-- akhir edit data -->