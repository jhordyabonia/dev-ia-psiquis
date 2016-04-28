<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}



class Psiquis extends CI_Controller {

	///Constructor de la clase del control
	function __construct() 
    {
		parent::__construct();
        
		$this->load->library(array('session'));
       	$this->load->model('Psiquis_model','psiquis');
        $this->data['titulo']='Psiquis';
      
        $this->javascript="
            <script>
                function login()
                {
                    document.getElementById('auto_launch').click();
                }
                function asistente(id,valor)
                {                     
                    document.getElementById('input'+id).value=valor.innerText;
                    var next=document.getElementById('div'+(id+1));
                    if(next==null)return document.f.submit();
                    document.getElementById('div'+id).style.display='none';
                    next.style.display=''; 
                 }
                 function inputs()
                 {
                     var v=document.getElementsByTagName('input');
                     for(var i=0;i<v.length;i++)                        
                        v[i].onchange=function(){this.className=this.className.replace('input_txt');};
                 }
                 window.onload=inputs;
            </script>";
        $this->css_x="<style>
                HTML 
                {
                background-image: url(".base_url()."uploads/background_tienda.png);
                background-repeat: repeat-x;
                background-color: #000;
                -webkit-text-size-adjust: none;
                }
                </stylee>";
        $this->css="
            <style>
            /*******Social start********/
            
            .inline p{
	display: inline-block;
    margin: 10px 0px 10px;
    padding: 0;
}
.well-social{
	margin-top: 23px;
}
a.share-btn{
	color:#fff;
	text-decoration:none
}
.share-btn {
	cursor:pointer;
	color: #fff;
	border: none;
	padding: 12px 10px 11px 10px;
	-webkit-font-smoothing: subpixel-antialiased;
	-webkit-transition: border .25s linear,color .25s linear,background-color .25s linear;
	transition: border .25s linear,color .25s linear,background-color .25s linear
}
.share-btn span{
	font-family: sans-serif
}
.share-btn:hover {
	background-color: rgba(220,220,220,0.5);
	color: #000;
	text-decoration:none;
}
.s_facebook {
	background-color: #4769a5;
	border-color: #354d79;
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.15)
}
.s_twitter {
	background-color: #51a3bf;
	border-color: #408299;
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.15)
}
.s_plus {
	background-color: #bf3727;
	border-color: #932b1f;
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.15)
}
.s_linkedin {
	background-color: #2ba3e1;
	border-color: #207aa8;
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.15)
}

