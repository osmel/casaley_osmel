<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>
 
 <?php 

	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }
 ?>   

	<div class="container entrar-cuenta">

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- <h3 class="text-center"><strong><?php echo $this->session->userdata('c2'); ?></strong></h3> -->
				<h1 class="text-center">ENTRAR A MI CUENTA</h>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">				
				
				<div class="formulario-fondos">

					<?php
 					 $attr = array( 'id' => 'form_logueo_participante','name'=>$retorno, 'class' => 'form-horizontal', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form' );
					 echo form_open('validar_login_participante', $attr);
					?>
						<div class="form-group"> 
								
								<hr>
								<input type="text" class="form-control" id="nick" name="nick" placeholder="Usuario">
								<span class="help-block" style="color:white;" id="msg_nick"> </span> 
						
						</div>
						<div class="form-group">
							
								<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
								<span class="help-block" style="color:white;" id="msg_contrasena"> </span> 
								
								<hr>

							
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				           <span class="help-block" style="color:white;" id="msg_general"> </span>
				        </div>						
						<div class="form-group">

							<!--
							<div class="col-md-12">
								<a href="<?php echo base_url(); ?>recuperar_participante">¿Olvidaste tu contraseña?</a>
							</div>-->

							<div class="col-md-12 text-center">								
								<button type="submit" class="ingresar">INGRESAR <i class="glyphicon glyphicon-log-in"></i></button>
							</div>
							
							
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
<?php $this->load->view( 'footer' ); ?>