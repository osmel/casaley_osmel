<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php  $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>
<?php 

	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }

 $attr = array('class' => 'form-horizontal', 'id'=>'form_participantes','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
 echo form_open('/validar_tickets', $attr);
?>		
<div class="container">
	
	<div class="row">
		
			<div class="panel-body">

				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1 class="text-center">REGISTRO DE TICKETS</h1>
					</div>
					
					<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right" style="margin-bottom:15px">
						<a class="ver-ticket">Ver ejemplo de ticket</a>
					</div> -->
					
					<div class="formulario-fondos col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<!--
					<div class="form-group">
						<label for="tienda" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Núm. Tienda</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="tienda" name="tienda" placeholder="tienda">
							<span class="help-block" style="color:white;" id="msg_tienda"> </span> 
						</div>
					</div>-->

					<div class="form-group">
						<label for="ticket" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Núm. Ticket</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="ticket" name="ticket" value="<?php echo $this->session->userdata('num_ticket_participante') ?>" placeholder="ticket">
							 <span class="help-block" style="color:white;" id="msg_ticket"> </span> 
						</div>
					</div>

					<div class="form-group" >
						<label for="compra" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Fecha de compra</label>
						<div class="input-group date compra col-lg-9 col-md-9 col-sm-9 col-xs-9">
						  <input id="compra" name="compra" type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span> 
						</div>
						<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-9 col-xs-offset-3">
							<span class="help-block" style="color:white;" id="msg_compra"> </span>
						</div>
					</div>

					
					<!-- <div class="form-group" style="display:none;">
						<label for="transaccion" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Núm. Transacción</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="transaccion" name="transaccion" placeholder="transacción">
							<span class="help-block" style="color:white;" id="msg_transaccion"> </span> 
						</div>
					</div>

					<div class="form-group" style="display:none;">
						<label for="clave_producto" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Clave de producto</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="clave_producto" name="clave_producto" value="1234512345111" placeholder="clave producto">
							<span class="help-block" style="color:white;" id="msg_clave_producto"> </span> 
						</div>
					</div>					
							
				


					<div class="form-group" style="display:none;">
						<label for="id_litraje" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Litraje</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
									<select name="id_litraje" id="id_litraje" class="form-control">
											<?php foreach ( $estados as $estado ){ ?>
													<option value="<?php echo $estado->id; ?>"><?php echo $estado->nombre; ?></option>
											<?php } ?>
									</select>
						</div>
					</div>

					<div class="form-group" style="display:none;">
						<label for="cantidad" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label">Cantidad</label>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<input type="text" class="form-control" id="cantidad" name="cantidad" value="1" placeholder="Cantidad">
							<span class="help-block" style="color:white;" id="msg_cantidad"> </span> 
						</div>
					</div> -->

		<div class="col-lg-4 col-lg-offset-5 col-md-4 col-md-offset-5 col-sm-12 col-xs-12">
           <span class="help-block" style="color:white;" id="msg_general"> </span>
        </div>
					
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
						<button type="submit" class="btn btn-info" value="REGISTRARME"/>
							REGISTRAR
							<!-- <img src="<?php echo base_url().$this->session->userdata('c13'); ?>"> -->
						</button>
					</div>

					</div>

				</div>
				
		
		</div>
		
	</div>
</div> 
<?php echo form_close(); ?>
<?php $this->load->view('footer'); ?>


<div class="modal fade bs-example-modal-lg" id="modalMessage" ventana="redi_ticket" valor="<?php echo $retorno; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content modal-instrucciones"></div>
    </div>
</div>

<!-- <div class="ventana-ejemplos">
	<div class="close">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	</div>
	<div class="slider">
		<div>
			<img src="<?php echo base_url().$this->session->userdata('c27'); ?>">
		</div>
		<div>
			<img src="<?php echo base_url().$this->session->userdata('c28'); ?>">
		</div>
		<div>
			<img src="<?php echo base_url().$this->session->userdata('c29'); ?>">
		</div>
	</div>

	<div class="text-center" style="color:#fff">
		*Imágenes de referencia
	</div>
	<div class="text-center exp">
		<span>Número de Ticket</span>  <span>Número de Tienda</span>  <span>Número de Compra</span> <span>Número de Transacción</span>
	</div>
</div> -->

<script type="text/javascript">
// ya=0;
// function tickets(){
// $(".slider").slick({
//         dots: false,
//         infinite: false,
//         slidesToShow: 3,
//         slidesToScroll: 1,
//         arrows: true,
//         autoplay: true,
//   		autoplaySpeed: 5500,
//         responsive: [
//         	{
//         		breakpoint:768,
//         		settings: {
//         			dots: false,
// 			        infinite: false,
// 			        slidesToShow: 2,
// 			        slidesToScroll: 1,
// 			        arrows: true,
// 			        autoplay: true,
//   					autoplaySpeed: 5500,
//         		}
//         	},
//         	{
//         		breakpoint:481,
//         		settings: {
//         			dots: false,
// 			        infinite: false,
// 			        slidesToShow: 1,
// 			        slidesToScroll: 1,
// 			        arrows: true,
// 			        autoplay: true,
//   					autoplaySpeed: 5500,
//         		}
//         	},
//         	{
//         		breakpoint:361,
//         		settings: {
//         			dots: false,
// 			        infinite: false,
// 			        slidesToShow: 1,
// 			        slidesToScroll: 1,
// 			        arrows: true,
// 			        autoplay: true,
//   					autoplaySpeed: 5500,
//         		}
//         	}
//         ]
//       });
// ya=1;
// }
// function cerrar(){	
// 	$('.ventana-ejemplos').animate({'opacity':0}, 1000, function(){
// 		$('.ventana-ejemplos').css({'z-index':'-100'});
// 	});
// }
// function abrir() {
// 	$('.ventana-ejemplos').css({'z-index':'1000'});
// 	$('.ventana-ejemplos').animate({'opacity':1}, 1000, function(){
// 		if (ya == 0) {
// 			tickets();
// 		};		
// 	});
// }

// $('a.ver-ticket').click(function() {
// 	abrir();
// });

// $('.ventana-ejemplos .close').click(function() {
// 	cerrar();
// });

// $(document).ready(function() {
// 	tickets();
// });

</script>
