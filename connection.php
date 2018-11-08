<?php 

	$con = mysqli_connect("localhost","root",""); 
	mysqli_select_db($con,"app");

	if (!$con)
	{
	    die('Could not connect: ' . mysqli_error());
	}   
	
?>