<?php $this->db = db_connect(); ?>
 <div class="container-fluid">
                <div class="row">
            
                    <div class="col-lg-12">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Data Infromasi</h6>
                            </div>

                            <div class="card-body">
                            <?php foreach($informasi as $data) : ?>
                            <?php endforeach ?> 
                                <form action="<?= base_url('Backend/informasi/update') ?>" method="post" >
                                    <?= csrf_field(); ?>
                                     <input type="hidden" name="id_informasi" value="<?= $data['id_informasi']; ?>">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Isi Berita</label>
                                        <div class="col-sm-10">
                                            <textarea name="konten" id="editor"  required> <?php echo $data['isi_informasi'] ?> </textarea>
                                        </div>
                                    </div>
                    
                                    <a href="/backend/informasi" type="button" class="btn btn-warning float-left">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary float-right">Simpan</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>  