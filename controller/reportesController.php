<?php
if(isset($_SESSION['app_id']))
{
	if($_GET['mode']=='entradas')
	{
	include_once(HTML_DIR.'entradas/overall/header.php');
	 include_once(HTML_DIR.'entradas/reporteEntradas.php');
	 include_once(HTML_DIR.'entradas/overall/footer.php');
	}
	if($_GET['mode']=='salidas')
	{
	include_once(HTML_DIR.'entradas/overall/header.php');
	 include_once(HTML_DIR.'entradas/reporteSalidas.php');
	 include_once(HTML_DIR.'entradas/overall/footer.php');
	}

}
else
{
	 include_once(HTML_DIR.'entradas/overall/header.php');
	 include_once(HTML_DIR.'entradas/index.php');
	 include_once(HTML_DIR.'entradas/overall/footer.php');
}

?>
