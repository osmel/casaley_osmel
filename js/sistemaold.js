jQuery(document).ready(function($) {

	var opts = {
		lines: 13, 
		length: 20, 
		width: 10, 
		radius: 30, 
		corners: 1, 
		rotate: 0, 
		direction: 1, 
		color: '#E8192C',
		speed: 1, 
		trail: 60,
		shadow: false,
		hwaccel: false,
		className: 'spinner',
		zIndex: 2e9, 
		top: '50%', // Top position relative to parent
		left: '50%' // Left position relative to parent		
	};


	
        jQuery('.icheck1').each(function() {
            var checkboxClass = jQuery(this).attr('data-checkbox') ? jQuery(this).attr('data-checkbox') : 'icheckbox_minimal-grey';
            var radioClass = jQuery(this).attr('data-radio') ? jQuery(this).attr('data-radio') : 'iradio_minimal-grey';

            if (checkboxClass.indexOf('_line') > -1 || radioClass.indexOf('_line') > -1) {
                jQuery(this).iCheck({
                    checkboxClass: checkboxClass,
                    radioClass: radioClass,
                    insert: '<div class="icheck_line-icon"></div>' + jQuery(this).attr("data-label")
                });
            } else {
                jQuery(this).iCheck({
                    checkboxClass: checkboxClass,
                    radioClass: radioClass
                });
            }
        });

	
	jQuery(".navigacion").change(function()	{
	    document.location.href = jQuery(this).val();
	});

   	var target = document.getElementById('foo');


		jQuery("#fecha_nac").dateDropdowns({
					submitFieldName: 'fecha_nac', //Especificar el "atributo name" para el campo que esta oculto
					submitFormat: "dd-mm-yyyy", //Especificar el formato que la fecha tendra para enviar
					displayFormat:"dmy", //orden en que deben ser prestados los campos desplegables. "dia, mes, año"
					//initialDayMonthYearValues:['Día', 'Mes', 'Año'],
					yearLabel: 'Año', //Identifica el menú desplegable "Año"
					monthLabel: 'Mes', //Identifica el menú desplegable "Mes"
					dayLabel: 'Día', //Identifica el menú desplegable "Día"
					monthLongValues: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
					monthShortValues: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					daySuffixes: false,  //que no tengan sufijo
					minAge:18, //edad minima
					maxAge:150, //edad maxima

				});

   	//https://github.com/IckleChris/jquery-date-dropdowns
/*
	jQuery('.input-group.date.nac').datepicker({
		//startView: 2,
		format: "dd-mm-yyyy",
	    language: "es",
	    autoclose: true,
	    todayHighlight: true

	});

	jQuery("#fecha_nac").inputmask("99-99-9999", {
            "placeholder": "dd-mm-yyyy",
            //clearMaskOnLostFocus: true
            //'autoUnmask' : true
    });*/

    //Inputmask.unmask("23/03/1973", { alias: "dd/mm/yyyy"}); //23031973



	jQuery('.input-group.date.compra').datepicker({
		//startView: 2,
		
		format: "mm/dd/yy",
		startDate: "04/27/2017", //"-2d"
		endDate: "+0d", 
	    language: "es",
	    autoclose: true,
	    todayHighlight: true

	});



	//gestion de usuarios (crear, editar y eliminar )
	jQuery('body').on('submit','#form_participantes', function (e) {	


		jQuery('#foo').css('display','block');
		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				if(data != true){
					
					spinner.stop();
					jQuery('#foo').css('display','none');
					
					jQuery('#msg_tienda').html(data.tienda);
					jQuery('#msg_ticket').html(data.ticket);
					jQuery('#msg_transaccion').html(data.transaccion);
					jQuery('#msg_clave_producto').html(data.clave_producto);
					jQuery('#msg_compra').html(data.compra);
					jQuery('#msg_id_litraje').html(data.id_litraje);
					jQuery('#msg_cantidad').html(data.cantidad);					
  				    jQuery('#msg_general').html(data.general);
				


				}else{


						spinner.stop();
						jQuery('#foo').css('display','none');

						var url = "/proc_modal_instrucciones";
						jQuery('#modalMessage').modal({
						  	show:'true',
							remote:url,
						}); 	

						/*
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
						*/






				}
			} 
		});
		return false;
	});	

