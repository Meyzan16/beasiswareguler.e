<!-- ======= Contact Section ======= -->
<?php $this->db = db_connect(); ?>

<section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">

                            <div class="card col-lg-5">
                              <div class="card-body login-card-body">
                                        <div class="py-3 section-title">
                                            <h2 class="text-center">SILAHKAN LOGIN</h2>
                                            <p></p>
                                        </div>

                                    <?php echo session()->getflashdata('massage'); ?>    

                                    <form action="<?php echo base_url('Auth/cek_login'); ?>" method="post">
                      
                                            <div class="input-group mb-3 col-md-12">
                                              <input type="text" class="form-control" placeholder="username" name="username" id="username" onkeyup="upper()" autofocus required>
                                              <div class="input-group-append">
                                                <div class="input-group-text">
                                                  <span class="fas fa-envelope"></span>
                                                </div>
                                              </div>
                                            </div>


                                            <div class="input-group mb-3 col-md-12">
                                                  <input type="password" class="form-control" placeholder="Password" name="password" autofocus required >
                                                  <div class="input-group-append">
                                                    <div class="input-group-text">
                                                      <span class="fas fa-lock"></span>
                                                    </div>
                                                  </div>
                                            </div>


                                                              
                                                <div class="col-md-3">
                                                  <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                                                </div>
                                              <!-- /.col -->
                                      
                                    </form>


                                
                              </div>
                              <!-- /.login-card-body -->
                            </div>

                            

                    </div>
    

            </div>

</section>

<script>
		function upper() {
			const word = document.getElementById('username');
			word.value = word.value.toUpperCase();
		}
	</script>
    



   
  