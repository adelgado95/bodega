<?php
require_once('db_connection.php');
	Class marca{
		var $id;
		var $marca;

		   function saveEntrada(){
    	
    	}
    }
	
	if(isset($_REQUEST))
	{
		if($_REQUEST['mode']=='getAll')
		{
			$Dbobj = new db_connection(); 
    		$string = "SELECT * FROM marca;";
       		if($query = mysqli_query($Dbobj->getdbconnect(),$string)){
			    while($row = $query->fetch_assoc()) {
            	$myArray[] = $row;
    			}
    			echo json_encode($myArray);
			}

        
		}
	}
	
 ?>