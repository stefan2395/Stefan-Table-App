<?php 
	include("connection.php");


	$q = "SELECT DISTINCT Hersteller_Markenname FROM app_table";
	$sql = mysqli_query($con, $q);
	$data = array();

	while($row = mysqli_fetch_array($sql, true)){
	    $data[] = $row; 
	};


	echo json_encode($data);   

	