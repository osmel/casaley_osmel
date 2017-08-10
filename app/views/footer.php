<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
		</div>

	
	</div>
<img src="<?php echo base_url().$this->session->userdata('c22'); ?>" class="curvaf">
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="slider">
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c11'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c12'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c13'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c14'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c15'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c16'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c17'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c18'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c19'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c20'); ?>">
					</div>
					<div>
						<img src="<?php echo base_url().$this->session->userdata('c21'); ?>">
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 copy text-center">				
				<p class="vigencia">VIGENCIA DEL 02 DE MAYO AL 30 DE JUNIO DEL 2017.</p>
			</div>			
		</div>
	</div>
</footer>
	<!-- SCRIPTS -->
	<?php  echo link_tag('css/estilos.css');  ?>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	 

	<!-- componente fecha simple -->
	<?php echo link_tag('css/bootstrap-datepicker.css'); ?>
	
	<!-- componente rango fecha -->
	<?php echo link_tag('css/daterangepicker-bs3.css'); ?>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/spin.min.js"></script>

	<!-- componente fecha simple -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>

	<!-- componente rango fecha -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/moment.js"></script>		
	<script type="text/javascript" src="<?php echo base_url(); ?>js/daterangepicker.js"></script>		




	<!-- componente fecha simple -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
	
	
	
	<!--para conversion a base64.encode y base64.decode -->
	<script src="<?php echo base_url(); ?>js/base64/jquery.base64.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/base64/jquery.base64.min.js" type="text/javascript"></script>
	
	
	<!-- Juego 
	


	<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/utils/Draggable.min.js'></script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>js/juego/ThrowPropsPlugin.min.js"></script> 
	 <script type="text/javascript" src="<?php echo base_url(); ?>js/juego/Spin2WinWheel.min.js"></script> 
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/TextPlugin.min.js'></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/juego/index.js"></script> 
	-->




	<!-- mask -->	
  <script src="<?php echo base_url(); ?>js/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
  <!--
  <script src="<?php echo base_url(); ?>js/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/assets/pages/scripts/form-input-mask.min.js" type="text/javascript"></script>
  -->



  <!-- checkbox -->	
  <script src="<?php echo base_url(); ?>js/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- <script src="<?php echo base_url(); ?>js/assets/global/scripts/app.min.js" type="text/javascript"></script>
  -->	


  <!-- Mostrar ticket de muestra  -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/slick.js"></script>

  <!-- Fecha Dropdowns  -->

	<script src="<?php echo base_url(); ?>js/fechaDropdowns/jquery.date-dropdowns.js"></script>

  <!-- nuestro js principal -->

	<script type="text/javascript" src="<?php echo base_url(); ?>js/sistema.js"></script>

	

</body>
</html>

<script type="text/javascript">

$(".slider").slick({
        dots: false,
        infinite: true,
        slidesToShow: 11,
        slidesToScroll: 3,
        arrows: true,
        autoplay: true,
  		autoplaySpeed: 5500,
        responsive: [
        	{
        		breakpoint:991,
        		settings: {
        			dots: false,
			        infinite: true,
			        slidesToShow: 8,
			        slidesToScroll: 3,
			        arrows: true,
			        autoplay: true,
  					autoplaySpeed: 4500,
        		}
        	},
        	{
        		breakpoint:768,
        		settings: {
        			dots: false,
			        infinite: true,
			        slidesToShow: 6,
			        slidesToScroll: 1,
			        arrows: true,
			        autoplay: true,
  					autoplaySpeed: 4000,
        		}
        	},
        	{
        		breakpoint:481,
        		settings: {
        			dots: false,
			        infinite: true,
			        slidesToShow: 4,
			        slidesToScroll: 2,
			        arrows: true,
			        autoplay: true,
  					autoplaySpeed: 3500,
        		}
        	},
        	{
        		breakpoint:361,
        		settings: {
        			dots: false,
			        infinite: true,
			        slidesToShow: 3,
			        slidesToScroll: 1,
			        arrows: true,
			        autoplay: true,
  					autoplaySpeed: 2500,
        		}
        	}
        ]
      });


</script>
