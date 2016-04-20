

<?php
  $uri=$_SERVER['REQUEST_URI'];
  $destino=str_replace('psiquis','index.php/pisquis'),$uri);
   redirect($destino);
?>