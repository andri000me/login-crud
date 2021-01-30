  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= $abs; ?>/backend/layouts/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= $abs; ?>/backend/layouts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= $abs; ?>/backend/layouts/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= $abs; ?>/backend/layouts/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="<?= $abs; ?>/backend/layouts/dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="<?= $abs; ?>/backend/layouts/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?= $abs; ?>/backend/layouts/plugins/raphael/raphael.min.js"></script>
  <script src="<?= $abs; ?>/backend/layouts/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?= $abs; ?>/backend/layouts/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= $abs; ?>/backend/layouts/plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="<?= $abs; ?>/backend/layouts/dist/js/pages/dashboard2.js"></script>
  <!-- DataTables -->
  <script src="<?= $abs; ?>/backend/layouts/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= $abs; ?>/backend/layouts/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= $abs; ?>/backend/layouts/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= $abs; ?>/backend/layouts/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

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
  </script>