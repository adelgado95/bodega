<?php 
	require_once('db_connection.php');
	$Dbobj = new db_connection(); 
	$strRequest = file_get_contents('php://input');
	$Request = json_decode($strRequest,true);
	$count=0;
	foreach ($Request as $key => $value) {
		$string2 = " UPDATE entradas set Fecha_Salida=DATE('".$value["fecha_salida"]."'),Estado='".$value["estado"]."', IdSalida='".$value["no_salida"]."' WHERE Iccid='".$value["iccid"]."';";
		echo $string2;
        if($query = mysqli_query($Dbobj->getdbconnect(),$string2)){
        	$count++;
 	     }

}
  
  echo $count;

?>
