<!-- ======= Footer ======= -->
  <footer id="footer">

   

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Fakultas Teknik</span></strong>. Universitas Bengkulu
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="">adzanmagrib.e</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>/template_frontend/assets/vendor/aos/aos.js"></script>

  <script type="text/javascript" charset="utf8" src="<?= base_url() ?>/template_frontend/DataTables/datatables.js"></script>

  <script>
      $(document).ready(function() {
    $('#example').DataTable();
} );  
  </script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/template_frontend/assets/js/main.js"></script>

     <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    
    window.setTimeout(function() {
          $(".autohide").fadeTo(1000, 0).slideUp(1000, function() {
              $(this).remove();
          });
      }, 9000);
  </script>	

</body>

</html>