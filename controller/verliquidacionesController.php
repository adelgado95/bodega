<?php
if(isset($_SESSION['app_id']))
{
	include_once(HTML_DIR.'entradas/overall/header.php');
	 include_once(HTML_DIR.'entradas/verliquidaciones.php');
	 include_once(HTML_DIR.'entradas/overall/footer.php');
}
else
{
	
	 include_once('views/login/login.php');	
}

?>
