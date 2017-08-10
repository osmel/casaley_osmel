<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<nav class="navbar navbar-fixed-top menu-top" role="navigation">

	<div class="navbar-header">
      
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="<?php echo base_url(); ?>">
      	<img src="<?php echo base_url().$this->session->userdata('c4'); ?>">
      </a>

    </div>

		<?php 
			  $perfil= $this->session->userdata('id_perfil'); 
			  $especial= $this->session->userdata('especial'); 

		 ?>	
	<div class="login_out">
		<ul>
			<?php if ($this->session->userdata('session_participante') == true) { ?>

					<li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> <?php echo "@".$this->session->userdata('nick_participante') ?> </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                        	<li>
                                <a href="<?php echo base_url(); ?>record/<?php echo $this->session->userdata('id_participante'); ?>" >
                                    <i class="icon-user"></i> Mis Tickets
                                </a>
                            </li>                            
                            <li>
                                <a href="/desconectar">
                                	<i class="icon-key"></i> Salir 
                                </a>
                            </li>
                        </ul>
                    </li>
             <?php }else{ ?>
					<li>
						<a href="<?php echo base_url(); ?>registro_usuario">Ingresar / Crear cuenta</a>
					</li>
             <?php } ?> 

		</ul>
	</div>

	<div class="collapse navbar-collapse" id="main-navbar">
		<ul class="nav navbar-nav navegacion" id="menu_opciones">
			<li>
				<a href="<?php echo base_url(); ?>#reg_ticket" class="">registro tickets</a> 
			</li>
			<li>
				<a href="<?php echo base_url(); ?>#mecanica" class="">mecánica y premios</a> 
			</li>
			<li>
				<a href="<?php echo base_url(); ?>#legales" class="">Legales</a> 
			</li>
			<li>
				<a href="<?php echo base_url(); ?>registro_ticket" class="">Ingresar</a> 
			</li>
			<li>
				<a href="<?php echo base_url(); ?>registro_usuario" class="">crear cuenta</a> 
			</li>
		</ul>
	</div>
	

	
	
</nav>
