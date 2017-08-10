<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); ?>


 <!-- contenido-->
<div class="container mecanica desk">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$this->session->userdata('c16'); ?>" class="img-responsive img-center">
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$this->session->userdata('c17'); ?>" class="img-responsive img-center">
		</div>
	</div>
</div>

<div class="container mecanica movil">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$this->session->userdata('c24'); ?>" class="img-responsive img-center">
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<img src="<?php echo base_url().$this->session->userdata('c25'); ?>" class="img-responsive img-center">
		</div>
	</div>
</div>



<?php $this->load->view( 'footer' ); ?>