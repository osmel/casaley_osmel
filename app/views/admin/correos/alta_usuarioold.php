<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "https://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $this->session->userdata('c2'); ?></title>
</head>
<body style="background:#e9e9e9">
<?php 
	if (!isset($retorno)) {
      	$retorno ="";
    }
 ?> 

	<table border="0" cellspacing="0" cellpadding="0" style="margin:30px auto; padding:0px; max-width:580px; width:100%">
	  <tr>
	   	 <td scope="row" style=" height:45px;background-color:#e7d513">
	   	 	<img alt="Bienvenido" src="<?php echo base_url().$this->session->userdata('c27'); ?>">
	    	<p style="font-family:'Myriad Pro', 'Myriad Pro Bold', Verdana, Arial; font-size:14px; color:#5e6d81; text-align:center">
	    	 <div style="color:#902227; text-align:center;font-family:'Myriad Pro', 'Myriad Pro Bold', Verdana, Arial; font-size:24px;padding:0 0 30px 0">
	    	 USUARIO: <b><?php echo $email; ?></b><br>
	    	 CONTRASEÑA: <b><?php echo $contrasena; ?></b>
	    	 </div>
			<img alt="Bienvenido" src="<?php echo base_url().$this->session->userdata('c28'); ?>">
	    	</p>
	   	 </td>
	  </tr>

	  <tr>
	    <td scope="row" style="border-top:1px solid #ebbb34; padding: 5px;">
			<p style="text-align:center">			
				<a href="<?php echo base_url(); ?><?php echo $retorno; ?>" name="boton" style="background:#e7d513; font-family:'Myriad Pro', 'Myriad Pro Bold', Verdana, Arial; font-size:18px; color:#902227; padding:10px; border:none; text-decoration:none;">
					IR AL CONCURSO
				</a>
			</p>
	    	<p style="font-family:'Myriad Pro', 'Myriad Pro Bold', Verdana, Arial; font-size:14px; color:#5e6d81; text-align:center">		
			Si requieres ayuda o tienes alguna duda contáctanos a: <b><?php echo $this->session->userdata('c1'); ?> </b><br>
			Atención al cliente:  <b>01800 890 98 59</b><br>								
			</p>
			
	    </td>
	  </tr>	  
	  
	</table>
	

</body>
</html>




