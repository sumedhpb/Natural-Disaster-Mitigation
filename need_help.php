<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";
$databasename="hope";
$port="5432";


$conn=pg_connect("host=$servername port=$port dbname=$databasename user=$username password=$password");
if(!$conn)
	echo "Connection failed to the database";

$ph_no=$_POST["ph_no"];
$date=$_POST["date"];
$address=$_POST["address"];
$lat=$_POST["lat"];
$long=$_POST["long"];

$query="Insert into need_help values('$ph_no','$date','$address','$lat','$long')";

if(pg_query($conn, $query))
	{
		header('location: need_help.html');
	}

?>
