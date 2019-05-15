<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content container">


        <section class="content">
        <!--------------------------
        | Your Page Content Here |
        -------------------------->
        	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Data Table With Full Features</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  <th>ID</th>
		                  <th>Nombre</th>
		                  <th>Registro</th>
		                  <th>Raza</th>
		                  <th>Mas Información</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php if(!empty($ganados)): ?>
			                <?php foreach ($ganados as $ganado): ?>		
				                <tr>
				                  <td> <?php echo $ganado->vaca_id; ?> </td>
				                  <td> <?php echo $ganado->nombre; ?> </td>
				                  <td> <?php echo $ganado->registro; ?> </td>
				                  <td> <?php echo $ganado->raza; ?> </td>
				                  <th>
				                  	<div class="">
				                  		<center>
				                  			<a href="#" class="btn btn-xs btn-success"><span class="fa fa-eye"> </span></a>	                  			
				                  		</center>
				                  	</div>
				                  </th>
				                </tr>
				            <?php endforeach; ?>
		            	<?php endif; ?>
	                </tbody>

	              </table>
	            </div>
	            <!-- /.box-body -->
	        </div>
	        <!-- /.box -->







        </section>  <!-- container-fluid -->

      </section>
      <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
