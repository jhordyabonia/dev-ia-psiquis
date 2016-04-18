<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
 
 /*
//hook para la función navegadores
$hook['post_controller_constructor'][] = array(
                                'class'    => 'Check_nav_disp',
                                'function' => 'navegadores',
                                'filename' => 'Check_nav_disp.php',
                                'filepath' => 'hooks'
                                );
 

//hook para la función robot
$hook['post_controller_constructor'][] = array(
                                'class'    => 'Check_nav_disp',
                                'function' => 'robot',
                                'filename' => 'Check_nav_disp.php',
                                'filepath' => 'hooks'
                                );
	
//hook para la función plataforma			
$hook['post_controller_constructor'][] = array(
                                'class'    => 'Check_nav_disp',
                                'function' => 'plataforma',
                                'filename' => 'Check_nav_disp.php',
                                'filepath' => 'hooks'
                                );
*/								
//hook para la función dispositivos
$hook['post_controller_constructor'][] = array(
                                'class'    => 'Check_nav_disp',
                                'function' => 'dispositivos',
                                'filename' => 'Check_nav_disp.php',
                                'filepath' => 'hooks'
                                );

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */