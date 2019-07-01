
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
