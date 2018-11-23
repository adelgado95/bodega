<?php
require_once('db_connection.php');
	Class zona{
		var $id;
		var $zona;
		var $id_departamento;
		function getzonafromdep($departamento)
		{
				$Dbobj = new db_connection(); 
	    		$string = "SELECT * FROM zona WHERE IdDepartamento=".$departamento.";";
	    		$query = mysqli_query($Dbobj->getdbconnect(),$string);
	    		if(!$query)
	    		{
	    			return "0";
	    		}
	    		else
	    			{
		    			if(mysqli_num_rows($query)!=0){
					    while($row = $query->fetch_assoc()) {
		            	$myArray[] = $row;
		    			}	
		    			echo json_encode($myArray);
						}
						else echo "0";
				}
		}
		function saveDepartment(){
    	
    	}
    }
	
	if(isset($_REQUEST))
	{
		if($_REQUEST['mode']=='get')
		{
			$zona = new zona();
			echo $zona->getzonafromdep($_REQUEST['departamento']);
		}
	}

 ?>