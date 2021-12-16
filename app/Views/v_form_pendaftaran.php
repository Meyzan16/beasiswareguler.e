<?php $this->db = db_connect(); ?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
      
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center;">Data Diri</h4>
                  <form class="forms-sample" action="/form_pendaftaran/simpan_data" method="post" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                        <div class="row">
                              <div class="form-group col-md-6"">
                                <label for="exampleInputName1">Npm</label>
                                <input type="text" class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" name="npm" id="exampleInputName1" placeholder="NPM" value="<?= session()->get('npm'); ?>"  readonly>
                                <div class="invalid-feedback">
                                                    <?= $validation->getError('npm'); ?>
                                    </div>
                              </div>

                              <div class="form-group col-md-6"">
                                <label for="exampleInputName1">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Name" value="<?= session()->get('nama'); ?>"  readonly>
                              </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Jenis Kelamin</label>
                                <input type="text" class="form-control" name="nama" id="exampleInputName1" placeholder="Name" value="<?= session()->get('jenkel'); ?>"  readonly>
                            </div>

                            <div class="form-group col-md-6">
                                    <label for="name">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl" id="tgl" required  value="<?= session()->get('tgl_lahir'); ?>"  readonly> 
                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Tempat Lahir</label>
                                <input type="text" name="tl" class="form-control" id="tl" required  value="<?= old('tl'); ?>">
                            </div>

                            <div class="form-group col-md-6">
                            <label for="name">Program Studi</label>    
                            <input type="text" class="form-control" name="tgl" id="tgl"   value="<?= session()->get('nama_prodi'); ?>"  readonly>             
                            </div>
                        </div>

                         <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="name">Semester</label>
                                  <input type="text" name="smt"  value="<?= old('smt'); ?>"  required maxlength="1" class="form-control <?= ($validation->hasError('smt')) ? 'is-invalid' : ''; ?>" >
                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('smt'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                        <label for="ipk">IPK</label>
                                        <?php $b = $this->db->query("SELECT * FROM kriteria_ipk")->getResultArray(); ?>
                                            <select name="ipk"  class="form-control <?= ($validation->hasError('ipk')) ? 'is-invalid' : ''; ?>" required >    
                                            <option value="" >Pilih Data</option>  
                                            <?php foreach($b as $a) : ?>
                                                <option value="<?= $a['id_ipk'] ?>"><?=$a['nilai_ipk'] ?></option>
                                            <?php endforeach; ?>    
                                            </select>
                                            <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('ipk'); ?>
                                             </div>
                                    </div>    
                        </div>

                        <div class="row">
                               <div class="form-group col-md-6">
                                  <label for="name">Nama Bank</label>
                                  <?php $nama_bank = $this->db->query("SELECT * FROM data_mahasiswa")->getResultArray(); ?>
                                  <select name="nama_bank"  class="form-control <?= ($validation->hasError('nama_bank')) ? 'is-invalid' : ''; ?>" required>
                                      <option value="">Pilih Data</option>
                                      <option value="BNI">BNI</option>
                                      <option value="BRI">BRI</option>
                                      <option value="BCA">BCA</option>
                                      <option value="MANDIRI">MANDIRI</option>
                                      <option value="BTN">BTN</option>
                                      <option value="BANK BENGKULU">BANK BENGKULU</option>
                                  </select>  
                                  <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('nama_bank'); ?>
                                             </div>
                                 
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="name">No Rekening</label>
                                  <input type="text" name="rekening" value="<?= old('rekening'); ?>" required class="form-control <?= ($validation->hasError('rekening')) ? 'is-invalid' : ''; ?>"> 
                                  <div class="invalid-feedback autohide" >
                                                    <?= $validation->getError('rekening'); ?>
                                    </div>
                                  <br>
                                  <h6 style="color: red;">*Disarankan Rekening Aktif Mahasiswa YBS</h6>
                              </div>
                              
                              
                        </div>

                        <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="name">Nama rekening</label>
                                  <input type="text" name="nama_rekening" value="<?= old('nama_rekening'); ?>" id="nama_rekening" required class="form-control <?= ($validation->hasError('nama_rekening')) ? 'is-invalid' : ''; ?>"> 
                                  <div class="invalid-feedback autohide" >
                                                    <?= $validation->getError('nama_rekening'); ?>
                                    </div>
                                  <br>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="name">No Hp Mahasiswa</label>
                                  <input type="text" value="<?= old('hp_mhs'); ?>" name="hp_mhs" id="hp_mhs" required maxlength="13" minlength="11" class="form-control <?= ($validation->hasError('hp_mhs')) ? 'is-invalid' : ''; ?>">
                                  <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('hp_mhs'); ?>
                                    </div>
                              </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="ipk">Jumlah Saudara Kandung</label>
                                <?php $b = $this->db->query("SELECT * FROM kriteria_sdr_kdg")->getResultArray(); ?>
                                <select name="sdr_kdg" class="form-control <?= ($validation->hasError('sdr_kdg')) ? 'is-invalid' : ''; ?>"  required>
                                    <option value="">Pilih Data</option>
                                <?php foreach($b as $a) { ?>
                                    <option value="<?=$a['id_sdr_kdg'] ?>"><?= $a['data_kdg'] ?></option>
                                <?php }?>
                                </select>  
                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('sdr_kdg'); ?>
                                             </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ipk">Jumlah Prestasi</label>
                                <?php $b= $this->db->query("SELECT * FROM kriteria_prestasi_nonak")->getResultArray(); ?>
                                <select name="pres_nonak" class="form-control <?= ($validation->hasError('pres_nonak')) ? 'is-invalid' : ''; ?> " required >
                                    <option value="">Pilih Data</option>
                                <?php foreach($b as $a) { ?>
                                    <option value="<?=$a['id_prestasi']; ?>"><?= $a['data_prestasi']; ?></option>
                                <?php } ?>
                                </select> 
                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('pres_nonak'); ?>
                                             </div>
                        </div>
                  
                        <div class="form-group col-md-12">
                                <label for="name" >Alamat Tinggal Mahasiswa</label>
                                <input type="text" name="alamat_mhs" class="form-control" id="alamat_mhs" required value="<?= old('alamat_mhs'); ?>">
                        </div> 
                            
                        <div class="form-group col-md-6">
                                  <label for="name">Nama Ayah</label>
                                  <input value="<?= old('ayah'); ?>" type="text" name="ayah"  id="ayah" required class="form-control <?= ($validation->hasError('ayah')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('ayah'); ?>
                                    </div>
                        </div>

                        <div class="form-group col-md-6">
                                  <label for="name">Pekerjaan Ayah</label>
                                  <input type="text" value="<?= old('pkj_ayah'); ?>" name="pkj_ayah"  id="pkj_ayah" required class="form-control <?= ($validation->hasError('pkj_ayah')) ? 'is-invalid' : ''; ?>">
                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('pkj_ayah'); ?>
                                    </div>
                        </div>
                     
                                  <div class="form-group col-md-6">
                                            <label for="name">Nama Ibu</label>
                                            <input type="text" name="ibu" value="<?= old('ibu'); ?>"  id="ibu" required class="form-control <?= ($validation->hasError('ibu')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback autohide">
                                                              <?= $validation->getError('ibu'); ?>
                                              </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                            <label for="name">Pekerjaan Ibu</label>
                                            <input type="text" name="pkj_ibu" value="<?= old('pkj_ibu'); ?>"  id="pkj_ibu" required class="form-control <?= ($validation->hasError('pkj_ibu')) ? 'is-invalid' : ''; ?>">
                                            <div class="invalid-feedback autohide">
                                                              <?= $validation->getError('pkj_ibu'); ?>
                                              </div>
                                  </div>

                                  <div class="form-group col-md-6">
                                        <label for="name">Alamat Orang Tua</label>
                                        <input type="text" name="alamat_ortu" class="form-control" value="<?= old('hp_ortu'); ?>" id="alamat_ortu" required>
                                  </div>
                                  <div class="form-group col-md-6">
                                                      <label for="name">No Hp Orang Tua</label>
                                                      <input type="text" value="<?= old('hp_ortu'); ?>"     name="hp_ortu" id="hp_ortu" required maxlength="13" minlength="11" class="form-control <?= ($validation->hasError('hp_ortu')) ? 'is-invalid' : ''; ?>">
                                                      <div class="invalid-feedback">
                                                                  <?= $validation->getError('hp_ortu'); ?>
                                                      </div>
                                  </div>

                                    <div class="form-group col-md-6">
                                        <label for="ipk">Penghasilan Orang Tua</label>
                                        <?php $b = $this->db->query("SELECT * FROM kriteria_penghasilan_ortu")->getResultArray(); ?>
                                        <select name="hasil_ortu" id="hasil_ortu" class="form-control <?= ($validation->hasError('hasil_ortu')) ? 'is-invalid' : ''; ?>" required  >
                                            <option value="">Pilih Data</option>
                                        <?php foreach($b as $a) {?>
                                            <option value="<?=$a['id_penghasilan'] ?>"><?= $a['data_penghasilan'] ?></option>
                                        <?php } ?>    
                                        </select>  
                                        <div class="invalid-feedback autohide">
                                                        <?= $validation->getError('hasil_ortu'); ?>
                                                </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ipk">Jumlah tanggungan Orang Tua</label>
                                        <?php $b = $this->db->query("SELECT *FROM kriteria_tanggungan_ortu")->getResult(); ?>
                                        <select name="tanggungan_ortu" class="form-control  <?= ($validation->hasError('tanggungan_ortu')) ? 'is-invalid' : ''; ?>" required>
                                            <option value="">Pilih Data</option>
                                        <?php foreach($b as $a) {?>
                                            <option value="<?=$a->id_tanggungan; ?>"><?= $a->data_tanggungan; ?></option>
                                        <?php } ?>
                                        </select> 
                                        <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('tanggungan_ortu'); ?>
                                             </div>
                                    </div>
               
              </div>

                      <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">Data Berkas</h4> 
                                  <h5 style="color: black; text-align: center;">File Yang DiUnggah Dalam Bentuk PDF</h5>
                                  <h5 style="color: red; text-align: center;">Ukuran File Maksimal 225 KB</h5>  
                                <br>
                                <div class="row">
                                      <div class="form-group col-md-6">
                                                              <label for="name">Surat Permohonan Beasiswa</label>
                                                              <input type="file" name="surat_permohonan" class="form-control <?= ($validation->hasError('surat_permohonan')) ? 'is-invalid' : ''; ?>" id="surat_permohonan" required>
                                                              <div class="invalid-feedback autohide" >
                                                                          <?= $validation->getError('surat_permohonan'); ?>
                                                              </div>
                                      </div>
                                      <div class="form-group col-md-6">
                                                              <label for="name">Surat Keterangan Tidak Mampu</label>
                                                              <input type="file" name="ket_tdk_mampu" class="form-control <?= ($validation->hasError('ket_tdk_mampu')) ? 'is-invalid' : ''; ?>" id="ket_tdk_mampu" required>
                                      <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('ket_tdk_mampu'); ?>
                                        </div>
                                      </div>
                                     
                                </div>

                                 <div class="row">
                                      <div class="form-group col-md-6">
                                                              <label for="name">Surat Keterangan Tidak Mengikuti Beasiswa Lain</label>
                                                              <input type="file" name="ket_tdk_beasiswa_lain" class="form-control <?= ($validation->hasError('ket_tdk_beasiswa_lain')) ? 'is-invalid' : ''; ?>" id="ket_tdk_beasiswa_lain" required>
                                                            <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('ket_tdk_beasiswa_lain'); ?>
                                        </div>
                                                  </div>
                                      <div class="form-group col-md-6">
                                                  <label for="name">File Sertifikat PKK Universitas</label>
                                                  <input type="file" name="sertifikat_pkk" class="form-control <?= ($validation->hasError('sertifikat_pkk')) ? 'is-invalid' : ''; ?>" id="sertifikat_pkk" required>
                                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('sertifikat_pkk'); ?>
                                        </div>
                                      </div>
                                     
                                </div>     

                                <div class="row">
                                    <div class="form-group col-md-6">
                                                  <label for="name">File Kartu Keluarga</label>
                                                  <input type="file" name="file_kk" class="form-control <?= ($validation->hasError('file_kk')) ? 'is-invalid' : ''; ?>" id="file_kk" required>
                                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('file_kk'); ?>
                                        </div>
                                      </div>
                                     
                                      <div class="form-group col-md-6">
                                                  <label for="name">File KTM</label>
                                                  <input type="file" name="file_ktm"  id="file_ktm"  class="form-control <?= ($validation->hasError('file_ktm')) ? 'is-invalid' : ''; ?>" required>
                                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('file_ktm'); ?>
                                                 </div>
                                      </div>
                                </div> 

                                <div class="row">
                                       <div class="form-group col-md-6">
                                                  <label for="name">File Transkip Nilai</label>
                                                  <input type="file" name="file_transkip" class="form-control <?= ($validation->hasError('file_transkip')) ? 'is-invalid' : ''; ?>" id="file_transkip" required>
                                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('file_transkip'); ?>
                                        </div>
                                        </div>
                                      <div class="form-group col-md-6">
                                                  <label for="name">File Prestasi</label>
                                                  <input type="file" name="file_pres" class="form-control <?= ($validation->hasError('file_pres')) ? 'is-invalid' : ''; ?>" id="file_pres" required>
                                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('file_pres'); ?>
                                        </div>
                                                  <br>
                                                  <h6 style="color: red;">Jika banyak prestasi, file berkas dijadikann dalam 1 file saja </h6> 
                                      </div>
                                </div>

                                <div class="form-group">
                                                  <label for="name">File Penghasilan Orang Tua</label>
                                                  <input type="file" name="berkas_gaji_hasil_ortu" class="form-control <?= ($validation->hasError('berkas_gaji_hasil_ortu')) ? 'is-invalid' : ''; ?>" id="berkas_gaji_hasil_ortu" required>
                                                    <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('berkas_gaji_hasil_ortu'); ?>
                                        </div>
                                      </div>

                      </div>
                            
                        
                        <?php 
                            $npmBaru = session()->get('npm');    
                            $date = date('Y');

                            $query = $this->db->query("SELECT * FROM data_mahasiswa WHERE 
                            npm='$npmBaru' AND tahun_pendaftar='$date'")->getRow(); 
                        ?>
                           
                           <?php  if($query) {  ?>
                              <a  href="/Dashboard" type="button" class="btn btn-warning float-left">Cancel</a>
                           <?php  } else { ?>
                              <button type="submit" class="btn btn-primary mr-2 float-right"  onclick="return confirm('Apakah data anda sudah benar ?')">Submit</button>
                              <a  href="/Dashboard" type="button" class="btn btn-warning float-left">Kembali</a
                           <?php } ?>
                      
                  </form>
                  
                </div>
              </div>
            </div>  
            
          </div>
        </div>