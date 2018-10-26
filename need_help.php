<?php
$host = "psql-hope.postgres.database.azure.com";
$database = "hope";
$user = "sumedh@psql-hope";
$password = "sumSVR@1";

// Initialize connection object.
$conn= pg_connect("host=$host dbname=$database user=$user password=$password");
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
