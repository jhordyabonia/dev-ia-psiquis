<?php if (!defined( 'BASEPATH')) exit('No direct script access allowed');
 
class Check_nav_disp
{
	
    private $ci;
	
    public function __construct()
    {
        $this->ci =& get_instance();
		
        !$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;
		
		!$this->ci->load->library('user_agent') ? $this->ci->load->library('user_agent') : false;
 
	}
	
	//controlamos desde el navegador que llegan nuestros usuarios
    public function navegadores()
    {
        
		if ($this->ci->agent->is_browser('Chrome'))
		{
			
			#echo 'Está usándose Chrome.';
		
		}else if ($this->ci->agent->is_browser()){
			
			echo 'Está usando un navegador.';
		
		}
		
    }
	
	//podemos detectar si es un dispositivo móvil
	public function dispositivos()
	{
		
		if ($this->ci->agent->is_mobile('iphone'))
		{
			
			//mostramos el nombre del dispositivo que nos visita
			//y cargamos la vista correspondiente
			#echo $this->ci->agent->mobile();
			#$this->ci->load->view('iphone');
		
		}else if ($this->ci->agent->is_mobile()){
			
			//mostramos el nombre del dispositivo que nos visita
			//y cargamos la vista correspondiente
			#echo $this->ci->agent->mobile();
			#$this->ci->load->view('mobile');
			
		}else{
			
			//cargamos la vista home
			#echo '<br>el dispositivo es de otro tipo';
			#$this->ci->load->view('home');
			#sredirect(base_url()."/tablero_usuario");
			
		}
		
	}
	
	//el nombre de los robots que nos visitan
	public function robot()
	{
		
		if($this->ci->agent->is_robot())
		{
			
			//podemos guardar el nombre del robot
			echo $this->ci->agent->robot();
			
		}
		
	}
	
	//la plataforma/sistema operativo desde que nos visita el usuario
	public function plataforma()
	{
		
		//obtenemos el nombre del sistema operativo (Linux, Windows, OS X, etc.).
		echo $this->ci->agent->platform();
		
	}

	public function identificado(){
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
		 if($this->CI->session->userdata('is_logued_in')!=true && in_array($this->CI->router->class,$controllersprivados)) redirect('logueo'); 
	}
}
/*
/end hooks/Check_nav_disp.php
*/