
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content container">


        <section class="content">
        <!--------------------------
        | Your Page Content Here |
        -------------------------->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Panel de Administración de usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabla_de_usuarios" class="table table-bordered table-striped">
                <thead>
		            <tr>
		                <th>ID</th>
		                <th>Usuario</th>
		                <th>Nombre</th>
		                <th>Apellidos</th>
		                <th>Correo</th>
		                <th>Perfil</th>
		                <th>Mas Información</th>
		            </tr>
	            </thead>

                <tbody>
	                <?php if(!empty($usuarios)): ?>
			            <?php foreach ($usuarios as $usuario): ?>		
				               <tr>
				                 <td> <?php echo $usuario->usuario_id; ?> </td>
				                 <td> <?php echo $usuario->usuario; ?> </td>
				                 <td> <?php echo $usuario->nombres; ?> </td>
				                 <td> <?php echo $usuario->apellidos; ?> </td>
				                 <td> <?php echo $usuario->correo; ?> </td>
				                 <td> <?php echo $usuario->perfil; ?> </td>
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
		                <th>ID</th>
		                <th>Usuario</th>
		                <th>Nombre</th>
		                <th>Apellidos</th>
		                <th>Correo</th>
		                <th>Perfil</th>
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