<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>

 <?php 
	 if ($this->session->userdata('session_participante') == true) { 
      	$retorno ="registro_ticket";
    } else {
        $retorno ="registro_usuario";
    }



 $attr = array('class' => 'form-horizontal', 'id'=>'form_registrar_ticket','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
 echo form_open('/validar_registrar_ticket', $attr);
?>	

		<div class="container intro">

			<div class="row">		
										
				<div id="reg_ticket">

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<img src="<?php echo base_url().$this->session->userdata('c5'); ?>" class="img-responsive">
					</div>
					
					<div class="registra col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right">
						<img src="<?php echo base_url().$this->session->userdata('c6'); ?>" class="img-responsive">

						<div class="form-ticket">
							<form id="registra">							
								<div class="form-group">
									<input type="text" class="form-control" id="ticket" name="ticket" placeholder="NÚMERO DE TICKET">
									 <span class="help-block" style="color:white;" id="msg_general"> </span> 
								</div>
								<button type="submit" class="btn btn-danger registrar">
									¡REGISTRA TU TICKET!
								</button>
							</form>
						</div>
						<a class="ver-ticket">VER EJEMPLO DE TICKET</a>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<img src="<?php echo base_url().$this->session->userdata('c7'); ?>" class="img-responsive">
					</div>					

				</div>
				<div id="mecanica" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				   	<h1 class="text-center">MECANICA Y PREMIOS</h1>
				   	<div class="row">
				   		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				   			<img src="<?php echo base_url().$this->session->userdata('c8'); ?>" class="img-responsive">
				   		</div>
				   		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				   			<img src="<?php echo base_url().$this->session->userdata('c9'); ?>" class="img-responsive">
				   		</div>
				   		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dudas">
				   			<p class="text-center">Llama si tienes dudas al <b>01800 890 9859</b>. Lunes a viernes / 9:00 a 17:00 horas</p>
				   		</div>
				   	</div>				
				</div>
				<div id="legales" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">					
					<div class="row">
				   		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				   			<h1 class="text-left">LEGALES</h1>
				   			<h3>PROMOCIÓN “AL 100 CON MAMÁ Y PAPÁ” DE CASA LEY</h3>
							<h4>BASES, TÉRMINOS Y CONDICIONES</h4>

							<p>La participación en la promoción “AL 100 CON MAMÁ Y PAPÁ” (en adelante LA PROMOCIÓN) implica la lectura íntegra de estas Bases, Términos y Condiciones (en adelante “BASES”) así como el cumplimiento de todos y cada uno de los requisitos aquí asentados. Al participar en LA PROMOCIÓN, el participante acepta la obligación de seguir las reglas y decisiones del organizador, las cuales tendrán carácter definitivo y vinculante respecto de todos los asuntos relacionados con LA PROMOCIÓN. Cualquier violación a las presentes BASES, a las reglas de LA PROMOCIÓN, a las decisiones del organizador, así como a los procedimientos o sistemas establecidos, implicará la inmediata descalificación y exclusión del participante y/o la revocación de cualquiera de los incentivos.</p>
							
							<p>
								<a href="<?php echo base_url(); ?>aviso" class="btn btn-default ver-completo">
									Ver completo <i class="glyphicon glyphicon-eye-open"></i>
								</a>
							</p>
				   		</div>
				   		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				   			<img src="<?php echo base_url().$this->session->userdata('c10'); ?>" class="img-responsive">
				   		</div>
				   	</div>
				</div>
					
			</div>	

			

		</div>

<div class="ventana-ejemplos">
	<div class="close">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	</div>
	<div class="img-ticket" style="height:88%;text-align:center">		
		<img src="<?php echo base_url().$this->session->userdata('c26'); ?>" style="height: 100%;width: auto;">
	</div>

	<div class="text-center" style="color:#fff">
		*Imágen de referencia
	</div>
	<div class="text-center exp">
		<span>Fecha de Compra</span>  <span>Número de Ticket</span>
	</div>
</div>

<?php echo form_close(); ?>




<?php $this->load->view( 'footer' ); ?>

<script type="text/javascript">
	$(document).ready(function(){
		  // Add smooth scrolling to all links
		  $("nav a").on('click', function(event) {
		  	
		    // Make sure this.hash has a value before overriding default behavior
		    if (this.hash !== "") {
		      // Prevent default anchor click behavior
		      event.preventDefault();

		      // Store hash
		      var hash = this.hash;

		      // Using jQuery's animate() method to add smooth page scroll
		      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		      $('html, body').animate({
		        scrollTop: $(hash).offset().top //-80
		      }, 800, function(){
		   
		        // Add hash (#) to URL when done scrolling (default click behavior)
		        window.location.hash = hash;
		      });

		    } // End if


		  });

		// alto = $('.navbar').outerHeight();
		
		// $('body').css('margin-top', alto);
		  
	});

	function cerrar(){	
	$('.ventana-ejemplos').css({'opacity':0});
	setTimeout(function(){
		$('.ventana-ejemplos').css({'z-index':'-100'});	
	},1000);
	
	}
	function abrir() {
		$('.ventana-ejemplos').css({'z-index':'2000'});
		$('.ventana-ejemplos').css({'opacity':1});
	}

	$('a.ver-ticket').click(function() {
		abrir();
	});

	$('.ventana-ejemplos .close').click(function() {
		cerrar();
	});
</script>
