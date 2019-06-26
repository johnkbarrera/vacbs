<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="background-color:#E3FFD1">
      <!-- Main content -->
      <section class="content container">


        <section class="content">
        <!--------------------------
        | Your Page Content Here |
        -------------------------->

<!-- NEW SECCION 
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Detalles</h3>
            </div>
            <div class="box-body">
              The great content goes here
            </div>
          </div>
           /.box-body -->

          <h2>Resumen</h2>
<!-- NEW SECCION -->
          <div class="row">
            <div class="col-md-5">
              <!-- DONUT CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Recuento total de vacas por estado</h3>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="total_vacas" style="height: 220px; position: relative;"></div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-7">      
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3><?php echo $ganaderos; ?></h3>
                    <h4>Ganaderos</h4>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><?php echo $establos; ?></h3>
                    <h4>Establos por Ganadero (&mu;)</h4>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php echo $ganados; ?></h3>
                    <h4>Ganados por Establo (&mu;)</h4>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3><?php echo $produccion; ?></h3>
                    <h4>Promedio de Producción (&mu;)</h4>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->


            </div>
            <!-- /.col (RIGHT) -->
          </div>
          <!-- /.row -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Número de Vacunos en  Producción</h3>

            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart2" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Producción lechera promedio</h3>

            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         

        </section>  <!-- container-fluid -->

      </section>
      <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
