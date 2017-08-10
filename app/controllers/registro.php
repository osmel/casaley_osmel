<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function __construct(){ 
		parent::__construct();

		$this->load->model('admin/modelo', 'modelo'); 
		$this->load->model('registros', 'modelo_registro'); 
		$this->load->model('admin/catalogo', 'catalogo');  
		$this->load->library(array('email')); 
	
		$this->tiempo_comienzo      = "2:00";
		$this->cant_repetir      = 1;
	}



  //    loguear  participante 		"login_participante" 
  // o  registrar el ticket         "dashboard_participante"
  // o 	Jugar 				        "registro_juego"

  function registro_ticket(){

		if ( $this->session->userdata( 'session_participante' ) !== TRUE ){
			
			self::configuraciones();
			$this->login_participante(); //Logueo de  participante 
		} else {
			self::configuraciones_imagenes();  //las imagenes
			

 			if ($this->session->userdata('registro_ticket') !==TRUE ){ 
				$this->dashboard_participante(); //registrar ticket
			} else {
				$this->registro_juego();    //jugar
			}	
		}
	}




//////////*********///////////   
  public function login_participante(){  //Logueo de  participante 
		$this->load->view( 'registros/login' );
  }


  function validar_login_participante(){

		$mis_errores=array(
		    "nick" => '',
		    "contrasena" => '',
		    'general'=> '',
		);

		//$this->form_validation->set_rules( 'email', 'Correo', 'trim|required|valid_email|xss_clean');
		//$this->form_validation->set_rules( 'nick', 'Nick', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules( 'nick', 'Usuario', 'trim|required|min_length[3]|max_length[50]|callback_cadena_noacepta|xss_clean');
		$this->form_validation->set_rules( 'contrasena', 'Contraseña', 'required|trim|min_length[8]|xss_clean');

		if ( $this->form_validation->run() == TRUE ){
				$data['nick']		=	$this->input->post('nick');
				$data['contrasena']		=	$this->input->post('contrasena');
				$data 				= 	$this->security->xss_clean($data);  

				$login_check = $this->modelo_registro->check_login($data);
				
				if ( $login_check != FALSE ){

					$this->modelo_registro->anadir_historico_acceso($login_check[0]);  //agrega al historico de acceso de participantes
					$this->session->set_userdata('session_participante', TRUE);
					
					
					if (is_array($login_check))
						foreach ($login_check as $login_element) {
							$this->session->set_userdata('premiado_participante', $login_element->premiado);
							$this->session->set_userdata('id_premio_participante', $login_element->id_premio);
							$this->session->set_userdata('id_participante', $login_element->id);
							$this->session->set_userdata('nombre_participante', $login_element->nombre.' '.$login_element->apellidos);
							$this->session->set_userdata('nick_participante', $login_element->nick);
							$this->session->set_userdata('email_participante', $login_element->email);

						}
					$mis_errores = true;	
				} else {
					$mis_errores["general"] = '<span class="error">Tus datos no son correctos, verificalos e intenta nuevamente por favor.</span>';
				}
		} else {		
					
				//tratamiento de errores
				$error = validation_errors();
				$errores = explode("<b class='requerido'>*</b>", $error);
				$campos = array(
				    "nick" => 'Usuario',
				    "contrasena" => 'Contraseña',
				);
				    foreach ($errores as $elemento) {

						foreach ($campos as $clave => $valor) {
							
						        if (stripos($elemento, $valor) !== false) {
						        	if  ($valor=="Requerido") {
						         		$mis_errores[$clave] = $elemento; //condiciones
						        	} else {
						        		$mis_errores[$clave] = '*';
						        	}						

						        	$mis_errores[$clave] = substr($elemento, 0, -5);   //condiciones 	
						        }
						}    	
				    }

		}	

		echo json_encode($mis_errores);

	}	




