
  <div class="content-wrapper">
      <!-- Main content -->
      <section class="content container">


        <section class="content">
        <!--------------------------
        | Your Page Content Here |
        -------------------------->

        
	      <div class="box box-default">
	        <div class="box-header with-border">
	          <h3 class="box-title">Crear Usuario</h3>

	          <!--
	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
	          </div> -->
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body">

	         <?php if($this->session->flashdata("error")):?>
			    	<div class="alert alert-danger">
			    		<p> <?php echo $this->session->flashdata("error")?> </p>
			    	</div>
			 <?php endif; ?>

	        <form action="<?php echo base_url();?>administrador/usuario/crear_action" method="POST">
	          <div class="form-group row">

	            <div class="col-md-6">
	            
	              <div class="form-group has-feedback">
	              	<label>Nombres</label>
	                <input id="nombres" name="nombres" type="text" class="form-control" placeholder="">
			        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            
	              <div class="form-group has-feedback">
	              	<label>Apellidos</label>
	                <input id="apellidos" name="apellidos" type="text" class="form-control" placeholder="">
			        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            
	              <div class="form-group has-feedback">
	              	<label>Email/Usuario</label>
	                <input id="correo" name="correo" type="email" class="form-control" placeholder="">
			        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            </div>
	            <!-- /.col -->
	            <div class="col-md-6">
	            
	              <div class="form-group has-feedback">
	              	<label>Contraseña</label>
	                <input id="contrasenia" name="contrasenia" type="password" class="form-control" placeholder="******">
        			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            
	              <div class="form-group has-feedback">
	              	<label>Repetir contraseña</label>
			        <input id="contrasenia2" name="contrasenia2" type="password" class="form-control" placeholder="******">
			        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->

	              <div class="form-group">
	                <label>Perfil</label>
	                <select id="perfil" name="perfil" class="form-control" style="width: 100%;">
	                  <option value="SUPERVISOR" selected="selected">SUPERVISOR</option>
	                  <option value="ADMINISTRADOR">ADMINISTRADOR</option>
	                </select>
	              </div>
	              <!-- /.form-group -->
	            </div>
	            <!-- /.col -->
	          </div>

	          <div class="form-group">
	          	<center>
		          	<button type="submit" class="btn btn-primary btn-flat btn-success">Guardar Usuario  		
		          	</button>	  	
	          	</center>
	          </div>
	         </form>
	          <!-- /.row -->
	        </div>
	        <!-- /.box-body -->
	        <div class="box-footer">
	         
	            <br>
	        </div>
	      </div>








        </section>  <!-- container-fluid -->

      </section>
      <!-- /.content -->
  </div>