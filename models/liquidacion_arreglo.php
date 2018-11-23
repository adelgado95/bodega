<?php 
	require_once('db_connection.php');
	$Dbobj = new db_connection(); 
	$strRequest = file_get_contents('php://input');
	$Request = json_decode($strRequest,true);
	$query2="";
	$count=0;
	foreach ($Request as $key => $value) {

	$string = 'INSERT INTO liquidaciones(Imei,Iccid,MarcaModelo,Precio,PrecioTAE,Factura,Ejecutivo,POS,Fecha_Liq,Fecha_Sal,Liquidador,Cliente) VALUES ("'.$value["imei"].'","'.$value["iccid"].'","'.$value["marcaModelo"].'",'.$value["precio"].','.$value["precioTAE"].','.$value["factura"].',"'.$value["ejecutivo"].'",'.$value["pos"].',DATE("'.$value["fecha_liq"].'"),DATE("'.$value["fecha_sal"].'"),"'.$value["liquidador"].'","'.$value["cliente"].'");';
        if($query = mysqli_query($Dbobj->getdbconnect(),$string)){
        		$string2 = 'UPDATE entradas set Liquidado=1 where Imei="'.$value["imei"].'";';
        		$query2 = mysqli_query($Dbobj->getdbconnect(),$string2);
        	$count++;
 	     }

}
    
  echo $count;

?>
