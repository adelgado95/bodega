<?php
Class db_connection{
    function getdbconnect(){
        $conn = mysqli_connect("localhost","root","","dpbodega") or die("Couldn't connect");
        return $conn;
    }

}
?>