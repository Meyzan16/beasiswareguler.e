<?php $this->db = db_connect(); ?>

<?php foreach($pendaftar as $b) {?>

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

    <h4 class="text-right;" style="color: darkgreen; text-transform: uppercase;">BERKAS :  <?= $b['npm'] ?> <?= $b['nama_mhs'] ?></h4>

     <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">NPM</th>
                              <th class="text-center">NAMA</th>
                                <th class="text-center">SURAT PERMOHONAN</th>
                                <th class="text-center">KTM</th>
                                <th class="text-center">SURAT KETERANGAN TIDAK MAMPU</th>
                                <th class="text-center">BERKAS TIDAK MENGIKUTI BEASISWA LAIN</th>
                                <th class="text-center" >SERTIFIKAT PKK</th>
                                <th class="text-center">BERKAS KARTU KELUARGA</th>
                                <th class="text-center">BERKAS IPK</th>
                                <th class="text-center">BERKAS PRESTASI</th>
                                <th class="text-center">BERKAS PENGHASILAN ORANG TUA</th>
                                <?php if($b['status_berkas'] == 'N' && $b['catatan_berkas'] != '' && $b['berkas_revisi'] != '') { ?>
                                        <th class="text-info">BERKAS REVISI</th>
                                <?php }elseif($b['status_berkas'] == 'Y' && $b['catatan_berkas'] == '' && $b['berkas_revisi'] != '') {?>
                                    <th class="text-info">BERKAS REVISI</th>
                                <?php } ?>

                                <?php if($b['status_berkas'] == 'N') { ?>
                                        <th class="text-center">CATATAN BERKAS</th>
                                <?php } ?>
                                <th class="text-center">STATUS BERKAS</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $i=1;
                        foreach($pendaftar as $data) :  ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['npm'] ?></td>
                                <td><?= $data['nama_mhs'] ?></td>



                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_permohonan/'.$data['berkas_surat_permohonan']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i>
                                        <?=  $data['berkas_surat_permohonan']?>
                                            
                                </td>

                                <td class="text-center"> 
                                <a href="<?=base_url('berkas_mhs/berkas_ktm/'.$data['berkas_ktm']) ?>" target="_blank" 
                                class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?= $data['berkas_ktm'];  ?> </a>
                                </td>
                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_ket_tdk_mampu/'.$data['berkas_ket_tidakmampu']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?= $data['berkas_ket_tidakmampu']; ?> </a>
                                </td>
                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_tdk_beasiswa_lain/'.$data['berkas_tidak_adabeasiswa_lain']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?=$data['berkas_tidak_adabeasiswa_lain']; ?> </a>
                                </td>
                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_pkk/'.$data['berkas_sertifikat_pkk']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?=$data['berkas_sertifikat_pkk']; ?> </a>
                                </td>
                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_kk/'.$data['berkas_kk']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?=$data['berkas_kk']; ?> </a>
                                </td>
                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_ipk/'.$data['berkas_ipk']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?= $data['berkas_ipk']; ?> </a>
                                </td>
                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_prestasi/'.$data['berkas_prestasi']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?= $data['berkas_prestasi']; ?> </a>
                                </td>

                                <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkas_gaji/'.$data['berkas_gaji_hasil_ortu']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?= $data['berkas_gaji_hasil_ortu']; ?> </a>
                                </td>

                                <?php if($data['status_berkas'] == 'N' && $data['catatan_berkas'] != '' && $data['berkas_revisi'] != '') { ?>
                                    <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkasRevisi/'.$data['berkas_revisi']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?= $data['berkas_revisi']; ?> </a>
                                </td>
                                <?php } ?>

                                <?php if($data['status_berkas'] == 'Y' && $data['catatan_berkas'] == '' && $data['berkas_revisi'] != '') { ?>
                                    <td class="text-center"> <a href="<?=base_url('berkas_mhs/berkasRevisi/'.$data['berkas_revisi']) ?>" target="_blank" class="btn btn-primary btn-sm "> 
                                        <i class="fas fa-download"></i> <?= $data['berkas_revisi']; ?> </a>
                                    </td>
                                <?php } ?>

                                <?php if($data['status_berkas'] == 'N') { ?>
                                        <td class="text-center"><span class="badge badge-info ?>">
                                                  <?php echo $data['catatan_berkas']; ?></span>          
                                        </td>
                                <?php } ?>
                                



                                <?php
                                                    $warna = " ";
                                                    $a = " ";
                                                    if ($data['status_berkas'] == "B" && $data['catatan_berkas'] == '' && $data['berkas_revisi'] == '') {
                                                        $warna = "info";
                                                        $a = "Belum Diverifikasi";
                                                    } else if ($data['status_berkas'] == "Y" && $data['catatan_berkas'] == '' && $data['berkas_revisi'] != '') {
                                                        $warna = "success";
                                                        $a = "Selesai Diverifikasi";
                                                    } elseif($data['status_berkas'] == "N" && $data['catatan_berkas'] != '' && $data['berkas_revisi'] == '') {
                                                        $warna = "danger";
                                                        $a = "Sudah Diverifikasi, dengan catatan".' '.$data['catatan_berkas'];
                                                    }elseif($data['status_berkas'] == "N" && $data['catatan_berkas'] != '' && $data['berkas_revisi'] != '') {
                                                        $warna = "warning";
                                                        $a = "file sudah diperbaki, menunggu diverifikasi ulang";
                                                    }
                                                ?>

                                            <td class="text-center"><span class="badge badge-<?= $warna; ?>">
                                                <?php echo $a; ?></span>  

                                            </td>

                                <td>
                                                    
                                                   <a href="<?php echo base_url('Backend/pendaftar_mhs/verifikasi/'.$data['npm']); ?>" class="btn btn-xs btn-info _btn" 
                                                    data-toggle="tooltip" title="Lengkap" > 
                                                             <i class="fas fa-check"></i>
                                                    </a>

                                                    <button  class="btn btn-xs btn-danger _btn" title="Belum Lengkap" data-toggle="modal" data-target="#block<?= $data['npm'] ?>">
                                                                            <i class="fa fa-fw fa-ban"></i>                             
                                                   </button>

                                                    <!-- <a href="<?php echo base_url('Backend/pendaftar_mhs/tolak/'.$data['npm']); ?>" class="btn btn-xs btn-danger _btn" 
                                                    data-toggle="tooltip" title="Belum Lengkap" > 
                                                             <i class="fas fa-fw fa-ban"></i>
                                                    </a> -->
                                                    
                                              </td>
                            </tr>
                         <?php endforeach; ?>   
                        </tbody>
                      </table>
          </div>
              <!-- /.card-body -->

<!-- akhir edit data -->
     </div>

     <a href="/backend/pendaftar_mhs" type="button" class="btn btn-warning float-left">Kembali</a>


                        <!-- akses tolak -->
                        <?php foreach($pendaftar as $data1) { ?> 
                            <div class="modal fade" id="block<?= $data1['npm'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CATATAN</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?= base_url('Backend/pendaftar_mhs/tolak/'.$data['npm']); ?>" method="post" >
                                                <?= csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label> Catatan </label>
                                                        <textarea name="catatan" class="form-control" cols="10" rows="2" maxlength="200"></textarea>
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

                        </div>
                        <!-- akhir akses tolak -->

