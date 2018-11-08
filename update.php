<?php 

	include'connection.php';

	$name  		= $_POST['Artikelnummer_im_Shop'];
	$email 		= $_POST['EAN_GTIN_Barcodenummer_UPC'];
	$password 	= $_POST['Herstellerartikelnummern_HAN_MPN'];
	$id    		= $_POST['id'];

	$sql = "UPDATE app_table SET Artikelnummer_im_Shop = '{$name}', EAN_GTIN_Barcodenummer_UPC = '{$email}', Herstellerartikelnummern_HAN_MPN = '{$password}' WHERE id = '{$id}'";
	$con->query($sql);

?>