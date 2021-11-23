<?php $this->db = db_connect(); ?>
<?php foreach($pendaftar as $data) {?>

<?php } ?>

<div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Data <?= $data['npm'] ?></h6>
                            </div>
                            <div class="card-body">   
                                <form action="/backend/pendaftar_mhs/update/<?= $data['npm']; ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="npm" value="<?= $data['npm']; ?>">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">NPM</label>
                                            
                                                <input type="text" class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" 
                                                placeholder="npm"   readonly  value="<?= $data['npm'];?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('npm'); ?>
                                                </div>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nama</label>       
                                                <input readonly value="<?= $data['nama_mhs'];?>" type="text" class="form-control<?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" name="nama"
                                                 placeholder="nama" value="<?= old('nama'); ?>" >
                                                  <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Jenis Kelamin</label>                      
                                            <input readonly value="<?= $data['jenkel'];?>" type="text" class="form-control<?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" name="nama"
                                                 placeholder="nama" >                                     
                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Lahir</label>       
                                                <input readonly value="<?= $data['tgl_lahir'];?>" type="date" class="form-control<?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="tgl" name="tgl"
                                                 placeholder="tgl" value="<?= old('tgl'); ?>" >
                                                  <div class="invalid-feedback">
                                                    <?= $validation->getError('tgl'); ?>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Tempat Lahir</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('tempat')) ? 'is-invalid' : ''; ?>" 
                                                name="tempat" placeholder="tempat"   value="<?= $data['tempat_lahir'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('tempat'); ?>
                                                </div>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Prodi</label>       
                                            <input readonly value="<?= $data['nama_prodi'];?>" type="text" class="form-control<?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" name="nama"
                                                 placeholder="nama" value="<?= old('nama'); ?>" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Semester</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('smt')) ? 'is-invalid' : ''; ?>" 
                                                name="smt" placeholder="smt" maxlength="1"   value="<?= $data['semester'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('semester'); ?>
                                                </div>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Ipk</label>       
                                                <select class="form-control" id="ipk" name="ipk"  >
                                                    <option value="<?= $data['id_ipk'] ?>"> <?= $data['nilai_ipk'] ?></option>               
                                                    <?php $b = $this->db->query("SELECT * FROM kriteria_ipk")->getResultArray(); ?>
                                                    <?php foreach($b as $b) : ?>            
                                                        <?php if($b['id_ipk']  != $data['id_ipk']) { ?>
                                                            <option value="<?= $b['id_ipk'] ?>"> <?= $b['nilai_ipk'] ?></option>  
                                                        <?php }  ?>                                          
                                                    <?php endforeach; ?>                               
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">No Rekening</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('norek')) ? 'is-invalid' : ''; ?>" 
                                                name="norek" placeholder="norek"   value="<?= $data['no_rek_mhs'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('norek'); ?>
                                                </div>                       
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">No Hp Mahasiswa</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('hp_mhs')) ? 'is-invalid' : ''; ?>" 
                                                name="hp_mhs" placeholder="hp_mhs"  value="<?= $data['no_hp_mhs'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('hp_mhs'); ?>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Jumlah Saudara Kandung</label>
                                                <select class="form-control" id="sdr_kdg" name="sdr_kdg"  >
                                                    <option value="<?= $data['id_sdr_kdg'] ?>"> <?= $data['data_kdg'] ?></option>               
                                                    <?php $b = $this->db->query("SELECT * FROM kriteria_sdr_kdg")->getResultArray(); ?>
                                                    <?php foreach($b as $b) : ?>            
                                                        <?php if($b['id_sdr_kdg']  != $data['id_sdr_kdg']) { ?>
                                                            <option value="<?= $b['id_sdr_kdg'] ?>"> <?= $b['data_kdg'] ?></option>  
                                                        <?php }  ?>                                          
                                                    <?php endforeach; ?>                               
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Prestasi</label>       
                                                <select class="form-control" id="prestasi" name="prestasi"  >
                                                    <option value="<?= $data['id_prestasi'] ?>"> <?= $data['data_prestasi'] ?></option>               
                                                    <?php $b = $this->db->query("SELECT * FROM kriteria_prestasi_nonak")->getResultArray(); ?>
                                                    <?php foreach($b as $b) : ?>            
                                                        <?php if($b['id_prestasi']  != $data['id_prestasi']) { ?>
                                                            <option value="<?= $b['id_prestasi'] ?>"> <?= $b['data_prestasi'] ?></option>  
                                                        <?php }  ?>                                          
                                                    <?php endforeach; ?>                               
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                            <label for="name">Alamat Mahasiswa</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" 
                                                name="alamat" placeholder="alamat"   value="<?= $data['alamat_mhs'];?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('alamat'); ?>
                                                </div>                     
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama Ayah</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('ayah')) ? 'is-invalid' : ''; ?>" 
                                                name="ayah" placeholder="ayah"   value="<?= $data['nama_ayah'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('ayah'); ?>
                                                </div>                       
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">Pekerjaan Ayah</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('pkj_ayah')) ? 'is-invalid' : ''; ?>" 
                                                name="pkj_ayah" placeholder="pkj_ayah"   value="<?= $data['pkj_ayah'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('pkj_ayah'); ?>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama ibu</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('ibu')) ? 'is-invalid' : ''; ?>" 
                                                name="ibu" placeholder="ibu"   value="<?= $data['nama_ibu'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('ibu'); ?>
                                                </div>                       
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">Pekerjaan ibu</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('pkj_ibu')) ? 'is-invalid' : ''; ?>" 
                                                name="pkj_ibu" placeholder="pkj_ibu"   value="<?= $data['pkj_ibu'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('pkj_ibu'); ?>
                                                </div>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Penghasilan Ortu</label>
                                                <select class="form-control" id="penghasilan" name="penghasilan"  >
                                                    <option value="<?= $data['id_penghasilan'] ?>"> <?= $data['data_penghasilan'] ?></option>               
                                                    <?php $b = $this->db->query("SELECT * FROM kriteria_penghasilan_ortu")->getResultArray(); ?>
                                                    <?php foreach($b as $b) : ?>            
                                                        <?php if($b['id_penghasilan']  != $data['id_penghasilan']) { ?>
                                                            <option value="<?= $b['id_penghasilan'] ?>"> <?= $b['data_penghasilan'] ?></option>  
                                                        <?php }  ?>                                          
                                                    <?php endforeach; ?>                               
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Jumlah Tangguan Ortu</label>       
                                                <select class="form-control" id="tanggungan_ortu" name="tanggungan_ortu"  >
                                                    <option value="<?= $data['id_tanggungan'] ?>"> <?= $data['data_tanggungan'] ?></option>               
                                                    <?php $b = $this->db->query("SELECT * FROM kriteria_tanggungan_ortu")->getResultArray(); ?>
                                                    <?php foreach($b as $b) : ?>            
                                                        <?php if($b['id_tanggungan']  != $data['id_tanggungan']) { ?>
                                                            <option value="<?= $b['id_tanggungan'] ?>"> <?= $b['data_tanggungan'] ?></option>  
                                                        <?php }  ?>                                          
                                                    <?php endforeach; ?>                               
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Alamat Ortu</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('alamat_ortu')) ? 'is-invalid' : ''; ?>" 
                                                name="alamat_ortu" placeholder="alamat_ortu"   value="<?= $data['alamat_ortu'];?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('alamat_ortu'); ?>
                                                </div>                       
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">No hp Ortu</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('no_hp_ortu')) ? 'is-invalid' : ''; ?>" 
                                                name="no_hp_ortu" placeholder="no_hp_ortu"   value="<?= $data['no_hp_ortu'];?>">
                                                <div class="invalid-feedback autohide">
                                                    <?= $validation->getError('no_hp_ortu'); ?>
                                                </div>
                                            
                                        </div>
                                    </div>

                    
                                    <a href="/backend/pendaftar_mhs" type="button" class="btn btn-warning float-left">Kembali</a>
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

</div>