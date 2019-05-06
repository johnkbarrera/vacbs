

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
        {label: "Mail-Order Sales", value: 20},
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
