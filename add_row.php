<?php 

	include 'connection.php';

	$Artikelnummer_im_Shop 				= $_POST['Artikelnummer_im_Shop'];
	$EAN_GTIN_Barcodenummer_UPC 		= $_POST['EAN_GTIN_Barcodenummer_UPC'];
	$Herstellerartikelnummern_HAN_MPN   = $_POST['Herstellerartikelnummern_HAN_MPN'];
	$Hersteller_Markenname   			= $_POST['Hersteller_Markenname'];

	$sql = "INSERT INTO app_table (
			Artikelnummer_im_Shop, 
			EAN_GTIN_Barcodenummer_UPC,
		 	Herstellerartikelnummern_HAN_MPN, 
		 	Hersteller_Markenname) 

	VALUES ('{$Artikelnummer_im_Shop}', 
			'{$EAN_GTIN_Barcodenummer_UPC}', 
			'{$Herstellerartikelnummern_HAN_MPN}', 
			'{$Hersteller_Markenname}')";

	$con->query($sql);

	echo "<td>{$name}</td>";
	echo "<td>{$email}</td>";
	echo "<td>{$password}</td>";

?>