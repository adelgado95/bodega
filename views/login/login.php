<?php 
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 		$user = $_POST["username"];
		$pass =  $_POST["pass"];
		$cypherpass = md5($_POST["pass"]);
 		$conn = mysqli_connect("localhost","root","","dpbodega") or die("Couldn't connect");
 		$string = "SELECT id,user,permisos,area FROM users WHERE user='$user' AND pass='$cypherpass' LIMIT 1;";
		$sql = mysqli_query($conn,$string);
		if(mysqli_num_rows($sql)>0){		
		 while ($row = $sql->fetch_assoc()) {
        	$_SESSION['app_id'] = $row["id"];
        	$_SESSION['user'] = $row["user"];
        	$_SESSION['area'] = $row["area"];
        	$_SESSION['permisos'] = $row["permisos"];
	    }

		//$_SESSION['app_id'] = ;
		//$_SESSION['user'] = $row[1];
		echo $_SESSION['app_id'];
		echo $_SESSION['user'];
		ini_set('session.cookie.lifetime', time() + (60*60*24));
		header("location:index.php");
		die();
	}
	else
	{
		$cypherpass = md5($_POST["pass"]);
		echo $cypherpass;
		//header("location:index.php");
	}

}
else
{
	echo -1;
}
?>
