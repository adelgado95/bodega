<?php
require_once('db_connection.php');
	Class canal{
		var $id;
		var $canal;
		function obtenertodos()
		{
				$Dbobj = new db_connection(); 
	    		$string = "SELECT * FROM canal;";
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
		if($_REQUEST['mode']=='getAll')
		{
			$canal = new canal();
			echo $canal->obtenertodos();
		}
	}

 ?>