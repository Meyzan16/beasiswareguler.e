 <main id="main">
   
    <!-- ======= Skills Section ======= -->
    <section id="about" class="skills">
      <div class="container" data-aos="fade-up">
       <div class="section-title">
          <h2>informasi</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="<?= base_url() ?>/template_frontend/assets/img/skills.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <?php foreach($informasi as $data) { ?> 
            
            <?php } ?>

            <p class="font-bold"> <?= $data['isi_informasi'] ?>
            </p>

            <div class="skills-content">

              

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>dokumen</h2>
              <p>Silahkan Download Berkas Yang Di Perlukan</p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table id="example" class="table table-bordered ">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul Dokumen</th>
                            <th class="text-center">Download</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                          $i=1;
                          foreach($dokumen as $data) : ?>
                          <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <td class="text-center"><?= $data['judul_dokumen'] ?></td>
                            <td class="text-center" > <a href="<?=base_url('file/'.$data['upload_file']) ?>" target="_blank" class="btn btn-primary btn-sm "> <i class="fa-download"></i> Download</a></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>
            </div>

      </div>
   
    </section><!-- End Services Section -->



    

  </main><!-- End #main -->



  