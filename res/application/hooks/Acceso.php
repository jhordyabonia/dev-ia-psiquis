<?php


class Acceso
{
	
	

	function identificado(){
		$this->CI=&get_instance();
		$controllersprivados = array(
			'registroproducto', 'tablero_usuario',
			 'organizar_productos','reg_oferta',
			 'organizar_ofertas','mensajes_usuario',
			 'contactos','bloquear_contacto',
			 'contactar_usuario');

		// if($this->CI->session->userdata('logged_in')==true && $this->CI->router->method == 'login') redirect ('index_control');
		// if($this->CI->session->userdata('logged_in')!=true && $this->CI->router->method != 'login') redirect('user/login'); 

		// if($this->CI->session->userdata('logged_in')!=true && $this->CI->router->method != 'login' && in_array($this->CI->router->class,$controllersprivados)) redirect('user/login'); 
		// if($this->CI->session->userdata('is_logued_in')==true && $this->CI->router->method == 'index') redirect ('index');
		 if($this->CI->session->userdata('is_logued_in')!=true && in_array($this->CI->router->class,$controllersprivados)) redirect('index'); 
	}
}


?>
<?//=$this->session->userdata('is_logued_in');?>