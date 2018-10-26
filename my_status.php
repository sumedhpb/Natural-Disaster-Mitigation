<?php
$servername="localhost";
$username="postgres";
$password="sumSVR@1";
$databasename="hope";
$port="5432";


$conn=pg_connect("host=$servername port=$port dbname=$databasename user=$username password=$password");
if(!$conn)
	echo "Connection failed to the database";


$lat=$_POST["lat"];
$long=$_POST["long"];
$rating=$_POST["rating"];

$query="Insert into my_status values('$lat','$long','$rating')";

if(pg_query($conn, $query))
	{
		header('location: my_status.html');
	}

?>
