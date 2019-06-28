

<script>
  $(function () {
    "use strict";

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'total_vacas',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a", "#ffff00 "],
      data: [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20},
        {label: "Mail-Order Sales", value: 20}
      ],
      data: <?php echo $estado;?>,
      hideHover: 'auto'
    });
  });

  //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      data: <?php echo $produccion;?>,
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Litros Leche'],
      hideHover: 'auto'
    });
    //BAR CHART
    var bar2 = new Morris.Bar({
      element: 'bar-chart2',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      data: <?php echo $vacas;?>,
      barColors: ['#f56954'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Litros Leche'],
      hideHover: 'auto'
    });

    //BAR CHART2
    /*
    var bar2 = new Morris.Bar({
      element: 'bar-chart2',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });*/

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