jQuery("body").on('hide.bs.modal','#modalMessage[ventana="redi_ticket"]',function(e){	
	//alert('asdasdasdas');
	$catalogo = jQuery(this).attr('valor'); //e.target.name;
	window.location.href = '/'+$catalogo;						    
});





	//gestion de usuarios (crear, editar y eliminar )
	jQuery('body').on('submit','#form_reg_participantes', function (e) {	


		jQuery('#foo').css('display','block');
		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				if(data != true){
					
					spinner.stop();
					jQuery('#foo').css('display','none');
					
					jQuery('#msg_nombre').html(data.nombre);
					jQuery('#msg_apellidos').html(data.apellidos);
					jQuery('#msg_nick').html(data.nick);
					jQuery('#msg_email').html(data.email);
					jQuery('#msg_id_estado').html(data.id_estado);
					jQuery('#msg_pass_1').html(data.pass_1);
					jQuery('#msg_pass_2').html(data.pass_2);					

					jQuery('#msg_celular').html(data.celular);					
					jQuery('#msg_telefono').html(data.telefono);					
					jQuery('#msg_coleccion_id_aviso').html(data.coleccion_id_aviso);					
					jQuery('#msg_coleccion_id_base').html(data.coleccion_id_base);					
					jQuery('#msg_fecha_nac').html(data.fecha_nac);					
					jQuery('#msg_general').html(data.general);
				

				}else{
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
				}
			} 
		});
		return false;
	});	



  	jQuery("#ticket").inputmask("9999 9999 9999 9999 9999 999", {
            placeholder: " ",
            clearMaskOnLostFocus: true
    });

 	

	jQuery('body').on('submit','#form_registrar_ticket', function (e) {	


		jQuery('#foo').css('display','block');
		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				if(data != true){

					
					spinner.stop();
					jQuery('#foo').css('display','none');
					jQuery('#msg_general').html(data.general);
					/*
					jQuery('#messages').css('display','block');
					jQuery('#messages').addClass('alert-danger');
					jQuery('#messages').html(data);
					jQuery('html,body').animate({
						'scrollTop': jQuery('#messages').offset().top
					}, 1000);*/
				}else{
					
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
				}
			} 
		});
		return false;
	});	


