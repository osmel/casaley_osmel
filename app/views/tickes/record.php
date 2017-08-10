<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>



<div class="container intro mis-tickets">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="text-center">MIS TICKETS</h1>
		</div>
	</div>
								
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 mimarcador formulario-fondos">
		<!-- <img src="<?php echo "/".$this->session->userdata('c4'); ?>" class="img-responsive"> -->
		<!-- <h1 style="color:#ffffff">TABLA DE RECORD <?php echo $this->session->userdata('c2'); ?></h1> -->
		
		<h4 class="nom_usuario"><?php echo '@'.$record->nick; ?><h4>
		<!-- <a href="<?php echo base_url(); ?>tabla_general" class="color-blanco">VER TABLA GENERAL</a> -->

		<p class="datos"><span>TICKETS REGISTRADOS</span><span><?php echo $record->cantidad; ?></span></p>
		
		<!-- <p class="datos"><span>PUNTOS TOTALES: </span><span><?php echo $record->total; ?></span></p> -->
	</div>


</div>


<?php $this->load->view( 'footer' ); ?>