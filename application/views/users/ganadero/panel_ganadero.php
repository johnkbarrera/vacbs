<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="background-color:#C4DC9A">
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
                    <span class="info-box-icon bg-ligth-brown"><i class="fa fa-home"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text"> <?php echo $establo['establo_id']; ?></span>
                      <span class="info-box-number"><?php echo $establo['nombre']; ?></span>
                      <a href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  <!-- /.info-box-content -->
                  </div>
                <!-- /.info-box -->
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>


<!-- 
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
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>

          </div>
          -->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total de Cabezas de Ganado</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla_de_ganado" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Establo</th>
                    <th>Nombre</th>
                    <th>Registro/COD</th>
                    <th>Raza</th>
                    <th>procedencia</th>
                    <th>Nacimiento</th>
                    <th>Peso</th>
                    <th>Mas Información</th>
                </tr>
              </thead>

                <tbody>
                  <?php if(!empty($lista_ganado)): ?>
                  <?php foreach ($lista_ganado as $g): ?>   
                       <tr>
                         <td> <?php echo $g['e_nombre']; ?> </td>
                         <td> <?php echo $g['nombre']; ?> </td>
                         <td> <?php echo $g['registro']." / Cod-".$g['ganado_id']; ?> </td>
                         <td> <?php echo $g['raza']; ?> </td>
                         <td> <?php echo $g['procedencia']; ?> </td>
                         <td> <?php echo $g['dob']; ?> </td>
                         <td> <?php echo $g['pesodob']; ?> </td>
                         <th>
                            <div class="">
                            <center>
                                <a href="#" class="btn btn-xs btn-success"><span class="fa fa-eye"> </span></a>   
                                <a href="#" class="btn btn-xs btn-warning"><span class="fa fa-pencil"> </span></a>                          
                              </center>
                          </div>
                         </th>
                       </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>


                <tfoot>
                <tr>
                    <th>Establo</th>
                    <th>Nombre</th>
                    <th>Registro/COD</th>
                    <th>Raza</th>
                    <th>procedencia</th>
                    <th>Nacimiento</th>
                    <th>Peso</th>
                    <th>Mas Información</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>




        </section>  <!-- container-fluid -->

      </section>
      <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