//logueo y recuperar contraseña
	jQuery("#form_logueo_participante").submit(function(e){
		jQuery('#foo').css('display','block');

		var spinner = new Spinner(opts).spin(target);

		jQuery(this).ajaxSubmit({
			dataType : 'json',
			success: function(data){
				
				if(data != true){
					spinner.stop();
					jQuery('#foo').css('display','none');

		
					jQuery('#msg_nick').html(data.nick);
					jQuery('#msg_contrasena').html(data.contrasena);
  				    jQuery('#msg_general').html(data.general);
				

					
				}else{
						$catalogo = e.target.name;
						spinner.stop();
						jQuery('#foo').css('display','none');
						window.location.href = '/'+$catalogo;				
				}
			} 
		});
		return false;
	});







		//para cerrar de compartir facebook
		jQuery('body').on('click','#deleteUserSubmit', function (e) {	
			$catalogo = e.target.name;
			window.location.href = '/'+$catalogo;	
		});


		//para cuando oculte el compartir facebook, de un click fuera
		jQuery("body").on('hide.bs.modal','#modalMessage[ventana="redireccion"]',function(e){	
			$catalogo = jQuery(this).attr('valor'); //e.target.name;
			window.location.href = '/'+$catalogo;						    
		});	



		//para la "modal_instrucciones" y para "modal_reintentar"
		jQuery('body').on('submit','#form_sino', function (e) {	
			jQuery('#foo').css('display','block');

			var spinner = new Spinner(opts).spin(target);

			jQuery(this).ajaxSubmit({
				success: function(data){
					
					if(data != true){
						spinner.stop();
						jQuery('#foo').css('display','none');
						jQuery('#messages').css('display','block');
						jQuery('#messages').addClass('alert-danger');
						jQuery('#messages').html(data);
						jQuery('html,body').animate({
							'scrollTop': jQuery('#messages').offset().top
						}, 1000);
					}else{
							$catalogo = e.target.name;
							spinner.stop();
							jQuery('#foo').css('display','none');
							window.location.href = '/'+$catalogo;				
					}
				} 
			});
			return false;
		});

    		





	 		 

	         
	        //para la modal de las instrucciones
			jQuery('body').on('submit','#form_jugar', function (e) {	

			    jQuery('.spinBtn').css('pointer-events','none'); //inhbailitar el boton submit

			    
			    $cant_botones = jQuery("#cant_botones").val();
			    $cant_botones = $cant_botones ?  $cant_botones : 0;

			    var url = "/proc_modal_ticket/"+jQuery.base64.encode(minutes + ':' + seconds)+'/'+jQuery.base64.encode( $cant_botones);
			   		
			   		jQuery('#modalMessage').modal({
			            show:'true',
			          remote:url,
			        });
			   return false;

			});


	        
	        //reintentar
			jQuery("body").on('hide.bs.modal','#modalMessage2[ventana="redi_reintentar"]',function(e){	
				location.reload();
			});



	        var hash_url = window.location.pathname;

	        if  (hash_url=="/registro_ticket") { //registro ticket
	            
	            jQuery.ajax({
	                      url : '/num_conteo',
	                      /*data : { 
	                        //play: play,
	                      },*/
	                      //type : 'POST',
	                      dataType : 'json',
	                      success : function(data) {  
	                          //play = data.play;


	                      if   (  (data.registro_ticket==true) )  {  //Si esta jugando entonces 


	                      	
	                      	//console.log(data.comenzar);
	                        if (data.comenzar !== 1) { //es la primera vez que entra es decir es igual a 5:00
	                          localStorage.setItem('miTiempo',  data.tiempo_comienzo );
	                        
	                        } 


		                     

	                        
	                        var timer2 = localStorage.getItem('miTiempo');  

	                        var interval = setInterval(function() {

				                          //si llego a cero o es menor que cero
				                          if (  ((localStorage.getItem('miTiempo') =="0:00") || (localStorage.getItem('miTiempo').substring(0, 1) =="-") )  ) {
				                                 // $('#form_jugar').trigger('submit');
				                                 
				                                // $('#form_sino').trigger('submit');

				                            if (data.cant_repetir!=0) {
		                    						var url = "/proc_modal_reintentar";
													jQuery('#modalMessage2').modal({
													  	show:'true',
														remote:url,
													}); 	
				                            }   else {

				                            	$('#form_jugar').trigger('submit');

				                            } 

				                                 
				                          }


		                                var timer = timer2.split(':');
		                                //by parsing integer, I avoid all extra string processing
		                                minutes = parseInt(timer[0], 10);
		                                seconds = parseInt(timer[1], 10);
		                                --seconds;
		                                minutes = (seconds < 0) ? --minutes : minutes;
		                                if (minutes < 0) clearInterval(interval);
		                                seconds = (seconds < 0) ? 59 : seconds;
		                                seconds = (seconds < 10) ? '0' + seconds : seconds;
		                                //minutes = (minutes < 10) ?  minutes : minutes;
		                                if (localStorage.getItem('miTiempo').substring(0, 1) !="-"){
		                                  $('.countdown').html(minutes + ':' + seconds);
		                                } else {
		                                    $('.countdown').html('0:00');
		                                } 

		                                timer2 = minutes + ':' + seconds;
		                                localStorage.setItem('miTiempo', minutes + ':' + seconds);

		                                if (localStorage.getItem('miTiempo').substring(0, 1) =="-"){
		                                    $('.countdown').html('0:00');
		                                }   

	                        }, 1000)  //fin del tiempo interval
	                    } //if   (  (data.registro_ticket==true) )  {   

	                  } //fin del success
	            });  // fin jQuery.ajax
	        }  //fin de registro de ticket  

	      
	    

	var minutes;
	var seconds;








});	