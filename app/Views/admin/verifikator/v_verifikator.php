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
                              <th>No</th>
                              <th>Nama</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Nama Prodi</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $i=1;
                        foreach($user_role as $data) :  ?>
                            <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $data['nama_user']; ?></td>
                              <td><?= $data['username']; ?></td>
                              <td><?= $data['password']; ?></td>
                              <td><?= $data['nama_prodi']; ?></td>
                              <td>
                              
                                  <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit_data<?= $data['id_role'] ?>">
                                      <i class="fa fa-fw fa-edit"></i>
                                        Edit
                                  </button>

                                  <form action="/Backend/verifikator/hapus/<?= $data['id_role']; ?>" method="post"  class="d-inline">
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
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data Verifikator</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
          
					<div class="modal-body">
						<form action="<?= base_url('Backend/verifikator/create'); ?>" method="post"  >
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" maxlength="50" autofocus required >  

                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" maxlength="50" autofocus required >   

                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" maxlength="50" autofocus required > 

                        <label>Prodi</label>
                        <select name="prodi" id="prodi" class="form-control">
                        <?php $b = $this->db->query("SELECT * FROM data_prodi")->getResultArray(); ?>
                            <option value="">Pilih Data</option>
                        <?php foreach($b as $b )  {?>
                            <option value="<?= $b['kode_prodi'] ?>"> <?= $b['nama_prodi'] ?></option>
                        <?php } ?>    
                        </select>  
                                                                   
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


<!-- awal edit data -->
 <?php foreach($user_role as $data) { ?> 
<div class="modal fade" id="edit_data<?= $data['id_role'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data verifikator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                    <form action="<?= base_url('Backend/verifikator/update'); ?>" method="post" >
                         <input type="hidden" name="id_role" value="<?= $data['id_role']; ?>">

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama"  maxlength="50"
                                value="<?php echo $data['nama_user']; ?>" autofocus >
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" 
                                value="<?php echo $data['username']; ?>" maxlength="50" autofocus >
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" 
                                value="<?php echo $data['password']; ?>" maxlength="50" autofocus >
                            </div>
                            

                            <div class="form-group">
                                <label>Prodi</label>
                                <select name="prodi" id="prodi" class="form-control" >
                                 <option value="<?= $data['kode_prodi'] ?>"> <?= $data['nama_prodi'] ?></option>
                                 <?php $b = $this->db->query("SELECT * FROM data_prodi")->getResultArray(); ?>                                 
                                <?php foreach ($b as $b) { ?>
                                  <?php if($b['kode_prodi'] != $data['kode_prodi']) { ?>
                                    <option value="<?= $b['kode_prodi']; ?> "><?= $b['nama_prodi']; ?></option>
                                  <?php } ?>
                                <?php } ?>
                                </select>
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