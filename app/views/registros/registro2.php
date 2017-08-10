<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>
 
 <?php 

	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }

 $attr = array('class' => 'form-horizontal', 'id'=>'form_reg_participantes','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
 echo form_open('validar_registros', $attr);
?>		
<div class="container registro-usuarios">	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="text-center">REGISTRO DE USUARIOS</h1>
		</div>
	</div>

	<div class="row">
		
			<div class="panel-body">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

					<div class="form-group">
						<label for="nombre" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Nombre:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
							<span class="help-block" style="color:white;" id="msg_nombre"> </span> 
						</div>
					</div>

					<div class="form-group">
						<label for="apellidos" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Apellido(s):</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellido (s)">
							<span class="help-block" style="color:white;" id="msg_apellidos"> </span> 
						</div>
					</div>

					<div class="form-group">
						<label for="nick" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Nombre de usuario:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="nick" name="nick" placeholder="Nombre de usuario">
							<span class="help-block" style="color:white;" id="msg_nick"> </span> 
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Correo electrónico:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico">
							<span class="help-block" style="color:white;" id="msg_email"> </span> 
						</div>
					</div>

					<div class="form-group">
						<label for="pass_1" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Contraseña:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control" id="pass_1" name="pass_1" placeholder="Contraseña">
							<span class="help-block" style="color:white;" id="msg_pass_1"> </span> 
						</div>
					</div>

					<div class="form-group">
						<label for="pass_2" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Confirmar Contraseña:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control" id="pass_2" name="pass_2" placeholder="Confirmar Contraseña">
							<span class="help-block" style="color:white;" id="msg_pass_2"> </span> 
						</div>
					</div>					
					
				</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

			
					<div class="form-group">

						<label for="fecha_nac" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Fecha de nacimiento:</label>
						<div class="fecha_nac col-lg-9 col-md-9 col-sm-9 col-xs-9">
						  <input type="hidden" id="fecha_nac"  class="form-control">
						</div>
						<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 col-xs-offset-3">
							<span class="help-block" style="color:white;" id="msg_fecha_nac"> </span>
						</div>
					</div>

					<!--<div class="form-group">
						<label for="fecha_nac" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Fecha de nacimiento:</label>
						<div class="input-group date nac col-lg-9 col-md-9 col-sm-9 col-xs-9">
						  <input id="fecha_nac" name="fecha_nac" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span> 
						</div>
						<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 col-xs-offset-3">
							<span class="help-block" style="color:white;" id="msg_fecha_nac"> </span>
						</div>
					</div>-->


					<div class="form-group">
						<label for="id_estado" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Estado:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<select name="id_estado" id="id_estado" class="form-control">
									<?php foreach ( $estados as $estado ){ ?>
											<option value="<?php echo $estado->id; ?>"><?php echo $estado->nombre; ?></option>
											
									<?php } ?>
							</select>
							<!-- <span class="help-block" style="color:white;" id="msg_id_estado"> </span> -->
						</div>
					</div>

					<div class="form-group">
						<label for="celular" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Teléfono celular:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="celular" name="celular" placeholder="Teléfono celular">
							<span class="help-block" style="color:white;" id="msg_celular"> </span> 
						</div>
					</div>

					<div class="form-group">
						<label for="telefono" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Teléfono fijo:</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número Teléfono">
							<span class="help-block" style="color:white;" id="msg_telefono"> </span> 
						</div>
					</div>		


				<?php if ( isset($premios) && !empty($premios) ) { ?>
                <div class="form-group">
                    <label class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Qué plataforma prefieres:</label>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <div class="icheck-inline">
                        		<?php $cantidad = count($premios); 
									$cantidad = 12/$cantidad;
								?>

                          <?php foreach ( $premios as $premio ){ ?>
                          	<div class="col-sm-4 col-md-<?php echo $cantidad; ?> text-center">
                             <label>
                                <input type="radio" class="icheck1" name="id_premio" value="<?php echo $premio->id; ?>" checked class="icheck"> <?php echo $premio->nombre; ?> 
                             </label>
                             </div>
                          <?php } ?>      
                        </div>
                        <p class="legal">Sujeto a disponibilidad</p>
                    </div>
                </div>

                <?php } ?>		
												




				
				</div>
			

									









					

 		  <div class="col-lg-4 col-lg-offset-5 col-md-4 col-md-offset-5 col-sm-12 col-xs-12 legales">	

 		  	

              <input class="css-checkbox" type="checkbox" id="coleccion_id_aviso" value="1"  name="coleccion_id_aviso" />
              <label class="css-label" for="coleccion_id_aviso">
              		<a href="<?php echo base_url().'aviso'; ?>" target="_blank">He leído y aceptado los siguientes documentos</a>
              </label>
              <span class="help-block" id="msg_coleccion_id_aviso"> </span> 

              <!--
			  <input style="float:left;width:20px;" type="checkbox" id="coleccion_id_base" value="1"  name="coleccion_id_base" />
              <label >
              		<a href="<?php echo base_url().'aviso'; ?>" target="_blank">Bases legales</a>
              </label> 
              <span class="help-block" id="msg_coleccion_id_base"> </span> 
              -->                     
          </div>   
		
		<div class="col-lg-4 col-lg-offset-5 col-md-4 col-md-offset-5 col-sm-12 col-xs-12">
           <span class="help-block" style="color:white;" id="msg_general"> </span>
        </div>
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<button type="submit" class="btn btn-info registrar" value="REGISTRARME"/>
					REGISTRARME <i class="glyphicon glyphicon-heart"></i>
				</button>
		</div>
		
		
		</div>
		
	</div>
</div>

<?php echo form_close(); ?>
<?php $this->load->view('footer'); ?>