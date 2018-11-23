<?php
require_once('db_connection.php');
	Class models{
		var $id;
		var $model;
		function saveEntrada(){
    	
    	}
    }
	
	if(isset($_REQUEST))
	{
		if($_REQUEST['mode']=='getModelofromMarca')
		{
			$marca = $_REQUEST['marca'];
			$Dbobj = new db_connection(); 
    		$string = "SELECT Modelo FROM modelo WHERE IdMarca=".$marca.";";
       		$query = mysqli_query($Dbobj->getdbconnect(),$string);
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}

    			echo json_encode($myArray);
		}
	}

 ?>