<?php
$host = "psql-hope.postgres.database.azure.com";
$database = "hope";
$user = "usr@psql-hope";
$password = "pwd";

// Initialize connection object.
$conn = pg_connect("host=$host dbname=$database user=$user password=$password");
if (!$conn)
	echo "Connection failed to the database";

$ph_no = $_POST["ph_no"];
$date = $_POST["date"];
$address = $_POST["address"];
$count = $_POST["count"];
$lat = $_POST["lat"];
$long = $_POST["long"];

$query = "Insert into offer_food values('$ph_no','$date','$address','$count','$lat','$long')";

if (pg_query($conn, $query)) {
	header('location: food.html');
}
