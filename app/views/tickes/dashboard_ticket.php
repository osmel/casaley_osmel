<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php  $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>
<?php 

	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }

 //$attr = array('class' => 'form-horizontal', 'id'=>'form_participantes','name'=>$retorno,'method'=>'POST','autocomplete'=>'off','role'=>'form');
 //echo form_open('/validar_tickets', $attr);
?>		
<div class="container">
	
	<div class="row">
		
			<div class="panel-body">

				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
					</div>
					
					
					
					<div class="formulario-fondos col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:150px">
						<a href="<?php echo base_url(); ?>record/<?php echo $this->session->userdata('id_participante'); ?>" >
                                    VER MIS TICKETS
                        </a>
					

					</div>

				</div>
				
		
		</div>
		
	</div>
</div> 

<?php $this->load->view('footer'); ?>


<div class="modal fade bs-example-modal-lg" id="modalMessage" ventana="redi_ticket" valor="<?php echo $retorno; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content modal-instrucciones"></div>
    </div>
</div>


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
