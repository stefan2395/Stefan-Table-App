<?php 

	include 'connection.php';

	$output = '';  
	if(isset($_POST["brand_id"]))  
	{  
	  	if($_POST["brand_id"] != '')  {  
	       	$sql = "SELECT * FROM app_table WHERE id = '".$_POST["brand_id"]."'";  
	  	}  
	  	else {  
	       	$sql = "SELECT * FROM app_table";  
	  	}  
	  	$result = mysqli_query($con, $sql);  
	  	
	  	while($row = mysqli_fetch_array($result))  {  
	       	$output .= '<div class="">'.$row["Hersteller_Markenname"].'</div>';  
	  	}  
	  	echo $output;  
	}  
 ?>  
