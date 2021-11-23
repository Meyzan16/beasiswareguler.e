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
                      <h3 class="card-title">Pengaturan Informasi Website</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Isi Informasi</th>
                              <th>Tanggal Update</th>
                              <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $i=1;
                        foreach($informasi as $data) :  ?>
                            <tr>
                              <?php 
                                $a = $data['updated_at'];
                                $tgl = strtotime($a);
                                $date = date('d-m-Y H:i:s', $tgl );
                              ?>

                              <td><?= $i++ ?></td>
                              <td><?= $data['isi_informasi']; ?></td>
                              <td><?=  $date; ?></td>
                                

                              <td>
                                   <form action="/Backend/informasi/edit/<?= $data['id_informasi']?>" method="post">
                                       <button type="submit" name="edit" class="btn btn-xs btn-info" ><i class="fa fa-fw fa-edit"></i> Edit 
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











