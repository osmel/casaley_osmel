<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>

<?php 
	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }
 ?>  
	<div class="container">
		
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">				
				<h2 class="text-center">¿No recuerdas tu contraseña?</h2>
			</div>
		</div>

		<div class="row">			
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
				<div class="formulario-fondos">
					<?php echo form_open('validar_recuperar_participante', array( 'id' => 'form_logueo_participante', 'name' => $retorno, 'class' => 'form-horizontal', 'method' => 'POST', 'autocomplete' => 'off', 'role' => 'form' ) ); ?>
						
						<div class="col-lg-12">
							<p>Danos tu email y te enviaremos un correo electrónico con tu contraseña</p>
						</div>

						<div class="form-group">
							<div class="col-lg-12">
								<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4">
								<a href="<?php echo base_url(); ?><?php echo $retorno; ?>" class="btn btn-danger btn-block">CANCELAR</a>
							</div>
							<div class="col-lg-8">
								<button type="submit" class="btn btn-primary btn-block">RECUPERAR</button>
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>			
		</div>

	</div>
<?php $this->load->view( 'footer' ); ?>