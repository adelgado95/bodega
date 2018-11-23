<?php
require_once('db_connection.php');
	Class cajas{
		   function saveEntrada(){

    	}

    	function getAllSalidas()
    	{
    			$Dbobj = new db_connection(); 
    			$string = "SELECT count(*) as Total FROM entradas WHERE Estado='SALIDA';";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";


    	}

    	function getAllBodega()
    	{
    		    $Dbobj = new db_connection(); 
    			$string = "SELECT count(*) as Total FROM entradas WHERE Estado='ENBODEGA';";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";

    	}
    	function getAllEntradas()
    	{
				$Dbobj = new db_connection(); 
    			$string = "SELECT count(*) as Total FROM entradas;";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
    	}
    	function getAllLiquidaciones()
    	{
				$Dbobj = new db_connection(); 
    			$string = "SELECT count(*) as Total FROM liquidaciones;";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
    	}
    	function getEncargados()
    	{
				$Dbobj = new db_connection(); 
    			$string = "SELECT * from encargado;";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
    	}
    }
	
	

	if(isset($_REQUEST))
	{
		if($_REQUEST['mode']=='getEntradas')
		{
			$caja = new cajas();
			$caja->getAllEntradas();
		}
		if($_REQUEST['mode']=='getSalidas')
		{
			$caja = new cajas();
			$caja->getAllSalidas();
			
		}
		if($_REQUEST['mode']=='getBodega')
		{
			$caja = new cajas();
			$caja->getAllBodega();	
		}
			if($_REQUEST['mode']=='getLiquidaciones')
		{
			$caja = new cajas();
			$caja->getAllLiquidaciones();	
		}
		if($_REQUEST['mode']=='cargarEncargados')
		{
			$caja = new cajas();
			$caja->getEncargados();	
		}
	}
	
 ?>