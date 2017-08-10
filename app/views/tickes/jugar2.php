<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php  $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>

<?php
 	if (!isset($retorno)) {
      	$retorno ="record"."/".$this->session->userdata('id_participante');
    }

 $attr = array('class' => 'form-horizontal', 'id'=>'form_jugar','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
 echo form_open('/proc_modal_ticket', $attr);
?>  

<div class="container intro juego">
	<div class="row contadores">

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center tiempo">
				<img style="max-height: 399px;display: inline;" src="<?php echo base_url().$this->session->userdata('c27'); ?>" class="img-responsive">
				
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center urna">

		<video loop autoplay  muted playsinline width=100% height=399>
			<noscript><a href=http://www.freemake.com/free_video_converter/>video converter</a></noscript>
			<source src="http://5114a8ffc40706ef82ae-d8bd459c441e0a7abb146c0a3f7df852.r78.cf5.rackcdn.com/URNA%20FINAL%20SIN%20PISO%20.ogv" type='video/ogg; codecs="theora, vorbis"'/>
			<source src="http://5114a8ffc40706ef82ae-d8bd459c441e0a7abb146c0a3f7df852.r78.cf5.rackcdn.com/URNA%20FINAL%20SIN%20PISO%20.webm" type='video/webm' >
			<source src="http://5114a8ffc40706ef82ae-d8bd459c441e0a7abb146c0a3f7df852.r78.cf5.rackcdn.com/URNA%20FINAL%20SIN%20PISO%20.mp4" type='video/mp4'>
		</video>


			<!--<img src="<?php echo base_url().$this->session->userdata('c24'); ?>" class="img-responsive">-->
		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center pregunta">
			

			<div style="padding-right: 0px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<img style="max-width: 74px; text-align:right; padding: 0px;padding-top: 19px;float: right;" src="<?php echo base_url().$this->session->userdata('c25'); ?>" class="img-responsive reloj">
			</div>	

			<div  style="text-align:left;" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="countdown"></div>
			</div>	

			<h5 style="font-size: 20px;font-weight: bold;">SEGUNDOS RESTANTES</h5>

			
			<p class="cuantos">¿CUÁNTOS BOTONES HAY<br>EN LA URNA VIRTUAL?</p>
            <input type="text" class="form-control" id="cant_botones" name="cant_botones"  placeholder="0"> 
            <span class="help-block" style="color:white;" id="msg_cant_botones"> </span>
            <br>
            <button type="submit" style="letter-spacing:3px" class="spinBtn btn btn-danger btn-block" >¡LISTO! <i class="glyphicon glyphicon-thumbs-up"></i></button>

		</div>
	</div>

  



</div> <!-- container -->

<?php echo form_close(); ?>

<?php $this->load->view( 'footer' ); ?>


<div class="modal fade bs-example-modal-lg" id="modalMessage" ventana="redireccion" valor="<?php echo $retorno; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content modal-gracias"></div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalMessage2" ventana="redi_reintentar" valor="<?php echo $retorno; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content modal-instrucciones"></div>
    </div>
</div>


