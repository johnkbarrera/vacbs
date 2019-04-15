
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()."public/"; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."public/"; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()."public/"; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()."public/"; ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()."public/"; ?>bower_components/morris.js/morris.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."public/"; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."public/"; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."public/"; ?>dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()."public/"; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."public/"; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>




<script>
  $(function () {
    "use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'total_vacas',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a", "#00a65a"],
      data: [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20}
      ],
      hideHover: 'auto'
    });
  });
</script>

<script>
  $(function () {
    $('#example1').DataTable({
      'searching'   : false,
      'paging'      : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
      'language'    : {
        'lengthMenu'        : 'Mostrar _MENU_ registros por página',
        'zeroRecords'       : 'No se encontraron resultados en la busqueda',
        'searchPlaceholder' : "Buscar registros",
        'info'              : 'Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros',
        'infoEmpty'         : 'No existen registros',
        'paginate'  :{
           'first' : 'Primero', 
           'last' : 'Ultimo', 
           'next' : 'Siguiente', 
           'previous' : 'Anterior', 
        },
      },
    });
  })
</script>




</body>
</html>
