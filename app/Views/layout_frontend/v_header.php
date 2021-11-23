<body>
<?php foreach ($jadwal as $data) { ?>
  <?php } ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">Beasiswa</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="/home">Beranda</a></li>
          <li><a href="#about">Informasi</a></li>
          <li><a href="#services">Dokumen</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <?php if($data['status'] == 'dibuka')  { ?>

            <ul>           
                    <form action="/Daftar_beasiswa" method="post">
                          <button  class="btn" style="   
                          display: flex; float:right;
                          font-family: sans-serif;
                          font-size: 15px;
                          background: #22a4cf;
                          color: white;
                          border-radius: 20px;
                          margin-top: 16px;                    
                          opacity:1;" 
                          type="submit" name="daftar" > Daftar Beasiswa
                            </button>
                  </form>        
            </ul>
       
       <?php } else if($data['status']== 'ditutup') {?>
                <ul>           
                    <form action="/pengumuman_mhs" method="post">
                          <button  class="btn" style="   display: flex; float:right;
                          font-family: sans-serif;
                          font-size: 15px;
                          background: #22a4cf;
                          color: white;
                          border-radius: 20px;
                    
                          margin-top: 16px;
                      
                          opacity:1;" 
                          type="submit" name="pengumuman" > Pengumuman
                            </button>
                  </form>        
            </ul>
        <?php }  ?>
       
        


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1><?= $data['judul'] ?></h1>

                <?php 
                                      $a = $data['tanggal_mulai'];
                                      $b = $data['tanggal_selesai'];
                                      $mulai = strtotime($a);
                                      $selesai = strtotime($b);
                                      $mulaii = date('Y-M-d', $mulai );
                                      $selesaii = date('Y-M-d', $selesai );
                                    ?>

                <?php 

              if($data['status'] == 'dibuka') { ?>
                  <h5 style="color: aliceblue;"> Pendafatran Dibuka : <?=  $mulaii ?> s/d <?= $selesaii ?>
              <?php } else if ($data['status'] == 'ditutup') { ?>
                  <h5 style="color: aliceblue;">  <?= $data1 = "Pendaftaran Sudah Ditutup" ?>
              <?php } else { ?>
                  <h5 style="color: aliceblue;"> <?= $data1 = "Pendaftaran Belum Dibuka" ?>
              <?php } ?>
            
            
   
              </div>
                  <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="/img/<?= $data['upload_file'] ?>" class="img-fluid animated" alt="">
                  </div>
              </div>
              
               

                <div class="row autohide" >
                  <?php echo  session()->getflashdata('massage') ?>
                </div>
              
              
        </div>
      </div>
    </div>


  </section><!-- End Hero -->

  <main id="main">

  