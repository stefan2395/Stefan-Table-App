<?php 

	include 'connection.php';

	$name 		= $_POST['Artikelnummer_im_Shop'];
	$email 		= $_POST['EAN_GTIN_Barcodenummer_UPC'];
	$password   = $_POST['Herstellerartikelnummern_HAN_MPN'];

	$sql = "INSERT INTO app_table (Artikelnummer_im_Shop, EAN_GTIN_Barcodenummer_UPC, Herstellerartikelnummern_HAN_MPN) VALUES ('{$name}', '{$email}', '{$password}' )";
	$con->query($sql);

	echo "<td>{$name}</td>";
	echo "<td>{$email}</td>";
	echo "<td>{$password}</td>";

?>