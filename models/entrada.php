<?php
require_once('db_connection.php');
	Class entrada{
		var $iccid;
		var $imei;
		var $marca;
		var $modelo;
		var $fecha_entrada;
		var $fecha_salida;
		var $estado;
		var $no_salida;
		var $devuelto;

		   function saveEntrada(){
    	$Dbobj = new db_connection(); 
    	$string = "INSERT INTO entradas(Iccid,Imei,Marca,Modelo,Fecha_Entrada,Fecha_Salida,Devuelto) VALUES ('$this->iccid','$this->imei','$this->marca','$this->modelo',DATE('$this->fecha_entrada'),DATE('$this->fecha_salida'),$this->devuelto)";
        $query = mysqli_query($Dbobj->getdbconnect(),$string);
        echo $string;
        if(mysqli_errno($Dbobj->getdbconnect()) !== 1062)
        {
        	return $Dbobj->getdbconnect()->error;
        }
        else {
        	return 1;	
        }
    	}

    	function getEntrada($IMEI)
    	{
    		$Dbobj = new db_connection(); 
    	$string = "SELECT * FROM entradas WHERE Imei='".$IMEI."' and Estado='ENBODEGA';";
        $query = mysqli_query($Dbobj->getdbconnect(),$string);
        /*if(mysqli_num_rows($query) == 0)
        {
        	echo "0";
        }
        else
        {
        	echo "1";
        }*/
        echo mysqli_num_rows($query);
    	}

    	function getEntradaTodos($IMEI)
    	{
    	$Dbobj = new db_connection(); 
    	$string = "SELECT * FROM entradas WHERE Imei='".$IMEI."';";
        $query = mysqli_query($Dbobj->getdbconnect(),$string);
        if(mysqli_num_rows($query) > 0 ){
        	$response= $query->fetch_assoc();
        	echo json_encode($response);
    		}
    		else
    		{
    			echo "0";
    		}
    	}
    	function getEntradaMes()
    	{
    	$Dbobj = new db_connection(); 
    	$string = "SELECT Modelo,Marca,Month(Fecha_Entrada) as Mes,Year(Fecha_Entrada) as Anio,count(*) as Cantidad FROM `entradas` where Year(Fecha_Entrada) = ".$_REQUEST['anio']." AND Month(Fecha_Entrada) = ".$_REQUEST['mes']." group by Modelo,Marca;";
        $query = mysqli_query($Dbobj->getdbconnect(),$string);
        if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
    	}
    	function reportentradafechas($fechai,$fechaf)
		{
			$Dbobj = new db_connection(); 
    		$string = "SELECT * FROM entradas where Fecha_Entrada BETWEEN '".$fechai."' AND '".$fechaf."';";
    		
       		if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			while($row = $query->fetch_assoc()) {
            $myArray[] = $row;
    		}	
    		echo json_encode($myArray);
			}
			else echo "0";
		}
    }
	
	

	if(isset($_REQUEST))
	{
		if($_REQUEST['mode']=='getentradasmes')
		{
			$entry = new entrada();
			echo $entry->getEntradaMes();
		}
		
		if($_REQUEST['mode']=='save')
		{
			$entry = new entrada();
			$entry->iccid = $_REQUEST['iccid'];
			$entry->imei = $_REQUEST['imei'];
			$entry->marca = $_REQUEST['marca'];
			$entry->modelo = $_REQUEST['modelo'];
			$entry->fecha_entrada = $_REQUEST['fecha_entrada'];
			$entry->fecha_salida = $_REQUEST['fecha_salida'];
			$entry->estado = $_REQUEST['estado'];
			$entry->no_salida = $_REQUEST['no_salida'];
			$entry->devuelto = $_REQUEST['devuelto'];
			echo $entry->saveEntrada();
		}
		if($_REQUEST['mode']=='getBodega')
		{
				$Dbobj = new db_connection(); 
    			$string = "SELECT * FROM entradas WHERE Estado='ENBODEGA';";
       			$query = mysqli_query($Dbobj->getdbconnect(),$string);
        		if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "0";
			
		}
		if($_REQUEST['mode']=='getIMEI')
		{
			$entry = new entrada();
			$IMEI = $_REQUEST['IMEI'];
			$entry->getEntrada($IMEI); 
		}
		if($_REQUEST['mode']=='getEntrada')
		{
			$entry = new entrada();
			$IMEI = $_REQUEST['IMEI'];
			$entry->getEntradaTodos($IMEI); 
		}

		if($_REQUEST['mode']=='getAll')
		{
			if(isset($_REQUEST['fecha']))
			{
				$fecha = $_REQUEST['fecha'];
				$Dbobj = new db_connection(); 
    			$string = "SELECT * FROM entradas where fecha_entrada = DATE('$fecha');";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
			}
		}
		if($_REQUEST['mode']=='reportentradasfechas')
		{
			$fecha_inicio = $_REQUEST['fechai'];
			$fecha_fin = $_REQUEST['fechaf'];
			$salida = new entrada();
			echo $salida->reportentradafechas($fecha_inicio,$fecha_fin);
		}
	}
	
	
 ?>