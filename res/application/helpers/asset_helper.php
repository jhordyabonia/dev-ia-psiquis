<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sekati CodeIgniter Asset Helper
 *
 * @package		Sekati
 * @author		Jason M Horwitz
 * @copyright	Copyright (c) 2013, Sekati LLC.
 * @license		http://www.opensource.org/licenses/mit-license.php
 * @link		http://sekati.com
 * @version		v1.2.7
 * @filesource
 *
 * @usage 		$autoload['config'] = array('asset');
 * 				$autoload['helper'] = array('asset');
 * @example		<img src="<?=asset_url();?>imgs/photo.jpg" />
 * @example		<?=img('photo.jpg')?>
 *
 * @install		Copy config/asset.php to your CI application/config directory
 *				& helpers/asset_helper.php to your application/helpers/ directory.
 * 				Then add both files as autoloads in application/autoload.php:
 *
 *				$autoload['config'] = array('asset');
 * 				$autoload['helper'] = array('asset');
 *
 *				Autoload CodeIgniter's url_helper in application/config/autoload.php:
 *				$autoload['helper'] = array('url');
 *
 * @notes		Organized assets in the top level of your CodeIgniter 2.x app:
 *					- assets/
 *						-- css/
 *						-- download/
 *						-- img/
 *						-- js/
 *						-- less/
 *						-- swf/
 *						-- upload/
 *						-- xml/
 *					- application/
 * 						-- config/asset.php
 * 						-- helpers/asset_helper.php
 */
// ------------------------------------------------------------------------
// URL HELPERS
/**
 * Get asset URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('assets_url'))
{
    function assets_url()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        //return the full asset path
        return base_url() . $CI->config->item('asset_path');
    }
}
/**
 * Get css URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('css_url'))
{
    function css_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('css_path');
    }
}
/**
 * Get less URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('less_url'))
{
    function less_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('less_path');
    }
}
/**
 * Get js URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('js_url'))
{
    function js_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('js_path');
    }
}



 /*Jhordy:: funcion para eliminar la redundancia de los array's 

 * Jhordy Abonia
 * @access  public
 * @return  array
 */
if ( ! function_exists('clear_array'))
{
    function clear_array($array){

        if($array==NULL)
        {   return array();    }
        foreach ($array as $value) 
        {
            $array=already($array,$value);           
        }
        return $array;
    }
}
/**Jhordy:: funcion auxiliar para eliminar la redundancia de los array's 
  
 * Jhordy Abonia
 * @access  public
 * @return  array
 */
if ( ! function_exists('already'))
{
    function already($array,$item){
        $tmp=0;
        $out=array();
        foreach ($array as $value) 
        {
            if($value==$item) 
            { 
                $tmp++;
                if($tmp>1) { continue; }
            }$out[]=$value;
        }
        return $out;
    }
}
/**
 * Jhordy Abonia
 * Este metodo añade los puntos decimales al numero pasado como parametro
 * @access  public
 * @return  string
 */
if ( ! function_exists('decimal_points'))
{
    function decimal_points($number="10000")
    {
          if(!is_string($number))
          {$number="".$number;}
          if(intval($number)<=0)
          {
            return "A convenir";
          }
          $out="";
          $count=0;
          for($i=strlen($number)-1;$i>=0;$i--)
          {    
            if(($count==3))
            {
              $out=$number[$i].".".$out;
              $count=1;
            }
            else
            {      
              $out=$number[$i].$out;
              $count++;
            }
          }
          return $out;
    }
}
/**
 * Jhordy Abonia
 * Este metodo extrae el id de un video de youtube embedido para un iframe
 * @access  public
 * @return  string
 */
if ( ! function_exists('id_video'))
{
    function id_video($video)
    {
        $out=explode('embed/', $video);
        return $out[1];
    }
}
/**
 * Jhordy Abonia
 * Este metodo extrae el elemento $id incluido en $source divivido por $need
 * @access  public
 * @return  string
 */
