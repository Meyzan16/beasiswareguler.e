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
                      <h3 class="card-title">Data Wakil Dekan Kemahasiswaan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">NIP</th>
                              <th class="text-center">Nama Wakil Dekan</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Tanggal Update</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i=1;
                            foreach($data1 as $data) :  ?>
                                <tr>
                                  <?php 
                                    $a = $data['updated_at'];
                                    
                                    $pst = strtotime($a);
                                    $post = date('d/M/Y   H:i:s', $pst );
                                  ?>

                                  <td class="text-center"><?= $i++ ?></td>
                                  <td class="text-center"><?= $data['nip'] ?></td>
                                  <td class="text-center"><?= $data['nama'] ?></td>
                                  <?php
                                                    $warna = "";
                                                    $a= "";
                                                    if ($data['status'] == "N") {
                                                        $warna = "danger";
                                                        $a = "Tidak Aktif";
                                                    } else {
                                                        $warna = "success";
                                                        $a = "Aktif";
                                                    }
                                                ?>
                                  <td class="text-center"><span class="badge badge-<?= $warna ?>">
                                                  <?php echo $a; ?></span>                                                   
                                  </td>

                                  <td class="text-center"><?= $post ?></td>
                                  <td class="text-center">


                                  <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#edit_data<?= $data['nip'] ?>">
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
 <?php foreach($data1 as $data) { ?> 
<div class="modal fade" id="edit_data<?= $data['nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit data wakil dekan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                    <form action="<?= base_url('Backend/WakilDekan/update'); ?>" method="post" >
                         <input type="hidden" name="nip_hidden" value="<?= $data['nip']; ?>">
                      
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" class="form-control" name="nip"
                                value="<?php echo $data['nip']; ?>" autofocus >
                            </div>

                           

                            <div class="form-group">
                               <label>Nama</label>   
                                  <input type="text" class="form-control" name="nama"
                                  value="<?= $data['nama'] ?>" autofocus  >                                  
                            </div>

                            <label>Status</label>
                                            <select class="form-control" id="status" name="status" required >  
                                              <?php                                                              
                                                $a= "";
                                                if ($data['status'] == "N") {                                                  
                                                    $a = "Tidak Aktif";
                                                    $b = "N";
                                                } else {
                                                    $a = "Aktif";
                                                    $b = "Y";
                                                }
                                            ?>

                                              ?>

                                                <option value="<?= $b ?>"><?= $b ?></option>   
                                              
                                                    <?php if($data['status'] == "N") { ?>              
                                                        <option value="Y">aktif </option> 
                                                      <?php } else { ?>  
                                                             <option value="N">Tidak Aktif</option>
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






