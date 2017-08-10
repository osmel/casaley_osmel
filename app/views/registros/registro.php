<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view( 'header' ); ?>
<?php $this->load->view( 'navbar' ); 

redirect('/registro_ticket', 'refresh');

?>

 <?php 

	if (!isset($retorno)) {
      	$retorno ="registro_ticket";
    }

 ?>
		
<?php $this->load->view('footer'); ?>