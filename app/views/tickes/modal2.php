<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
 	if (!isset($retorno)) {
      	$retorno ="record"."/".$this->session->userdata('id_participante');
      	$id_part =$this->session->userdata('id_participante');
    }
 $hidden = array('tiempo'=>$tiempo,'cant_botones'=>$cant_botones); 

 ?>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body">
				
				<?php 
				//echo '<h4 class="text-center puntos-ganados">';
					//echo 'Gracias por participar con '.$cant_botones.' botones';
				//	echo '¡Gracias por<br>participar!';
				//echo '</h4>';
				//echo '<p>Hemos recibido<br>exitosamente tu cálculo</p>'
				?>

				
				<button onclick="myFacebookLogin(<?php echo "'".$id_part."'"; ?>, <?php echo  $cant_botones; ?>)" class="compartir">
					<img src="<?php echo base_url().$this->session->userdata('c23'); ?>" class="img-responsive" style="margin:3px auto">
				</button>
			
		<div class="alert" id="messagesModal"></div>
	</div>
	<div class="modal-footer">
		<!-- <button class="btn btn-danger" name="<?php echo $retorno; ?>" id="deleteUserSubmit">SI</button> -->
	</div>



	
	
	<input type="hidden" id="tiempo" name="tiempo" value="<?php echo $tiempo; ?>">
	<input type="hidden" id="cant_botones" name="cant_botones" value="<?php echo $cant_botones; ?>">

	
	



 <script type="text/javascript">

   var  $catalogo;
   var $puntos;
   
    window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '2003835493171756', //
	      channelUrl : '//107.170.44.215/',
	      cookie     : false, 
	      status     : true,
	      version    : 'v2.8' // use graph api version 2.8
	    });


	    FB.getLoginStatus(function(response) {
		    if (response.status === 'connected') {
			     var uid = response.authResponse.userID;
			     var accessToken = response.authResponse.accessToken;
		     
				FB.ui(
				       {
				      method: 'feed',
				      name: 'Con casaley tu ganas',
				      link: 'https://www.promoscasaley.com.mx/',
				      picture: 'http://67.205.182.175/img/pepsi_fbshare.jpg',
				      caption: 'Vigencia de la promoción: del XX de abril al YY de ZZZZ de 2017',
				      description: 'Participa para poder ganar;'
				       },
				       function(response) {
				      if (response && response.post_id) {
				        // El usuario publico en el muro
						console.log('El usuario publico en el muro');
						window.location.href = 'publico';
				      } else {
				        // El usuario cancelo y no publico nada
						console.log('El usuario cancelo y no publico nada');
						window.location.href = 'record/'+$catalogo;
				      }
				       }
				     );

			    FB.api('/me', function(response) {
			       $("#response").html("Bienvenido "+ response.name +", has iniciado sesión en facebook");
			    });

     		} else if (response.status === 'not_authorized') {
			     
			     //$("#response").html("Existe una sesión abierta pero no ha aceptado el APP");
			      //console.log('Existe una sesión abierta pero no ha aceptado el APP');
				 FB.ui(
				       {
				      method: 'feed',
				      name: 'Con casaley tu ganas',
				      link: 'https://www.promoscasaley.com.mx/',
				      picture: 'http://67.205.182.175/img/pepsi_fbshare.jpg',
				      caption: 'Vigencia de la promoción: del XX de abril al YY de ZZZZ de 2017',
				      description: 'Participa para poder ganar;'
				       },
				       function(response) {
				      if (response && response.post_id) {
				        // El usuario publico en el muro
						console.log('El usuario publico en el muro');
						window.location.href = 'publico';
				      } else {
				        // El usuario cancelo y no publico nada
						console.log('El usuario cancelo y no publico nada');
						window.location.href = 'record/'+$catalogo;
				      }
				       }
				     );



				 



			     /*
			     FB.login(function(response) {

					if (response && response.post_id) {
				        // El usuario publico en el muro
							console.log('El usuario publico en el muro');

							window.location.href = 'publico';;

				    } else {
				        // El usuario cancelo y no publico nada
						console.log('El usuario cancelo y no publico nada');
						window.location.href = 'record/'+$catalogo;

				    }


			      // Aqui solicitamos los permisos al usuario para utilizar el app con su cuenta
			     }, {}); //scope: 'publish_stream'
			     */

			} else {
     			$("#response").html("No hay sesión iniciada en facebook");

				FB.ui(
				       {
				      method: 'feed',
				      name: 'Con casaley tu ganas',
				      link: 'https://www.promoscasaley.com.mx/',
				      picture: 'http://67.205.182.175/img/pepsi_fbshare.jpg',
				      caption: 'Vigencia de la promoción: del XX de abril al YY de ZZZZ de 2017',
				      description: 'Participa para poder ganar;'
				       },
				       function(response) {
				      if (response && response.post_id) {
				        // El usuario publico en el muro
						console.log('El usuario publico en el muro');
						window.location.href = 'publico';
				      } else {
				        // El usuario cancelo y no publico nada
						console.log('El usuario cancelo y no publico nada');
						window.location.href = 'record/'+$catalogo;
				      }
				       }
				     );


    		}

     	}); //fin de FB.getLoginStatus(function(response) {
    }; //fin de window.fbAsyncInit = function() {
 
    	

 	function myFacebookLogin($cat, $ptos) {  

 		$catalogo = $cat;
 		$puntos = $ptos;

		


	     (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/es_LA/all.js";
	     fjs.parentNode.insertBefore(js, fjs);
	      }(document, 'script', 'facebook-jssdk'));

	}     

   
  </script>


