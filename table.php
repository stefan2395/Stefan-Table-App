<?php

	include("connection.php");

	$result = mysqli_query($con,"SELECT * FROM app_table");

	echo "<table border='1' class='table'>
	<tr>
	<td align=center><b>Roll No</b></td>
	<td align=center><b>Artikelnummer im Shop</b></td>
	<td align=center><b>EAN/GTIN/Barcodenummer/UPC</b></td>
	<td align=center><b>Herstellerartikelnummern HAN/MPN</b></td>
	<td align=center><b>Hersteller Markenname</b></td>
	<td align=center><b>Action</b></td>";
	?>

<?php	while($data = mysqli_fetch_row($result)) { ?>   

	    <tr>
		    <td align=center><?php echo $data[0] ?></td>
		    <td align=center><?php echo $data[1] ?></td>
		    <td align=center><?php echo $data[2] ?></td>
		    <td align=center><?php echo $data[3] ?></td>
		    <td align=center><?php echo $data[4] ?></td>
		    <td align=center>

		    	<a href="#" class="delete-button" type="button" id="delete" name="delete" data-id="<?php echo $data['0'] ?>">Delete</a>

		    	<a href="#" class="edit-button open-button" id="edit" name="edit" data-id="<?php echo $data['0'] ?>">Edit</a>
		    </td>

	    </tr>

	<?php }
	echo "</table>";
	?>


	<script>
	$(document).ready(function() {

		$(".open-button").on("click", function(){
			$(".form-popup").fadeIn("500").addClass("active");
		});

		$(".cancel").on("click", function(){
			$(".form-popup").fadeOut(500, function() {
				$(".form-popup").removeClass("active");
				location.reload();
			});
		});
	});
	</script>