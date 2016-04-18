
<script src = "<?php echo js_url() ?>jquery.js"></script>
<script src = "<?php echo js_url() ?>bootstrap.min.js"></script>
<script src = "<?php echo js_url() ?>dropdown.js"></script>
<script src = "<?php echo js_url() ?>social.js"></script>
<script type="text/javascript"> 
if(typeof wabtn4fg==="undefined")   {wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="<?php echo js_url() ?>whatsapp-button.js";h.appendChild(s)}
</script>
<!-- Agregado por Carlos Martinez (Activa los link para compartir en redes sociales) -->
<script type="text/javascript">
 $(document).ready(function(){
    $('.share').ShareLink({
        title: '<?php echo $facebook['titulo'] ?>',
        text: '<?php echo json_encode($facebook['mensaje']) ?>',
        image: '<?php echo $facebook['url_image_facebook']?>',
        url: location.href, // link on shared page
        // class_prefix: 's_', // optional class prefix for share elements (buttons or links or everything), default: 's_'
        width: 700, // optional popup initial width
        height: 480 // optional popup initial height
    });
    $('.counter').ShareCounter({
        url: location.href
    });
});
</script>