//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////alta PARTICIPANTE//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////


 // Creación de especialista o Administrador (Nuevo Colaborador)
	function nuevo_registro(){
		if($this->session->userdata('session_participante') === TRUE ){   //si esta logueado inhabilitar session
				  redirect('');
		} else {  //nuevo registro
			  $data['premios']   = $this->catalogo->listado_premios();
			  $data['estados']   = $this->modelo_registro->listado_estados();
			  $this->load->view( 'registros/registro2',$data );   
		}    
	}




   function validar_registros22(){

			$dato['nombre']   			= "osmel"; 
			$dato['apellidos']   		= "calderon"; 
			$dato['nick']   				= "minick";

			$dato['email']   			= 'osmel.calderon@gmail.com';
			$dato['contrasena']			= 'contrasena';

			$dato['email']   			    = 'osmel.calderon@gmail.com';
			$dato['contrasena']				= 'contrasena';				
			//envio de correo para notificar alta en usuarios del sistema
			$desde = $this->session->userdata('c1');
			$esp_nuevo = $dato['email'];
			$this->load->view('admin/correos/alta_usuario', $dato );

   }


	function validar_registros(){
		if ($this->session->userdata('session_participante') == TRUE) {
			redirect('');
		} else {

			$this->form_validation->set_rules( 'nombre', 'Nombre', 'trim|required|callback_nombre_valido|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules( 'apellidos', 'Apellido(s)', 'trim|required|callback_nombre_valido|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules( 'nick', 'NickName', 'trim|required|min_length[3]|max_length[50]|callback_cadena_noacepta|xss_clean');
			$this->form_validation->set_rules( 'email', 'Correo', 'trim|valid_email|xss_clean');
			$this->form_validation->set_rules('id_estado', 'Estado', 'required|callback_valid_option|xss_clean');
			$this->form_validation->set_rules( 'pass_1', 'Contraseña', 'required|trim|min_length[8]|xss_clean');
			$this->form_validation->set_rules( 'pass_2', 'Confirmación de contraseña', 'required|trim|min_length[8]|xss_clean');
			$this->form_validation->set_rules( 'celular', 'Celular', 'trim|required|numeric|min_length[10]|callback_valid_phone|xss_clean');
			$this->form_validation->set_rules( 'telefono', 'Teléfono', 'trim|required|numeric|min_length[8]|callback_valid_phone|xss_clean');
			$this->form_validation->set_rules('coleccion_id_aviso', 'Aviso de privacidad', 'callback_accept_terms[coleccion_id_aviso]');	
			//$this->form_validation->set_rules('coleccion_id_base', 'Bases legales', 'callback_accept_terms[coleccion_id_base]');	
			$this->form_validation->set_rules( 'fecha_nac', 'Fecha de Nacimiento', 'trim|required|callback_valid_nacimiento[fecha_nac]|xss_clean');

			
			$mis_errores=array(
					    "nombre" =>  '',
					    "apellidos" =>  '',
					    "nick" =>  '',
					    "email" =>  '',
					    "id_estado" =>  '',
					    'pass_1'=> '',
					    'pass_2'=>  '',
					    "celular" =>  '',
					    "telefono" =>  '',
					    "coleccion_id_aviso" =>  '',
					    //"coleccion_id_base" =>  '',
					    "fecha_nac" =>  '',
					     "general" => '',
				    

						);
			


			if ($this->form_validation->run() === TRUE){
				if ($this->input->post( 'pass_1' ) === $this->input->post( 'pass_2' ) ){
					$data['nick']			=	$this->input->post('nick');
					$data['contrasena']		=	$this->input->post('pass_1');
					$data 				= 	$this->security->xss_clean($data);  
					$login_check = $this->modelo_registro->check_correo_existente($data);

					if ( $login_check != FALSE ){		
						$usuario['nombre']   			= $this->input->post( 'nombre' );
						$usuario['apellidos']   		= $this->input->post( 'apellidos' );
						$usuario['nick']   				= $this->input->post( 'nick' );

						$usuario['email']   			= $this->input->post( 'email' );
						$usuario['contrasena']				= $this->input->post( 'pass_1' );
						
						$usuario['fecha_nac']   		= $this->input->post( 'fecha_nac' );
						$usuario['id_estado']   		= $this->input->post( 'id_estado' );

						$usuario['celular']   		= $this->input->post( 'celular' );
						$usuario['telefono']   		= $this->input->post( 'telefono' );
						
						
						$usuario['id_perfil']   		= 3; //significa participante

						$usuario['id_premio']   		= $this->input->post( 'id_premio' );

						

						$usuario 						= $this->security->xss_clean( $usuario );
						$guardar 						= $this->modelo_registro->anadir_registro( $usuario );

						
						if ( $guardar !== FALSE ){  


									if  ($usuario['email']) {  //si tiene email q envie correo
									
										$dato['email']   			    = $usuario['email'];   			
										$dato['contrasena']				= $usuario['contrasena'];				

										/*
										//envio de correo para notificar alta en usuarios del sistema
										$desde = $this->session->userdata('c1');
										$esp_nuevo = $usuario['email'];
										$this->email->from($desde, $this->session->userdata('c2'));
										$this->email->to( $esp_nuevo );
										$this->email->subject('Al 100 con mamá y papá Casa Ley - Registro de Cuenta'); //.$this->session->userdata('c2')
										$this->email->message( $this->load->view('admin/correos/alta_usuario', $dato, TRUE ) );

										if ($this->email->send()) {
											*/
										if (true) {	
											//envio correo
										} else {
												 $mis_errores["general"] = '<span class="error"><b>E01</b> - El nuevo participante no pudo ser agregado</span>';
										}
											
									} // 	
												 
												
													
									$login_checkeo = $this->modelo_registro->check_login($usuario);
									$this->modelo_registro->anadir_historico_acceso($login_checkeo[0]);  //agrega al historico de acceso de participantes

									$this->session->set_userdata('session_participante', TRUE);

									
									if (is_array($login_checkeo))
										foreach ($login_checkeo as $element) {
											$this->session->set_userdata('premiado_participante', $element->premiado);
											$this->session->set_userdata('id_premio_participante', $element->id_premio);
											
											$this->session->set_userdata('id_participante', $element->id);
											$this->session->set_userdata('nombre_participante', $element->nombre.' '.$element->apellidos);
											$this->session->set_userdata('nick_participante', $element->nick);
											$this->session->set_userdata('email_participante', $element->email);
									}
									

									$mis_errores = true;
										
											

											

						} else {
							
							 	 $mis_errores["general"] = '<span class="error"><b>E01</b> - El nuevo participante no pudo ser agregado</span>';
							 
						}
					} else {
						
							 	 $mis_errores["general"] = '<span class="error">El <b>nick</b> ya se encuentra registrado.</span>';
							 
						
					}
				} else {
					
							 	$mis_errores["general"] = '<span class="error">No coinciden la Contraseña </b> y su <b>Confirmación</b> </span>';
							 
						
					
				}
			} else {			
				
				//tratamiento de errores
				$error = validation_errors();
				
				$errores = explode("<b class='requerido'>*</b>", $error);
				$campos = array(
				    "nombre" => 'Nombre',
				    "apellidos" => 'Apellido(s)',
				    "nick" => 'NickName',
				    "email" => 'Correo',
				    "id_estado" => 'Estado',
				    'pass_1'=>'Contraseña',
				    'pass_2'=>'Confirmación de contraseña',
				    "celular" => 'Celular',
				    "telefono" => 'Teléfono',
				    "coleccion_id_aviso" => 'Aviso de privacidad',
				    //"coleccion_id_base" => 'Bases legales',
				    "fecha_nac" => 'Fecha de Nacimiento',
				);

				    foreach ($errores as $elemento) {

						foreach ($campos as $clave => $valor) {
							
						        if (stripos($elemento, $valor) !== false) {
						        	if  ($valor=="requerido") {
						         		$mis_errores[$clave] = $elemento; //condiciones
						        	} else {
						        		$mis_errores[$clave] = '*';
						        	}						

						        	$mis_errores[$clave] = substr($elemento, 0, -5);   //condiciones 	
						        }
						}    	
				    }
				    
			}

			echo json_encode($mis_errores);


		}
	}



//////////*********///////////	

	function dashboard_participante(){  //registrar ticket
		if($this->session->userdata('session_participante') === TRUE ){
		  $data['estados']   = $this->modelo_registro->listado_litraje();
		  $this->load->view( 'tickes/dashboard_ticket',$data );
		}
		else { 
		  redirect('');
		}	
	}	



function validar_tickets(){ //VALIDAR registro de ticket

		if ($this->session->userdata('session_participante') != TRUE) {
			redirect('');
		} else {
		    
			$mis_errores=array(
				    "tienda" => '',
				    "ticket" => '',
				    "compra" => '',
				    'general'=> '',

			);
	
									
			$this->form_validation->set_rules( 'ticket', 'Núm de Ticket', 'trim|required|min_length[28]|max_length[28]|xss_clean');	//numeric|
			//$this->form_validation->set_rules( 'tienda', 'Núm de Tienda', 'trim|required|numeric|min_length[5]|max_length[5]|xss_clean');				
			
			$this->form_validation->set_rules( 'compra', 'Fecha de Compra', 'trim|required|callback_valid_fecha[compra]|xss_clean');
			
			
	
			if ($this->form_validation->run() === TRUE){

				$validacion_tickets =true;
				if ($validacion_tickets){ //validacion de la tarjeta
					$ticket['ticket']			=	$this->input->post('ticket');
					
					$ticket 				= 	$this->security->xss_clean($ticket);  
					$ticket_check = $this->modelo_registro->check_tickets_existente($ticket);

					if ( $ticket_check != FALSE ){		
						$ticket['compra']   			= $this->input->post( 'compra' );
						//$ticket['tienda']				= $this->input->post('tienda');

						$ticket 						= $this->security->xss_clean( $ticket );
						$guardar 						= $this->modelo_registro->anadir_tickets( $ticket );



						
						if ( $guardar !== FALSE ){  
									
									//indicar numero de ticket registrado															
									$this->session->set_userdata('num_ticket_participante', $ticket['ticket']);

									//indicar que ya registro su ticket						
									$this->session->set_userdata('registro_ticket', TRUE );

									
									//tiempo comienzo
									//$this->session->set_userdata('eltiempo', $this->tiempo_comienzo);
									$this->session->set_userdata('comenzar', 0);


									//Cantidad de veces que se repetira juego
									$this->session->set_userdata('cant_repetir', $this->cant_repetir);

									


									$mis_errores = true;	

						} else {
							$mis_errores["general"] = '<span class="error"><b>E01</b> - El nuevo participante no pudo ser agregado</span>';
						}
					} else {
						$mis_errores["general"] = '<span class="error">El <b>tickets</b> ya se encuentra registrado.</span>';
					}
				} else {
					$mis_errores["general"] = '<span class="error">Su ticket no es válido</b> y su <b>Confirmación</b> </span>';
				}
			} else {			

	//tratamiento de errores
				$error = validation_errors();
				$errores = explode("<b class='requerido'>*</b>", $error);
				$campos = array(
				    //"tienda" => 'Núm de Tienda',
				    "ticket" => 'Núm de Ticket',
				    "compra" => 'Fecha de Compra',
				    
				);



				    foreach ($errores as $elemento) {

						foreach ($campos as $clave => $valor) {
							
						        if (stripos($elemento, $valor) !== false) {
						        	if  ($valor=="Requerido") {
						         		$mis_errores[$clave] = $elemento; //condiciones
						        	} else {
						        		$mis_errores[$clave] = '*';
						        	}						

						        	$mis_errores[$clave] = substr($elemento, 0, -5);   //condiciones 	
						        }
						}    	
				    }

				    if ($mis_errores["ticket"] !='') {
				    	$mis_errores["ticket"] =  '<span class="error">Su ticket no es <b>válido</b> </span>';	
				    }
				    
				    

			}
			echo json_encode($mis_errores);
		}
	}


function validar_registrar_ticket(){  //VALIDAR ticket del home
		$mis_errores=array(
				    'general'=> '',
		);
	$this->form_validation->set_rules( 'ticket', 'Núm de Ticket', 'trim|required|min_length[28]|max_length[28]|xss_clean');	//numeric|
	if ($this->form_validation->run() === TRUE){						
		$ticket['ticket']			=	$this->input->post('ticket');			
		$this->session->set_userdata('num_ticket_participante', $ticket['ticket']);
    	$mis_errores =  true;
	} else {
		$mis_errores["general"] =  '<span class="error">Su ticket no es <b>válido</b> </span>';
	}

	echo json_encode($mis_errores);

}	


//////////*********///////////	


	function registro_juego(){  //jugar
		
		//$data["cripto"] = $this->session->userdata('cripto');

		if($this->session->userdata('session_participante') === TRUE ){
		  $data['nodefinido_todavia']        = '';
		  $this->load->view( 'tickes/jugar',$data );
		}
		else { 
		  redirect('');
		}	

	}



	




public function proc_modal_reintentar(){
	
		  if ( $this->session->userdata('session_participante') !== TRUE ) {
		      redirect('');
		    } else {
			   $this->session->set_userdata('cant_repetir', 0);		
			   $this->session->set_userdata('comenzar', 0);	
               $this->load->view( 'tickes/modal_reintentar' );
		   }   			

}



//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////MODAL INSTRUCCIONES PARA JUGAR////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

public function proc_modal_instrucciones(){
	
		  if ( $this->session->userdata('session_participante') !== TRUE ) {
		      redirect('');
		    } else {
		      
               $this->load->view( 'tickes/modal_instrucciones' );
		   }   			

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

	/*
		incluso para cdo refresque
		este es un axiliar para indicar el tiempo de comienzo, numero

	*/

		public function num_conteo(){   
		   if ( $this->session->userdata( 'session_participante' ) == TRUE ){
		   		
		   		 $comenzar = $this->session->userdata('comenzar');
		   		 $data['comenzar']		     = $comenzar; //	($this->session->userdata('comenzar')==1 )  ? 1:0; 	
		   		 $this->session->set_userdata('comenzar', 1);	

		   		 $data['cant_repetir']    = 	$this->session->userdata('cant_repetir'); 
		   		
		   		 $data['tiempo_comienzo'] = $this->tiempo_comienzo; 
			   	
			    $data['registro_ticket'] = $this->session->userdata('registro_ticket'); 
			   	
			   	
			   	
			   	echo  json_encode($data);
			   	

		   }	

			
		}	
  

//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////MODAL PARA MOSTRAR BOTON COMPARTIR FACEBOOK////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

 public function proc_modal_ticket($tiempo, $cant_botones){


	
		  if ( $this->session->userdata('session_participante') !== TRUE ) {
		      redirect('');
		    } else {
		       //indicar que ya concluyo tarea con su ticket
		       $this->session->set_userdata('registro_ticket', false );

		       $data['tiempo'] 			= base64_decode($tiempo);	//tiempo restante
		       $data['cant_botones'] 	= (int) base64_decode($cant_botones);   //cantidad de botones

		       $data 						= $this->security->xss_clean( $data );
			   $guardar 				    = $this->modelo_registro->actualizar_tickets( $data );
 			   

               $this->load->view( 'tickes/modal',$data );
		   }   			

}


		





//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////FACEBOOK///////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////


 public function compartir_imagen(){


	
		  if ( $this->session->userdata('session_participante') !== TRUE ) {
		      redirect('');
		    } else {
		      
               $this->load->view( 'imagen/imagen' );
		   }   			

}






/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////PUNTUACIONES//////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function record($id_participante){
	if ( $this->session->userdata( 'session_participante' ) == TRUE ){
		$data["id_participante"] = $id_participante;
		$data["record"] 		 =   $this->modelo_registro->record_personal($data);
		
		$this->session->set_userdata('num_ticket_participante', '');

		$this->load->view( 'tickes/record',$data );
	}	

}	


//en caso de que publique en facebook llama a este para que actualice los puntos. SINO llama directo a record
function publico(){  //si la persona publico el ticket en facebook
	if ( $this->session->userdata( 'session_participante' ) == TRUE ){
		
		$data["id_participante"] = $this->session->userdata( 'id_participante' );

		$data 						= $this->security->xss_clean( $data );
		$guardar 				    = $this->modelo_registro->actualizar_redes( );
        
		redirect('/record/'.$data["id_participante"]);
	}	
}	

function tabla_general(){
	
		$data["records"] 		=  $this->modelo_registro->record_general();
		$this->load->view( 'dashboard/tabla_general',$data );

}	



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////auxiliares//////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function configuraciones_imagenes(){
			    $configuraciones = $this->modelo_registro->listado_imagenes();
				
				if ( $configuraciones != FALSE ){

					if (is_array($configuraciones)){
						$this->session->set_userdata('cantimagen', count($configuraciones) ) ;	
						foreach ($configuraciones as $configuracion) {
							$this->session->set_userdata('i'.$configuracion->id, $configuracion->valor);
							$this->session->set_userdata('ip'.$configuracion->id, $configuracion->puntos);
						}

					}
						

					
				} 

	}


	public function configuraciones(){
			    $configuraciones = $this->modelo->listado_configuraciones();
				
				if ( $configuraciones != FALSE ){

					if (is_array($configuraciones))
						foreach ($configuraciones as $configuracion) {
							$this->session->set_userdata('c'.$configuracion->id, $configuracion->valor); 
							$this->session->set_userdata('a'.$configuracion->id, $configuracion->activo);
						}
					
				} 

	}



	function validar_premios(){  //NO FUNCIONA ERA PARA LOS PREMIOS
   		echo true;
	}	



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////recuperar y desloguear participante//////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//recuperar constraseña OK
	function recuperar_participante(){ //NO FUNCIONA ERA PARA RECUPERAR CONTRASEÑA
		$this->load->view('registros/recuperar_password');
	}
	
	
	function validar_recuperar_participante(){  //NO FUNCIONA ERA PARA RECUPERAR CONTRASEÑA
		$this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email|xss_clean');

		if ( $this->form_validation->run() == FALSE ){
			echo validation_errors('<span class="error">','</span>');
		} else {
				$data['email']		=	$this->input->post('email');
				$correo_enviar      =   $data['email'];
				$data 				= 	$this->security->xss_clean($data);  
				$usuario_check 		=   $this->modelo_registro->recuperar_contrasena($data);

				if ( $usuario_check != FALSE ){
						$data= $usuario_check[0]; 	
						$desde = $this->session->userdata('c1');
						$this->email->from($desde,$this->session->userdata('c2'));
						$this->email->to($correo_enviar);
						$this->email->subject('Recuperación de contraseña de '.$this->session->userdata('c2'));
						$this->email->message($this->load->view('registros/correos/envio_contrasena', $data, true));
						
						if ($this->email->send()) {
						
							echo TRUE;						
						} else 
							echo false;	
				} else {
					echo '<span class="error">Tus datos no son correctos, verificalos e intenta nuevamente por favor.</span>';
				}
		}
	}		

	public function desconectar_participante(){
		$this->session->sess_destroy();
		redirect('');
	}		


