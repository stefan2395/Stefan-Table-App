<?php 

	include 'connection.php';

	$id = $_POST['id'];

	$sql = 'DELETE FROM app_table WHERE id = "'.$id.'" ';

	$result = mysqli_query($con,$sql);

	if(isset($result)) {
	   echo "YES";
	} else {
	   echo "NO";
	}
?>