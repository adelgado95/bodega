<?php 
	require_once('db_connection.php');
	$Dbobj = new db_connection(); 
	$strRequest = file_get_contents('php://input');
	$Request = json_decode($strRequest,true);
	$count=0;
	foreach ($Request as $key => $value) {
	$string = 'INSERT INTO entradas(Iccid,Imei,Marca,Modelo,Fecha_Entrada,Fecha_Salida,Devuelto,Estado,Precio,PrecioTAE,IdSalida,Liquidado) VALUES ("'.$value["iccid"].'","'.$value["imei"].'","'.$value["marca"].'","'.$value["modelo"].'",DATE("'.$value["fecha_entrada"].'"),NULL,"'.$value["devuelto"].'","'.$value["estado"].'",'.$value["precio"].','.$value["precio_tae"].',-1,0);';
        if($query = mysqli_query($Dbobj->getdbconnect(),$string)){
        	$count++;
 	     }

}
    
  echo $count;

?>
