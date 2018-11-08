<?php 

	include'connection.php';

	$Artikelnummer_im_Shop  			= $_POST['Artikelnummer_im_Shop'];
	$EAN_GTIN_Barcodenummer_UPC 		= $_POST['EAN_GTIN_Barcodenummer_UPC'];
	$Herstellerartikelnummern_HAN_MPN 	= $_POST['Herstellerartikelnummern_HAN_MPN'];
	$Hersteller_Markenname   			= $_POST['Hersteller_Markenname'];

	$id    		= $_POST['id'];

	$sql = "UPDATE app_table 

			SET Artikelnummer_im_Shop 			 = '{$Artikelnummer_im_Shop}', 
				EAN_GTIN_Barcodenummer_UPC 		 = '{$EAN_GTIN_Barcodenummer_UPC}', 
				Herstellerartikelnummern_HAN_MPN = '{$Herstellerartikelnummern_HAN_MPN}', 
				Hersteller_Markenname 			 = '{$Hersteller_Markenname }' 

			WHERE id = '{$id}'";

	$con->query($sql);

?>