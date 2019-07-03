
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
	          <div class="row">
	            <div class="col-md-6">
	            
	              <div class="form-group has-feedback">
	              	<label>Nombres</label>
	                <input type="text" class="form-control" placeholder="">
			        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            
	              <div class="form-group has-feedback">
	              	<label>Apellidos</label>
	                <input type="text" class="form-control" placeholder="">
			        <span class="glyphicon glyphicon-user form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            
	              <div class="form-group has-feedback">
	              	<label>Email/Usuario</label>
	                <input type="email" class="form-control" placeholder="">
			        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            </div>
	            <!-- /.col -->
	            <div class="col-md-6">
	            
	              <div class="form-group has-feedback">
	              	<label>Contraseña</label>
	                <input type="password" class="form-control" placeholder="******">
        			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->
	            
	              <div class="form-group has-feedback">
	              	<label>Repetir contraseña</label>
			        <input type="password" class="form-control" placeholder="******">
			        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
	              </div>
	              <!-- /.form-group -->

	              <div class="form-group">
	                <label>Perfil</label>
	                <select class="form-control select2" style="width: 100%;">
	                  <option selected="selected">SUPERVISOR</option>
	                  <option>ADMINISTRADOR</option>
	                </select>
	              </div>
	              <!-- /.form-group -->
	            </div>
	            <!-- /.col -->
	          </div>
	          <!-- /.row -->
	        </div>
	        <!-- /.box-body -->
	        <div class="box-footer">
	         
	            <div class="container">            	
	            	<div class="col-md-12" align="center">
	            		<a href="<?php echo base_url();?>administrador/usuario/crear" class="btn btn-primary btn-flat btn-success"><span class="fa fa-plus"></span> Guardar Usuario</a>
	            	</div>
	            </div>

	            <br>
	        </div>
	      </div>








        </section>  <!-- container-fluid -->

      </section>
      <!-- /.content -->
  </div>