<?php
if(isset($_SESSION['app_id']))
{
	include_once(HTML_DIR.'entradas/overall/header.php');
	 include_once(HTML_DIR.'entradas/nueva_salida.php');
	 include_once(HTML_DIR.'entradas/overall/footer.php');
}
else
{
	
	 include_once('views/login/login.php');	
}

?>
