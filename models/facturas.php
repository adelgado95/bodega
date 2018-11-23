<?php
require_once('db_connection.php');
	Class facturas{
    	function getFacturaFecha()
    	{
				$Dbobj = new db_connection(); 
    			$string = "select Factura,Cliente,Ejecutivo,Fecha_Liq,count(*) AS Cantidad,Liquidador from liquidaciones where Fecha_Liq=DATE('".$_REQUEST['fecha']."') group by Factura";
       			if(mysqli_num_rows($query = mysqli_query($Dbobj->getdbconnect(),$string))!=0){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}	
    			echo json_encode($myArray);
				}
				else echo "";
    	}
    	function getDetalleFactura(){
    	 	
				$Dbobj = new db_connection(); 
    			$string = "select * from liquidaciones where Factura='".$_REQUEST['factura']."';";
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
		if($_REQUEST['mode']=='getFecha')
		{
			$factura = new facturas();
			$factura->getFacturaFecha();
		}
		if($_REQUEST['mode']=='getDetalle')
		{
			$factura = new facturas();
			$factura->getDetalleFactura();
		}

		
	}
	
 ?>