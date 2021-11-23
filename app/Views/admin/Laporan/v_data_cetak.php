<?php $this->db = db_connect(); ?>

<?php if(session()->get('role_id') != 2){ ?>
<div class="col-lg-6">
    <form action=" <?= base_url('Backend/Cetak_laporan/pilih_tahun') ?>" method="post">
        <div class="row ">
                <div class="col-lg-6">
                    <select class="form-control" name="tahun" required>
                    <?php $tahun = $this->db->query("SELECT * FROM data_mahasiswa Group By tahun_pendaftar")->getResultArray(); ?>
                    <option value="" >Pilih Tahun</option>
                        <?php foreach ($tahun as $a) { 
                        $c = ""; 
                        if ($a['tahun_pendaftar'] == $pilih_tahun) $c = "selected";
                        ?>
                            <option value="<?= $a['tahun_pendaftar']; ?>" <?= $c; ?>>
                                <?=  $a['tahun_pendaftar']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
      

                <div class="col-lg-6">
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option > Pilih Kategori </option>
                           
                            <option value="lolos" > LoLos</option>
                            <option value="belum lolos">Belum Lolos</option>
                        </select>

                </div>
            </div>
            
        <br>
                    <div class="row">       
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary btn-block">Cari Data</button>
                        </div>
                    </div>
        <br>
    </form>
</div>
<?php } ?>

