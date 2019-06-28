



<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->


<script>
  $(function () {
    $('#tabla_de_usuarios').DataTable({
      'searching'   : true,
      'paging'      : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    : {
        'lengthMenu'        : 'Mostrar  _MENU_  registros por página',
        'zeroRecords'       : 'No se encontraron resultados en la busqueda',
        'searchPlaceholder' : "Buscar registros",
        'info'              : 'Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros',
        'infoEmpty'         : 'No existen registros', 
        'search'            : 'Buscar:  ',
        'paginate'  :{
           'first' : 'Primero', 
           'last' : 'Último', 
           'next' : 'Siguiente', 
           'previous' : 'Anterior', 
        },
      },
    });
  })
</script>
