<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
 	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }
 $hidden = array('nada'=>'nada'); 

 ?>
<?php echo form_open('validar_confirmar_juego', array('class' => 'form-horizontal','id'=>'form_sino','name'=>$retorno, 'method' => 'POST', 'role' => 'form', 'autocomplete' => 'off' ) ,   $hidden ); ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
	</div>
	<div class="modal-body">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4 class="text-center">¡Gracias por registrar tu ticket!</h4>
			<h2 class="inst text-center">Tienes 2 minutos para calcular la cantidad exacta que contiene la urna virtual.</h2>
		</div>
	</div>
	<div class="modal-footer">
		<div class="cont">
			<button type="button" class="close continuar" data-dismiss="modal" aria-label="Close">
				HACER CÁLCULO <i class="glyphicon glyphicon-heart"></i>
			</button>
		</div>
	</div>




	
	
<?php echo form_close(); ?>