if ( ! function_exists('get'))
{
    function get($source,$id=0,$need=',')
    {
        $out=explode($need, $source);
        return $out[$id];
    }
}
/**
 * Get image URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('img_url'))
{
    function img_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('img_path');
    }
}
/**
 * Get image URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('verificar_imagen'))
{
   function verificar_imagen($url)
    {
        $paths=array('imagenes/','banners/','listados/','index_carrouseles/',
        'index_productos_principales/','index_productos_principales_mas_destacado/',
        'pagina_producto/miniatura/','pagina_producto/visualizador/','pagina_producto/galeria/',
        'pagina_de_empresa/');
        #$url= substr($url, stripos($url, ".co/"+4));
        $tmp=explode('/',$url);
        $image= $tmp[count($tmp)-1];
        $path= str_replace($image,'',$url);
        
        if($image=='')return  base_url().'uploads/resize/SOP/default.jpg';
        
        $out=$url;
        if(file_exists($out)) return base_url().$out;
        else foreach ($paths as $key => $value) 
        {
            $out='uploads/'.$value.$image;
            if(file_exists($out))
               {  return base_url().$out; }
                
            $out='uploads/'.$value.'resize/'.$image;
            if(file_exists($out))
               {  return base_url().$out; }
                
            $out='uploads/'.$value.'resize/SOP/'.$image;
            if(file_exists($out))
               {   return base_url().$out; }
        }
        $out=file_exists('uploads/'.$image)?'uploads/'.$image:'uploads/resize/SOP/default.jpg';
        return base_url().$out;
    }
}
/**
 * Get SWF URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('swf_url'))
{
    function swf_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('swf_path');
    }
}
/**
 * Get Upload URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_url'))
{
    function upload_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('upload_path');
    }
}
/**
 * Get Download URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_url'))
{
    function download_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('download_path');
    }
}
/**
 * Get XML URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('xml_url'))
{
    function xml_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('xml_path');
    }
}
// ------------------------------------------------------------------------
// PATH HELPERS
/**
 * Get asset Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('asset_path'))
{
    function asset_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('asset_path');
    }
}
/**
 * Get CSS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('css_path'))
{
    function css_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('css_path');
    }
}
/**
 * Get LESS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('less_path'))
{
    function less_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('less_path');
    }
}
/**
 * Get JS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('js_path'))
{
    function js_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('js_path');
    }
}
/**
 * Get image Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('img_path'))
{
    function img_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('img_path');
    }
}
/**
 * Get SWF Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('swf_path'))
{
    function swf_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('swf_path');
    }
}
/**
 * Get XML Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('xml_path'))
{
    function xml_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('xml_path');
    }
}
/**
 * Get the Absolute Upload Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_path'))
{
    function upload_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('upload_path');
    }
}
/**
 * Get the Relative (to app root) Upload Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_path_relative'))
{
    function upload_path_relative()
    {
        $CI =& get_instance();
        return './' . $CI->config->item('upload_path');
    }
}
/**
 * Get the Absolute Download Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_path'))
{
    function download_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('download_path');
    }
}
/**
 * Get the Relative (to app root) Download Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_path_relative'))
{
    function download_path_relative()
    {
        $CI =& get_instance();
        return './' . $CI->config->item('download_path');
    }
}
// ------------------------------------------------------------------------
// EMBED HELPERS
/**
 * Load CSS
 * Creates the <link> tag that links all requested css file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('css'))
{
    function css($file, $media='all')
    {
        return '<link rel="stylesheet" type="text/css" href="' . css_url() . $file . '" media="' . $media . '">'."\n";
    }
}
/**
 * Load LESS
 * Creates the <link> tag that links all requested LESS file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('less'))
{
    function less($file)
    {
        return '<link rel="stylesheet/less" type="text/css" href="' . less_url() . $file . '">'."\n";
    }
}
/**
 * Load JS
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @param 	array 	$atts Optional, additional key/value attributes to include in the SCRIPT tag
 * @return  string
 */
if ( ! function_exists('js'))
{
    function js($file, $atts = array())
    {
        $element = '<script type="text/javascript" src="' . js_url() . $file . '"';
		foreach ( $atts as $key => $val )
			$element .= ' ' . $key . '="' . $val . '"';
		$element .= '></script>'."\n";
		return $element;
    }
}
/**
 * Load Image
 * Creates an <img> tag with src and optional attributes
 * @access  public
 * @param   string
 * @param 	array 	$atts Optional, additional key/value attributes to include in the IMG tag
 * @return  string
 */
if ( ! function_exists('img'))
{
    function img($file,  $atts = array())
    {
		$url = '<img src="' . img_url() . $file . '"';
		foreach ( $atts as $key => $val )
			$url .= ' ' . $key . '="' . $val . '"';
		$url .= " />\n";
        return $url;
    }
}
/**
 * Load Minified JQuery CDN w/ failover
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('jquery'))
{
    function jquery($version='')
    {
    	// Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline
  		$out = '<script src="//ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js"></script>'."\n";
  		$out .= '<script>window.jQuery || document.write(\'<script src="'.js_url().'jquery-'.$version.'.min.js"><\/script>\')</script>'."\n";
        return $out;
    }
}
/**
 * Load Google Analytics
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('google_analytics'))
{
    function google_analytics($ua='')
    {
    	// Change UA-XXXXX-X to be your site's ID
	    $out = "<!-- Google Webmaster Tools & Analytics -->\n";
	    $out .='<script type="text/javascript">';
		$out .='	var _gaq = _gaq || [];';
		$out .="    _gaq.push(['_setAccount', '$ua']);";
		$out .="    _gaq.push(['_trackPageview']);";
		$out .='    (function() {';
		$out .="      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
		$out .="      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
		$out .="      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
		$out .="    })();";
	    $out .="</script>";
        return $out;
    }
}
/* End of file asset_helper.php */