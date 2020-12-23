<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b>1.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="#">PT.New Cakti</a>.</strong> All right reserved.
</footer>
<!-- jQuery 3 -->
<script src="<?=base_url();?>/asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>/asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>/asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>/asset/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url();?>/asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?=base_url();?>/asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url();?>/asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url();?>/asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url();?>/asset/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>/asset/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>/asset/dist/js/demo.js"></script>
<script src="<?=base_url();?>/asset/js/sweetalert2.all.min.js"></script>
<script src="<?=base_url();?>/asset/js/myscript.js"></script>
<!-- DataTables -->
<script src="<?=base_url();?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

