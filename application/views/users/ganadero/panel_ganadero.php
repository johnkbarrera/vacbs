<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="background-color:#ffaaff">
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
          <!-- /.box-body -->

          <h2>Resumen</h2>
<!-- NEW SECCION -->
          <div class="row">
            <div class="col-md-5">
              <!-- DONUT CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Recuento total de Vacas por Estado</h3>
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
                    <h3><?php echo $lista_indicadores['establos']; ?></h3>
                    <h4>Establos</h4>
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
                    <h3><?php echo $lista_indicadores['ganado_x_establo']; ?></h3>
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
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php echo $lista_indicadores['produccion_x_establo']; ?></h3>
                    <h4>Producción por Establo (&mu;)</h4>
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
                    <h3><?php echo $lista_indicadores['producion_x_ganado']; ?></h3>
                    <h4>Producción por Ganado (&mu;)</h4>
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


          <h2>Mis Establos</h2>
<!-- NEW SECCION -->
          <div class="row">
            <?php if(!empty($lista_establos)): ?>
              <?php foreach ($lista_establos as $establo): ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-ligth-brown"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"> <?php echo $establo['establo_id']; ?></span>
                      <span class="info-box-text"> <?php echo $establo['nombre']; ?></span>
                      <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                      <span class="info-box-number">90<small>%</small></span>
                    </div>
                  <!-- /.info-box-content -->
                  </div>
                <!-- /.info-box -->
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>


          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

                    <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart2" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->




        </section>  <!-- container-fluid -->

      </section>
      <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
