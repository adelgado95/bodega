<?php
require_once('db_connection.php');
	Class salida{
		var $id;
		var $salida;
		function guardarsalida($departamento,$zona,$canal,$encargado,$fecha,$cantidad)
		{
				$Dbobj = new db_connection(); 
				$conection = $Dbobj->getdbconnect();
	    		$string = "INSERT INTO salida(Departamento,Zona,Canal,Encargado,Fecha,Cantidad) VALUES ('".$departamento."','".$zona."','".$canal."','".$encargado."',DATE('".$fecha."'),".$cantidad.");";
	    		if ($query = mysqli_query($conection,$string)) {
    			$last_id = $conection->insert_id;
    				echo $last_id;
					} else {
					    echo "Error: <br>" . mysqli_error($conection);
							}
						mysqli_close($Dbobj->getdbconnect());	
		}
		function obtenerfecha($fecha)
		{

			$fecha = $_REQUEST['fecha'];
				$Dbobj = new db_connection(); 
    			$string = "SELECT IdSalida,Imei,Iccid,Marca,Modelo,Precio,PrecioTAE,Departamento,Zona,Canal,Encargado,Fecha_Salida,Estado FROM salida as s, entradas as e where s.Id=e.IdSalida and s.Fecha=DATE('".$fecha."');";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
		}
		function obtenerfechaimei($imei)
		{
				$Dbobj = new db_connection(); 
    			$string = "SELECT IdSalida,Imei,Iccid,Marca,Modelo,Precio,PrecioTAE,Departamento,Zona,Canal,Encargado,Fecha_Salida,Estado FROM salida as s, entradas as e where s.Id=e.IdSalida and Imei='".$imei."';";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
		}
		function obtenertodas()
		{
				$Dbobj = new db_connection(); 
    			$string = "SELECT IdSalida,Imei,Iccid,Marca,Modelo,Precio,PrecioTAE,Departamento,Zona,Canal,Encargado,Fecha_Salida,Estado FROM salida as s, entradas as e where s.Id=e.IdSalida and e.Liquidado = 0;";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
		}
		function obtenersalidasinliquidar()
		{
				$Dbobj = new db_connection(); 
    			$string = "SELECT IdSalida,Imei,Iccid,Marca,Modelo,Precio,PrecioTAE,Departamento,Zona,Canal,Encargado,Fecha_Salida,Estado,Liquidado FROM salida as s, entradas as e where s.Id=e.IdSalida and e.Liquidado = 0;";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
		}
		function reportsalidafechas($fechai,$fechaf)
		{
				$Dbobj = new db_connection(); 
    			$string = "SELECT Imei,Iccid,Marca,Modelo,Fecha_Entrada,Fecha_Salida,Precio,PrecioTAE,Zona,Departamento,Canal,Encargado,IF(Liquidado=0,'NO_LIQUIDADO','LIQUIDADO') as Liquidado,Estado FROM entradas as e, salida as s where e.IdSalida = s.Id and Fecha_Salida BETWEEN '".$fechai."' AND '".$fechaf."';";
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
		if($_REQUEST['mode']=='getSalidasFecha'){
			$fecha = $_REQUEST['fecha'];
			$salida = new salida();
			echo $salida->obtenerfecha($fecha);
		}
		if($_REQUEST['mode']=='getSalidasnoLiq'){
			$salida = new salida();
			echo $salida->obtenersalidasinliquidar();
		}
		if($_REQUEST['mode']=='getSalidaImei'){
			$imei = $_REQUEST['imei'];
			$salida = new salida();
			echo $salida->obtenerfechaimei($imei);
		}
		if($_REQUEST['mode']=='getAllSalidas'){
			$salida = new salida();
			echo $salida->obtenertodas();
		}
		if($_REQUEST['mode']=='insert')
		{
			$departamento = $_REQUEST['departamento'];
			$zona = $_REQUEST['zona'];
			$canal = $_REQUEST['canal'];
			$encargado = $_REQUEST['encargado'];
			$fecha = $_REQUEST['fecha'];
			$cantidad = $_REQUEST['cantidad'];
			$salida = new salida();
			echo $salida->guardarsalida($departamento,$zona,$canal,$encargado,$fecha,$cantidad);
		}
		if($_REQUEST['mode']=='reportsalidasfechas')
		{
			$fecha_inicio = $_REQUEST['fechai'];
			$fecha_fin = $_REQUEST['fechaf'];
			$salida = new salida();
			echo $salida->reportsalidafechas($fecha_inicio,$fecha_fin);
		}
	}

 ?>