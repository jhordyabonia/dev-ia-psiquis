
<script src = "<?=base_url()?>assets/js/jquery.js"></script>
<script src = "<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src = "<?=base_url()?>assets/js/dropdown.js"></script>
<script src = "<?=base_url()?>assets/js/social.js"></script>
<script type="text/javascript"> 
if(typeof wabtn4fg==="undefined")   {wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="<?php echo js_url() ?>whatsapp-button.js";h.appendChild(s)}
</script>
<script type="text/javascript">
 $(document).ready(function(){
    $('.share').ShareLink({
        title: '<?=$facebook->titulo ?>',
        text: '<?=json_encode($facebook->mensaje)?>',
        image: '<?=$facebook->url_image_facebook?>',
        url: location.href,        
        width: 700,
        height: 480
    });
    $('.counter').ShareCounter({
        url: location.href
    });
});
</script>