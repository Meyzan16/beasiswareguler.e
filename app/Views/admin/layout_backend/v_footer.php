<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        adzanmagrib.e
    </div>
    <!-- Default to the left -->
    <strong>Copyright Fakultas Teknik Universitas Bengkulu .
</footer>
</div>

<script src="<?= base_url() ?>/template_backend/plugins/jquery-1.10.2.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template_backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/template_backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/template_backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/template_backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/template_backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template_backend/dist/js/adminlte.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template_backend/dist/js/demo.js"></script>
<!-- page script -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    initSample();
    window.setTimeout(function() {
          $(".autohide").fadeTo(500, 0).slideUp(500, function() {
              $(this).remove();
          });
      }, 8000);
</script>

</body>

</html>