.s_email {
	background-color: #4c75a3;
	border-color: #39587b;
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.15)
}
.s_whatsapp {
	background-color: #08C65B;
	border-color: #39587b;
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.15);
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.15)
}
.list-inline > li {
     padding-right: 0px!important; }
            /*******Social end**********/
            .img{
                padding: 5%;
                max-width: 100%;
            }
            .nav_bar
            {
                padding: 1%;
                border: 1px solid whitesmoke;
                position: fixed;
                width: 100%;
                height: 7%;
                background-color: rgba(250,250,250,0.5);
                z-index: 1;
            }
            .div2
            {
                margin: 2%;
                border: 1px solid whitesmoke;
            }
            .div 
            {
               width: 100%;
               padding: 10px 15px 10px 15px;
               border: 1px solid lightgray;
               margin: 1%;
               text-align: justify;
               cursor:pointer;
             }
                input:invalid 
                { border: 1px solid red;}
                        
                input:valid 
                {border: 1px solid green;}
                input
                { color:black!important;}
                .input_txt
                { border: 1px solid #0C82CF!important;}
                .continuar
                {
                    float: right;
                    font-size: 18px;
                    margin-right: 3%;
                    margin-bottom: 1%;
                }
                .next
                {
                    float: left;
                    margin-left: -16%;
                    font-size: 53px;
                    z-index: 2;
                    position: absolute;
                }
                .h 
                {
                    padding-top:10%;
                }
                .asistente
                {
                    position: absolute;
                    min-height: 290px!important;
                    top: 15%;
                    left: 22%;
                    width: 60%;
                    box-shadow: rgba(0,0,0,0.6) -36px 118px 10px 340px;
                    border: 2px solid;
                    border-radius: 25px;
                    background-color: #fff;
                }
                .a{
                  margin-top:5px;  
                  margin-bottom:5px;  
                }
                .bit{
                  color:white;
                  background-color:lightgray;
                }
                .i{
                     color: white;
                    float: left;
                    max-height: 50%;
                    max-width: 48%;
                    margin: 1%;
                }
                .h{
                    /* border: 1px solid whitesmoke; */
                    /* margin: 2%; */
                    background-color: rgba(250,250,250,0.5);
                    position: absolute;
                    top: 8%;
                 }
                 
                .c 
                {
                     width: 100%;
                     padding: 3% 0% 3% 0%;
                     margin: 1% 0% 1% 0%;
                 }
                 .option
                 {
                      padding-left: 2%;
                      padding-right: 2%;
                 }
                 .top {
                    background-color: #0C82CF;
                    height: 100px;
                    color: white;
                    padding: 3%;
                    font-family: verdana;
                    font-weight: bold;
                    font-size: 160%;
                }
                .body {
                    padding: 5% 8% 0% 5%;
                }
                .registro {
                    float: right;
                    background: linear-gradient(#FDCC50,#FEB204);
                    color: white;
                    font-size: 170%;
                }
                .item_nav_bar
                {  
                    color: black;
                    font-size: 130%;
                    float: right;
                    padding: 2% 1% 0% 1%;
                }
                .desktop
                {
                    background-color: #0C82CF;
                }
                #title_welcome
                {
                    color:#0C82CF;
                }                
            </style>";
    }   
    function index()
    {
        return $this->welcome();
        $data=$this->psiquis->get_all();
        foreach ($data as $key => $value)
              $value->data=$this->psiquis->get_all(array('usuario'=>$value->id),'*','data_usuario');
              
        foreach ($data as $key => $value)
              $value->items=$this->psiquis->get_all(array('usuario'=>$value->id),'*','item');
        
        foreach ($data as $key => $value)
            foreach ($value->items as $key1 => $value1) 
                $value1->data=$this->psiquis->get_all(array('item'=>$value1->id),'*','data_item');
        
        
        echo $this->search('nombre',$data),'<br>';
        echo "<PRE>";
        print_r($data);
        echo "</PRE>";        
    }
    private function implode_default($data,$out) 
    {
        foreach ($data as $key => $value)
            if(!(is_object($value)||is_array($value)))
                 $out->$key=$value;
            else $this->implode_default($value,$out);
         
         return $out;        
    }
    private function implode($data,$out)
    {
        foreach ($data as $key => $value)
        {
             if(is_int($key)&&is_object($value))
            {
                if(is_object($value->clave)||is_array($value->clave))
                    $this->implode($value->valor,$out,$key_t);                    
                else{ $n=$value->clave;$out->$n=$value->valor;    }
            }       
            else if(is_int($key)&&is_array($value))
            {
                if(is_object($value['clave'])||is_array($value['clave']))
                    $this->implode($value['valor'],$out,$key_t);                    
                else $out->$value['clave']=$value['valor'];    
            } 
           # else $out->$key=$this->implode($value,$out);
            else $this->implode($value,$out,$key_t);
        }
        return $out;
    }
    
public function compartir($url='',$titulo='Psiquis, la primera app que te optimiza a ti no a tu teléfono',$descripcion='',$img='psiquis.png')
    {
        $url.=$url==''?base_url().'psiquis':'';
        $url=rawurlencode($url);
        
        echo "
            <p align='center' >
            <br>
            ¿Quien más crees que podría interesarle optimiar su rendimiento?
            </p><br>
            <p align='center' >
            <ul class='list-inline center-block text-center'>
            <li>
                <a href='https://www.facebook.com/sharer/sharer.php?m2w&s=100&p%5Burl%5D=$url'
                 type='button' class='btn share-btn share s_facebook'>
                    <i class='fa fa-facebook fa-fw'></i>
                </a>
            </li>
            <li>
                <a href='https://plus.google.com/share?url=$url' type='button' class='btn share-btn share s_plus'>
                    <i class='fa fa-google fa-fw'></i>
                </a>
            </li>
            <li>
                <a href='https://twitter.com/intent/tweet?url=$url&text=$titulo' type='button' class='btn share-btn share s_twitter'>
                    <i class='fa fa-twitter fa-fw'></i>
                </a>
            </li>
            <li>
                <a href='https://www.linkedin.com/shareArticle?mini=true&url=$url&title=$titulo&summary=$descripcion' type='button' class='btn share-btn share s_linkedin'>
                    <i class='fa fa-linkedin fa-fw'></i>
                </a>
            </li>
            <li>
                <a href='whatsapp://send?text=$url $titulo' type='button' class='btn share-btn share s_whatsapp'>
                <i class='fa fa-whatsapp fa-fw'></i>
                </a>
            </li>
            <li>
                <a href='mailto:?subject=%27$titulo%27&body=$descripcion' type='button' class='btn share-btn share s_email'>
                    <i class='fa fa-envelope fa-fw'></i>
                </a>
            </li>
        </ul></p>
        ";
    }
    public function testg()
    {
        echo @$this->nav_bar('NOT NAV BAR');
    }
    private function device($in)
    {
         $url=base_url().'psiquis';
         $this->ci = &get_instance();
         if ($this->ci->agent->is_mobile()||$this->movilRobot())   return $in;        
         $in.="  
         <style>
         .main_content
          {
             padding: 0%;
             border: 0!important;
             color: white;
             background-color: rgba(0,0,0,0);
           }
           .scroll
           {
                overflow-y: scroll!important;
                overflow-x: hidden!important;
                height: 550px;
           }
           .item_nav_bar
           {  
                color: white!important;
            }
            .body
             {
                padding: 2% 8% 0% 5%!important;
            }
          </style>     
          <div class='desktop'>
             <img src='".base_url()."uploads/default2.png' style='max-width:100%'>
          </div>          
          <div class='col-md-8 col-xs-8 col-lg-8 body'>
            <h3 id='title_welcome'> Bienvenido</h3>
            <p align='justify' style='font-size: larger;'>
               Psiquis es una red neuronal con la capacidad de descifrar, patrones de comportamiento humano y hacer recomendaciones, útiles, para su optimización. Mediante el análisis de simples test; en su mayoría sobre preferencias generales, gustos, y sensaciones detonadas, por una serie de imágenes y/o palabras.
            </p>
            <p align='justify' style='font-size: initial;'>
                Cada test, ha sido diseñado para obtener información especifica sobre el comportamiento del  individuo, con el fin posterior, de diagnosticar y sugerir, posibles cambios que permitan:
            <ul>
                <li> Tener una vida con menos estrés.
                <li> Ser pro-activo.
                <li> Mantener un buen estado de animo y actitud, indispensables en cualquier emprendimiento de nuestro día a día.
                <li> Adiestra a su subconsciente para fijar asociaciones mentales que lo encaminaran a donde usted decida. Promoción en su lugar de trabajo, aumentos salariales, estímulos académicos (becas), culminar proyectos inconclusos... etc. 
            </ul>
            </p>
            <p align='justify' style='font-size: initial;'>
                Usted decide, tome el control.
            </p>                        
            <p align='justify' style='font-size: 125%;'>
                El lanzamiento oficial de Psiquis, esta fijado para el segundo semestre del presente año. 
                Es un servicio que se prestará bajo pago por membresias, en esta versión beta, se permitirá 
                el registro gratuito de 500 beta tester, los cuales mantendrán, su membresia aun des pues del lanzamiento oficial, por tiempo indefinido.
           </p>  "; 
           
           $id=$this->session->userdata('id');                    
           $in.=$id==''?"
            <p>
                <a class='btn btn-default registro' href='$url/singup/lista'>Inicia ya! es gratís</a>
            </p>    
            ":'';
            $in.="            
            </div>
            <div class='col-md-3 col-xs-3 col-lg-3 scroll'>";
          return $in;
    }
    public function nav_bar($titulo=FALSE,$css=TRUE,$js=TRUE,$apace=FALSE)
    {        
        $id=$this->session->userdata('id');
        $this->data['titulo']=!$titulo?$this->data['titulo']:$titulo;         
        $nav_bar=$this->load->view('template/head',$this->data,TRUE);
        $nav_bar.=$css?$this->css:'';
        $nav_bar.=$js?$this->javascript:'';
        $url=base_url().'psiquis';
        if($titulo=='NOT NAV BAR')return $this->device($nav_bar); 
        if($id=='')        
            $nav_bar.="
            <div class='main_content nav_bar' >
            <a class='item_nav_bar' href='$url/singup/lista' style='color:#111;'>
                <i class='fa fa-check'></i>
                Registro Gratis
            </a>
            <a class='item_nav_bar' href='$url/login/lista' style='color:#111;'>
                <i class='ingresar_ico glyphicon glyphicon-user'></i>
                Ingresar
            </a>
            </div>";
         else
            $nav_bar.="
            <div class='main_content nav_bar' >
            <a class='item_nav_bar' href='$url/singup/lista' style='color:#111;'>
                <i class='fa fa-check'></i>
                Listados de tests
            </a>
            <a class='item_nav_bar' href='$url/logout' style='color:#111;'>
                <i class='ingresar_ico glyphicon glyphicon-user'></i>
                Salir
            </a>
            </div>";
        return $this->device($nav_bar).($apace?"<br><br>":'');       
        #return $nav_bar.($apace?"<br><br>":'');       
    }
    public function insert($reffer="")
    {
        $respuestas=$this->input->post('respuesta');
        $descripcion=$this->input->post('descripcion');
        $test=$this->input->post('test');
        $usuario=$this->session->userdata('id');
        $usuario=$usuario==''?$this->input->post('usuario'):$usuario;
        #echo "<PRE>";
        #print_r($respuestas);
        #echo "</PRE>"; 
        #return;
        $item['usuario']=$usuario;
        $item['descripcion']=$descripcion;
        $item['nombre']="Respuesta a test, ".$this->psiquis->get($test,'nombre','item')->nombre;
        
        $id=$this->psiquis->insert($item,'item');
        if($id==FALSE)return;
         
        $data_item=array();
        $data_item[0]['item']=$id;         
        $data_item[0]['clave']='tipo';
        $data_item[0]['valor']='respuesta';
        $data_item[1]['item']=$id;         
        $data_item[1]['clave']='test';
        $data_item[1]['valor']=$test;
        foreach ($respuestas as $key => $value)
        {
         $data_item[$key+2]['clave']="respuesta".$key+1;
         $data_item[$key+2]['valor']=$value;
         $data_item[$key+2]['item']=$id;
        }
                 
        foreach ($data_item as $key => $value)
         $this->psiquis->insert($value,'data_item');
         
        $this->psiquis->insert(array('usuario'=>$usuario,'clave'=>'history','valor'=>$test),'data_usuario');
        
        if($reffer!="")redirect(base_url().'psiquis/print_item/'.$reffer);
                 
        echo @$this->nav_bar('Psiquis - Gracias');                
        echo "<div align='center' style='width:100%'><h1><br>
        Muchas gracias, por terminar el test.</h1>
        <h2>Tus respuestas serán comparadas de forma anónima, con otras en la población similar.
        <br>Pronto te contactaremos, con los resultados.</h2><center>";        
        echo @$this->compartir();#Botones compartirredes sociles
        echo "</div>";
    }
    public function print_item($id=42,$id2='')
    {        
        $item = $this->psiquis->get($id,'*','item');
        $item->data = $this->psiquis->get_all(array('item'=>$id),'*','data_item');

        $out;
        $out->id=0;
        $item->data=$this->implode($item->data,$out);
        $out1;
        $out1->id=1;
        $item=$this->implode_default($item,$out1);
        #echo "<PRE>";
        #print_r($item);
        #echo "</PRE>";
        #return;
        echo @$this->nav_bar('Psiquis - '.$item->nombre,TRUE,TRUE,TRUE);
        $e=0;
        echo  form_open_multipart('psiquis/insert/'.$id2,array('name'=>'f'));  
        echo form_input(array('type'=>'hidden','name'=>'test','value'=>$id));#inprimir otros datos necesarios
        echo form_input(array('type'=>'hidden','name'=>'usuario','value'=>$this->session->userdata('id')));#inprimir otros datos necesarios
          
         for($a=1;$a<=$item->numero_repeticiones;$a++)
         {
            for($i=1;$i<=$item->numero_preguntas;$i++)
                {
                    $t="pregunta$i";
                    unset($recursos);
                    $recursos=explode('.',$item->recursos);
                    $none=$e++==0?'':'none';
                    #echo "<div id='div$e' style='display:$none'><h1 align='center' class='c'> $e ",$item->texto_encabezado,' ',$item->$t,'?</h1><br><br>';
                    echo $this->print_head($e, $none, $item->texto_encabezado,$item->$t,$item->imagen_encabezado);
                    echo form_input(array('id'=>"input$e",'type'=>'hidden','name'=>'respuesta[]'));
                        echo "<div class='option'>";
                            foreach ($this->psiquis->get_ran(intval($recursos[1]),$recursos[0],'valor',($i-1)*intval($recursos[1])) as $key => $value) 
                                echo $this->print_body(array('0'=>$e,'1'=>$value),$item->html_tag); 
                        echo "</div>";                    
                    echo "</div>";#print_head                    
                 }
          }
         echo  form_close();

        return;
       }
       private function print_head($e,$none, $head="",$ask="",$image=FALSE)
       {
           $url=base_url()."uploads";
            $out="<div id='div$e' align='center' style='display:$none'><div class='div2' ><h1 class='c'> $head $ask ?</h1><br></div><br>";                     
           if($image!=FALSE)
            $out="<div id='div$e' align='center' style='display:$none'>
            <div class='div2' >
            <img class='img' src='$url/$image'/>
            <h1 class='c h'> $head $ask ?</h1><br></div><br>";
            return $out;    
       }
      
    private function render_html($view,$data)
    {
         $tmp=$view;
         foreach ($data as $key => $value) 
             $tmp=str_replace("%".$key,$value,$tmp);
             
         return $tmp;
     }
    public function print_body($data,$tag)
    {
         $url=base_url().'uploads/';
         $out="<$tag class='c btn btn-default' onclick='asistente(%0,this);'>%1</$tag>"; 
         if($tag=='div')
            $out="<$tag class='$tag' onclick='asistente(%0,this);'>%1</$tag>";      
         if($tag=='span')
            $out="<$tag class='c btn btn-default' onclick='asistente(%0,this);'>%1</$tag>";      
         else if($tag=='img')                
           $out="<div style='color:white'> <$tag class='i' onclick='asistente(%0,this);' src='$url%1'>%1</$tag></div>";           
            
         return $this->render_html($out,$data);
     }       
       
    function login($reffer="")
    {
             $usuario=$this->session->userdata('id');
            if($usuario)redirect(base_url().'psiquis/'.$reffer);
            $usuario=$this->input->post('usuario');
       
            $error="";
            if($usuario)
            {
                $clave=md5($this->input->post('clave'));
                $data=$this->psiquis->get(array('usuario'=>$usuario,'clave'=>$clave));
                if($data==FALSE)
                        $data=$this->psiquis->get(array('correo'=>$usuario,'clave'=>$clave));
                if($data!=FALSE)
                {
                    $r=array('id'=>$data->id,
                    'usuario'=>$usuario,
                    'correo'=>$data->correo,
                    'clave'=>$clave);
                    $this->session->set_userdata($r);
                    redirect(base_url().'psiquis/'.$reffer);
                    return;
                }
                $error="<div align='center' style='color:#ff0000;width:100%;heigth:1%;'><h3>Usuario o clave incorrectos</h3></div>";
            }
            $this->data['titulo']='Psiquis Login';
            
            
            echo $this->css;
            echo $this->javascript;
            echo @$this->nav_bar();
            
            echo "
                    <div class='login' style='padding-top: 15%;'>
                        <link rel='stylesheet' type='text/css' href='<?php echo css_url()?>styles_login.css'>";
            echo form_open_multipart('psiquis/login/'.$reffer);            
                       
            echo "                          <div class='modal-content modal-content-login borders'>
                                <div class='modal-header borders' style='border-bottom: none;'>
                                    

                                    <img class='center-block' src='".base_url()."uploads/default.png' style='
                                        margin-top: 20%;
                                    '>

                                </div>
                                $error                                
                                <div class='modal-body text-center body_login borders'>
                                    <div class='input-group ig_name_user' style='
                                            margin: 2%;
                                            margin-bottom: 10%;
                                            margin-top: 10%;
                                        '>
                                        <span class='input-group-addon'>
                                        <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>
                                        </span>
                                            <input required min='6' max='15' type='text' class='form-control input_txt' placeholder='Nombre de Usuario' name='usuario'>
                                        </div>   
                                        <div class='input-group ig_pwd' style='
                                            margin: 2%;
                                            margin-bottom: 10%;
                                            margin-top: 10%;
                                        '>
                                            <span class='input-group-addon'>
                                            <span class='glyphicon glyphicon-asterisk' aria-hidden='true'></span>
                                            </span>
                                            <input required min='6' type='password' class='form-control input_txt' placeholder='Contraseña' name='clave'>
                                        </div>

                                        <div class='input-group center-block ig_rememberme' style='
                                            margin: 2%;
                                            margin-bottom: 10%;
                                            margin-top: 10%;
                                        '>
                                            <input type='checkbox'>Recordar usuario 
                                        </div>

                                        <button type='submit' class='btn btn-primary btn_login'>
                                            <b>Iniciar Sesion</b>
                                        </button>
                                        <br>
                                        <br>
                                           <!--
                                        <a type='button' onmouseover='' onclick='JavaScript:document.getElementById(' txt_soporte').style.display='' ;this.style.display='none' ;'='' style='
                                            padding-top: 67px;
                                        '>¿Olvidaste tu contraseña?</a> 
                                        <div id='txt_soporte' style='display:none; color:#000; font-family: Arial; line-height: 14px; font-size: 14px;'>
                                            <br>¿Olvidaste tu contraseña?<br>Por favor envíe un correo a<br> soporte@proveedor.com.co
                                        </div>  -->                
                                    </div>
                                    </div>
                                </div>";
                        echo  " <a data-toggle='modal' data-target='#popup_login' id='auto_launch'> </a>
                                <script>login();</script>";
                        echo  form_close();
                        $this->compartir();
       }       
    function singup($reffer="")
    {            
            $usuario=$this->session->userdata('id');
            if($usuario)redirect(base_url().'psiquis/'.$reffer);
            $usuario=$this->input->post('usuario');
            
            $error="";
            if($usuario)
            {
                $data['usuario']=$usuario;
                $data['clave']=md5($this->input->post('clave'));
                $data['correo']=$this->input->post('correo');
                $r=$this->psiquis->insert($data);
               
                if($r==FALSE)
                    $error="<div align='center' style='color:#ff0000;width:100%;heigth:1%;'><h3>El Usuario o correo ya estan registrados</h3></div>";                
                else
                {       
                    $this->psiquis->insert(array('usuario'=>$r,'clave'=>'clase','valor'=>'estandar'),'data_usuario');
                            
                    $data['id']=$r;
                    $this->session->set_userdata($data);                    
                    redirect(base_url().'psiquis/'.$reffer);
                    return;
                }
            }
            $this->data['titulo']='Psiquis Singup';
            
            
            echo $this->css;
            echo $this->javascript;
            echo @$this->nav_bar();
            
            echo "
                    <div class='login' style='padding-top: 15%;'>
                        <link rel='stylesheet' type='text/css' href='<?php echo css_url()?>styles_login.css'>";
            echo form_open_multipart('psiquis/singup/'.$reffer,array('name'=>'f')); 
            echo "                          <div class='modal-content modal-content-login borders'>
                                <div class='modal-header borders' style='border-bottom: none;'>
                                    

                                            <img class='center-block' src='".base_url()."uploads/default.png' style='
                                                margin-top: 8%;
                                            '>

                                </div>
                                                      $error          
                                <div class='modal-body text-center body_login borders'>
                                    <div class='input-group ig_name_user' style='
                                        margin: 2%;
                                        margin-bottom: 10%;
                                        margin-top: 10%;
                                    '>
                                        <span class='input-group-addon'>
                                        <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>
                                        </span>
                                            <input min='6' max='15' required type='text' class='form-control input_txt' placeholder='Nombre de Usuario' name='usuario'>
                                        </div><div class='input-group ig_name_user' style='
                                                margin: 2%;
                                                margin-bottom: 10%;
                                                margin-top: 10%;
                                            '>
                                        <span class='input-group-addon'>
                                        <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>
                                        </span>
                                            <input  required type='email' class='form-control input_txt' placeholder='Email, Correo Electronico' name='correo'>
                                        </div>
   
                                        <div class='input-group ig_pwd' style='
                                                margin: 2%;
                                                margin-bottom: 10%;
                                                margin-top: 10%;
                                            '>
                                            <span class='input-group-addon'>
                                            <span class='glyphicon glyphicon-asterisk' aria-hidden='true'></span>
                                            </span>
                                            <input min='6' required type='password' class='form-control input_txt' placeholder='Contraseña' name='clave' id='clave'>
                                        </div><div class='input-group ig_pwd' style='
                                                    margin: 2%;
                                                    margin-bottom: 10%;
                                                    margin-top: 10%;
                                                '>
                                            <span class='input-group-addon'>
                                            <span class='glyphicon glyphicon-asterisk' aria-hidden='true'></span>
                                            </span>
                                            <input min='6' onchange='if(this.value!=document.f.clave.value)this.value=\"\";' required type='password' class='form-control input_txt' placeholder='Confirmar Contraseña' name='clave2'>
                                        </div>


                                        

                                        <button type='submit' class='btn btn-primary btn_login'>
                                            <b>Enviar</b>
                                        </button>
                                        <br>
                                        <br>
                                            <!--
                                        <a type='button' onmouseover='' onclick='JavaScript:document.getElementById(' txt_soporte').style.display='' ;this.style.display='none' ;'='' style='
                                                padding-top: 67px;
                                            '>¿Olvidaste tu contraseña?</a> 
                                        <div id='txt_soporte' style='display:none; color:#000; font-family: Arial; line-height: 14px; font-size: 14px;'>
                                            <br>¿Olvidaste tu contraseña?<br>Por favor envíe un correo a<br> soporte@proveedor.com.co
                                        </div>  -->                
                                    </div>
                                    </div>                                  </div>
                                </div>";
                        echo  " <a data-toggle='modal' data-target='#popup_login' id='auto_launch'> </a>
                                <script>login();</script>";
                        echo  form_close();
       }       
    public function lista()
    {           
            $id=$this->session->userdata('id');
            if($id=='')redirect(base_url().'psiquis/login/lista');
            $obj;$obj->id=0;
            $list_system=$this->psiquis->get(array('nombre'=>'list_system'),'id','item')->id;
            $out;  $out->id=0;
            $list_system=$this->implode($this->psiquis->get_all(array('item'=>$list_system),'*','data_item'),$out);
            $data_user = $this->implode($this->psiquis->get_all(array('usuario'=>$id),'*','data_usuario'),$obj);
            $history = $this->psiquis->get_all(array('usuario'=>$id,'clave'=>'history'),'*','data_usuario');
            
            $tmp=array();
            if($history)
            foreach ($history as $key => $value) 
                $tmp[]=$value->valor;
            $history=$tmp;
            
            $items = $this->psiquis->get_all(null,'*','item');
            
             
            echo @$this->nav_bar('lista de test',TRUE,FALSE,TRUE);
            
            $objs=array();
            foreach ($items as $key => $item)
            {
                if(in_array($item->id,$history))continue;
                if(33==$item->id)continue;
                if(32==$item->id)continue;
                if(31==$item->id)continue;
                unset($tmp);
                unset($out);
                $out->id=0;                
                try{
                $tmp=$this->implode($this->psiquis->get_all(array('item'=>$item->id),'*','data_item'),$out);
                #$tmp=$this->psiquis->get_all(array('item'=>$item->id),'*','data_item');
                } catch (Exception $e) {$tmp=FALSE;}
                if($tmp==FALSE)
                continue;
                $item->data = $tmp;
                $objs[]=$item;
            }
            $items=$objs;
            $list=FALSE;
            echo "<div id='test'><h1 align='center' class='c'>";
            foreach ($items as $key => $item) 
            {
                if($item->data->tipo!='test')continue;
                
                if($item->data->clase!=$data_user->clase)continue;                
                $url=base_url().'psiquis/print_item/'.$item->id;
                echo "<a class='c btn btn-default' href='$url'>".$item->nombre."</a>"; 
                $list=TRUE;        
            }
            if(!$list)            
            {    
                echo "
                      <h1 align='center' class='c' style='color:black!important'>
                         No hay test habilitados, en este monento
                      </h1>";
            }
            echo "</div>"; 
    }
    public function insert_item($reffer)
    {
        $claves=$this->input->post('clave');
        $valores=$this->input->post('valor');
        $usuario=$this->session->userdata('id');
        $usuario=$usuario==''?$this->input->post('usuario'):$usuario;
       
        $item['usuario']=$usuario;
        $item['nombre']=$this->input->post('nombre');;
        $item['descripcion']=$this->input->post('descripcion');
        
        $id=$this->psiquis->insert($item,'item');
        if($id==FALSE)return;
         
        $data_item=array();
        foreach ($claves as $key => $clave)
        {
         $data_item[$key+2]['clave']=$clave;
         $data_item[$key+2]['valor']=$valores[$key];
         $data_item[$key+2]['item']=$id;
        }
                 
        foreach ($data_item as $key => $value)
         $this->psiquis->insert($value,'data_item');
                                
        redirect(base_url().'psiquis/login/'.$reffer);
     }       
    public function make_item($reffer="",$data_item="imagen_encabezado101''111pregunta1101.111html_tag101div111texto_encabezado101¿111numero_preguntas1010111tipo101test111clase101estandar111numero_repeticiones1015111recursos101palabras.4111ran101FALSE")
    {
            $this->data['titulo']='lista de test';
            
            
            echo  $this->css;            
            echo  @$this->nav_bar();
            echo  "<br><br><br>";       
            echo form_open_multipart('psiquis/insert_item/'.$reffer,array('name'=>'f')); 
            echo "<label class='c' for='#nombre'>Nombre: </label>";
            echo form_input(array('class'=>'c','type'=>'hidden','name'=>'id'));#inprimir otros datos necesarios
            echo form_input(array('class'=>'c','nombre'=>'hidden','name'=>'nombre'));#inprimir otros datos necesarios
            echo "<label class='c' for='#descripcion'>Decripcion: </label>";
            echo form_input(array('class'=>'c','id'=>'descripcion','name'=>'descripcion'));#inprimir otros datos necesarios
            echo "<div id='data'>";
           # $key=0;
            foreach(explode('111',$data_item) as $key=>$value)
            {
                $tmp=explode('101',$value);
                echo "<div id='div$key'>";
                echo "<label class='c' for='#clave$key'>Clave: <a style='float:right;' href='javascript:eliminar($key);'>X</a></label>";
                echo form_input(array('class'=>'c','id'=>"clave$key",'name'=>'clave[]','value'=>$tmp[0]));#inprimir otros datos necesarios
                echo "<label class='c' for='#valor$key'>Valor: </label>";                
                echo form_input(array('class'=>'c','id'=>"valor$key",'name'=>'valor[]','value'=>$tmp[1]));#inprimir otros datos necesarios
                echo "</div>";                
            }
            echo "</div>";            
            echo "<a onclick='agregar()' class='c btn btn-defaul'>Agregar data</a>";
            echo "<button class='c btn btn-defaul'>Guardar item</button>";
            echo " 
            <script>
            var key=$key;
            
            function agregar()
            {
                key++;
                var doc = document.getElementById('data');
                var div = document.createElement('div');
                div.id='div'+key;
                
                var label = document.createElement('label');
                label.for='#clave'+key;
                label.innerHTML='Clave: <a style=\'float:right;\' href=\'javascript:eliminar(key);\'>X</a>';     
                label.className='c';
                div.appendChild(label);
                
                var input = document.createElement('input');
                input.id='clave'+key;
                input.name='clave[]';     
                input.className='c';
                div.appendChild(input);
                
                var label1 = document.createElement('label');
                label1.for='#valor'+key;
                label1.textContent='Valor: ';     
                label1.className='c';
                div.appendChild(label1);
                
                var input1 = document.createElement('input');
                input1.id='valor'+key;
                input1.name='valor[]';     
                input1.className='c';
                div.appendChild(input1);
                
                doc.appendChild(div);
            }   
            
            function eliminar(id)
            {
                var doc = document.getElementById('data');
                var to_remove = document.getElementById('div'+id);
                doc.removeChild(to_remove);                
            }         
            </script>";
            echo  form_close();
    }
    public function welcome()
    {        
         $this->ci = &get_instance();
         if (!$this->ci->agent->is_mobile()||$this->movilRobot())
            return $this->login('lista');
            
         $url=base_url().'psiquis';
            
         $this->data['titulo']='Psiquis welcome!!!';         
         echo @$this->nav_bar('NOT NAV BAR');
         echo "<div class='top'><img src='".base_url()."uploads/default2.png' style='max-width:100%'></div>";
         echo "<div class='body'>
            <h3 id='title_welcome'> Bienvenido</h3>
            <p align='justify' style='font-size: larger;'>
                Psiquis la primera app que te optimiza a ti no a tu teléfono
            </p>
            <p align='justify' style='font-size: initial;'>
                Saca el mejor provecho de la autosugestión, automotivacion. 
           <br> ¿Cuantas veces te has propuesto mejorar su rendimiento académico o laboral... lo  analizas, planeas, y nunca lo ejecutas? 
           <br> Descubre que es eso que te falta. Que evita que lleves a la acción tus pensamientos, tus ideas.
           <br> 
           <br> Aprende mas sobre ti. sobre lo que que te motiva, lo que te frustra. Crece..
                Lleva a cabo todos tus proyectos sin escusas, de la mejor manera, sin estresarte y disfrutalo. no sufras.
            </p>
            <p>
                <a class='btn btn-default registro' href='$url/singup/lista'>Inicia ya! es gratís</a>
            </p>                
         </div>";
         echo "<div class='footer'></div>";
    } 
    
  private function movilRobot()
  {
    if($this->ci->agent->is_robot())
		  return stripos("Googlebot-Mobile",$this->ci->agent->robot())>=0;	
    return false;
  }
	public function logout(){
        $this->session->sess_destroy();
         redirect($_SERVER['HTTP_REFERER'],'refresh');
    }
}