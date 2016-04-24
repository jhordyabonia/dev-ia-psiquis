<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}



class Index extends CI_Controller 
{
    	///Constructor de la clase del control
	function __construct() 
    {parent::__construct();}
    public function index()
    {
        redirect('http://www.proveedor.com.co');
    }
}