<?php
require('core.php');
if(isset($_REQUEST['view']))
{
		if(file_exists('controller/'.$_REQUEST['view'].'Controller.php'))
		{

			include('controller/'.$_REQUEST['view'].'Controller.php');
		}
		else
		{
				include('controller/loginController.php');
		}
	
	
}
else
{
	if(isset($_SESSION['app_id']))
	{
			include('controller/adminController.php');
	}
	else
	{
			include('views/login/index.php');
	}
}
?>
