<?php
// Create connection
$con=mysqli_connect("host","username","password","db");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to database: " . mysqli_connect_error();
}

//getting the stored results
$query = "";
$st = $con->prepare( $query ); 
$rows = $st->fetchAll();

//adding rows to an array in order to pass them to view
$array = array(); 
foreach ( $rows as $row ){
	array_push($array, $row);
}

//pass the array to the display somehow.
?>