/////////////////validaciones/////////////////////////////////////////	

	function cadena_noacepta( $str ){
		$regex = "/(uefa|casaley|champio)/i";
		if ( preg_match( $regex, $str ) ){			
			$this->form_validation->set_message( 'cadena_noacepta',"<b class='requerido'>*</b> La información introducida en <b>%s</b> no está permitida." );
			return FALSE;
		} else {
			return TRUE;
		}
	}


	function valid_fecha( $str, $campo ){
		if ($this->input->post($campo)){
			
			
			$fecha_inicial =  strtotime( date("Y-m-d", strtotime("05/02/2017") ) );
		    $fecha_compra  =  strtotime( date("Y-m-d", strtotime($this->input->post($campo)) ) );
			          $hoy =   strtotime(date("Y-m-d") );
			if ( ($fecha_compra>=$fecha_inicial) && ($fecha_compra<=$hoy) ) {
				return true;
			} else {
				$this->form_validation->set_message( 'valid_fecha',"<b class='requerido'>*</b> Su <b>%s</b> es incorrecta." );	
				return false;
			}

		} else {
			$this->form_validation->set_message( 'valid_fecha',"<b class='requerido'>*</b> Es obligatorio <b>%s</b>." );
			return false;
		}	

	}



	function accept_terms($str,$campo) {
        if ($this->input->post($campo)){
			return TRUE;
		} else {
			$this->form_validation->set_message( 'accept_terms',"<b class='requerido'>*</b> Favor lee y acepta tu <b>%s</b>." );
			return FALSE;
		}
	}

	function valid_phone( $str ){
		if ( $str ) {
			if ( ! preg_match( '/\([0-9]\)| |[0-9]/', $str ) ){
				$this->form_validation->set_message( 'valid_phone', "<b class='requerido'>*</b> El <b>%s</b> no tiene un formato válido." );
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}

	function valid_nacimiento( $str, $campo ){
		if ($this->input->post($campo)){
			$hoy =  new DateTime (date("Y-m-d", strtotime(date("d-m-Y"))) );
			$fecha_nac = new DateTime ( date("Y-m-d", strtotime($this->input->post($campo)) ) );
			$fecha = date_diff($hoy, $fecha_nac);
			if ( ($fecha->y>=18) && ($fecha->y<=150) ) {
				return true;
			} else {
				$this->form_validation->set_message( 'valid_nacimiento',"<b class='requerido'>*</b> Su <b>%s</b> debe ser mayor a 18 años." );	
				return false;
			}

		} else {
			$this->form_validation->set_message( 'valid_nacimiento',"<b class='requerido'>*</b> Es obligatorio <b>%s</b>." );
			return false;
		}	

	}



	public function valid_cero($str) {
		return (  preg_match("/^(0)$/ix", $str)) ? FALSE : TRUE;
	}

	function nombre_valido( $str ){
		 $regex = "/^([A-Za-z ñáéíóúÑÁÉÍÓÚ]{2,60})$/i";
		//if ( ! preg_match( '/^[A-Za-zÁÉÍÓÚáéíóúÑñ \s]/', $str ) ){
		if ( ! preg_match( $regex, $str ) ){			
			$this->form_validation->set_message( 'nombre_valido',"<b class='requerido'>*</b> La información introducida en <b>%s</b> no es válida." );
			return FALSE;
		} else {
			return TRUE;
		}
	}



	function valid_option( $str ){
		if ($str == 0) {
			$this->form_validation->set_message('valid_option', "<b class='requerido'>*</b> Es necesario que selecciones una <b>%s</b>.");
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function valid_date( $str ){

		$arr = explode('-', $str);
		if ( count($arr) == 3 ){
			$d = $arr[0];
			$m = $arr[1];
			$y = $arr[2];
			if ( is_numeric( $m ) && is_numeric( $d ) && is_numeric( $y ) ){
				return checkdate($m, $d, $y);
			} else {
				$this->form_validation->set_message('valid_date', "<b class='requerido'>*</b> El campo <b>%s</b> debe tener una fecha válida con el formato DD-MM-YYYY.");
				return FALSE;
			}
		} else {
			$this->form_validation->set_message('valid_date', "<b class='requerido'>*</b> El campo <b>%s</b> debe tener una fecha válida con el formato DD/MM/YYYY.");
			return FALSE;
		}
	}

	public function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

	////Agregado por implementacion de registro insitu para evento/////
	public function opcion_valida( $str ){
		if ( $str == '0' ){
			$this->form_validation->set_message('opcion_valida',"<b class='requerido'>*</b>  Selección <b>%s</b>.");
			return FALSE;
		} else {
			return TRUE;
		}
	}


}

/* End of file main.php */
/* Location: ./app/controllers/main.php */