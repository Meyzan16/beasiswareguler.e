<!-- ======= Contact Section ======= -->
<?php $this->db = db_connect(); ?>

<section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>PENGUMUMAN</h2>
              <?php foreach ($pengumuman as $data) { ?>                
              <?php } ?>
            </div>
            
            <?php if($data['status'] == 'belum umumkan') { ?>
              <p class="text-center" style="font-size: 20px; color: black;" > Belum Ada Pengumuman</p>
            <?php } else { ?>
              <h3 class="text-center"><?= $data['judul_pengumuman'] ?></h3>
                <div class="row">
                    <div class="col-lg-12"> 
                    <br>                     
                      
                      <div style="font-size:25px;" class ="text-center">
                      <a target="_blank" href="<?=base_url('file_pengumuman/'.$data['upload_file']) ?>"> Download Disini</a>
                      
                      </div>

                    </div>
                </div>
            <?php } ?>

      </div>
   
    </section><!-- End Services Section -->






   
  