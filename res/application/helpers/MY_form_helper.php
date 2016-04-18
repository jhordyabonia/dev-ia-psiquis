<?php 
if ( ! function_exists('form_a'))
{
	function form_a($data = '', $content = '', $extra = '')
	{
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'type' => 'button');

		if ( is_array($data) AND isset($data['content']))
		{
			$content = $data['content'];
			unset($data['content']); // content is not an attribute
		}

		return "<p><a "._parse_form_attributes($data, $defaults).$extra.">".$content."</a></p>";
	}
}

if (! function_exists('icon'))
{
    function icon($icon)
    {
    	return "<i class='".$icon."'></i>";
    }
}

if (! function_exists('counter'))
{
    function counter($service = False, $prefix = 'c')
    {
    	$p_service = '';
    	if($service){
    		$p_service = $prefix."_".$service;
    	}
    	return "<span class='counter " . $p_service . "'> 0</span>";
    }
}

if (! function_exists('form_button_facebook'))
{
    function form_button_facebook()
    {
        $data = array(
            'class' => 'share-btn share s_facebook'
        );
        return form_a($data, icon('fa fa-facebook').counter('facebook'));
    }
}

if (! function_exists('form_button_plus'))
{
    function form_button_plus()
    {
        $data = array(
            'class' => 'share-btn share s_plus'
        );
        return form_a($data, icon('fa fa-google-plus').counter('plus'));
    }
}

if (! function_exists('form_button_linkedin'))
{
    function form_button_linkedin()
    {
        $data = array(
            'class' => 'share-btn share s_linkedin'
        );
        return form_a($data, icon('fa fa-linkedin').counter('linkedin'));
    }
}


if (! function_exists('form_button_email'))
{
    function form_button_email()
    {
        $data = array(
            'class' => 'share-btn share s_email',
            // 'href' => 'mailto:someone@yoursite.com?subject=Mail from Our Site'
        );
        return form_a($data, icon('fa fa-envelope'));
    }
}

if (! function_exists('form_button_whatsapp'))
{
    function form_button_whatsapp()
    {
        $data = array(
            'class' => 'share-btn share s_whatsapp',
            'href' => 'whatsapp://send',
            'data-text' => 'Cómo crear el botón de Compartir en WhatsApp en tu sitio:' ,
            'data-href' => 'http://www.google.com',
            'style' => "display:none"
        );
        return form_a($data, icon('fa fa-whatsapp'));
    }
}


if (! function_exists('form_button_twitter'))
{
    function form_button_twitter()
    {
        $data = array(
            'class' => 'share-btn share s_twitter'
        );
        return form_a($data, icon('fa fa-twitter'));
    }
}

if (! function_exists('form_buttons_socials'))
{
    function form_buttons_socials($class = "")
    {
        
        return "<div class='inline $class'>".
                    form_button_facebook().
                    form_button_plus().
                    form_button_linkedin().
                    form_button_twitter().
                    form_button_email().
                    form_button_whatsapp().
                "</div>";
    }
}

?>