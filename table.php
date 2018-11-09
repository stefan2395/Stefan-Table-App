<?php include 'header.php'; ?>


<input id="myInput" type="text" placeholder="Search..">
<?php

	include("connection.php");

	$record_per_page = 10;  
 	$page = '';

	if(isset($_POST["page"]))  {  
      	$page = $_POST["page"];  
 	}  
 	else  {  
      	$page = 1;  
 	}

 	$start_from = ($page - 1) * $record_per_page;


	$result = mysqli_query($con,"SELECT * FROM app_table  ORDER BY id DESC LIMIT $start_from, $record_per_page");

	echo "<table border='1' class='table' id='mytable'>
	<thead>
		<tr>
			<th align=center><b>Roll No</b></th>
			<th class='sortable' align=center><b>Artikelnummer im Shop</b></th>
			<th align=center><b>EAN/GTIN/Barcodenummer/UPC</b></th>
			<th align=center><b>Herstellerartikelnummern HAN/MPN</b></th>
			<th align=center><b>Hersteller Markenname</b></th>
			<th align=center><b>Action</b></th>
		</tr>
	</thead>";
	?>

	<tbody>
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


		<?php } ?>

	</tbody>

<?php echo "</table>"; 

	$output = '';
	$page_query = "SELECT * FROM app_table ORDER BY id DESC";  
	$page_result = mysqli_query($con, $page_query);  
	$total_records = mysqli_num_rows($page_result);  
	$total_pages = ceil($total_records/$record_per_page);

?>
	<div class='pagination_container'>

<?php

	for($i=1; $i<=$total_pages; $i++)  {  
	  $output .= "<span class='pagination_link' id='".$i."'>".$i."</span>";  
	}  
	
 	$output .= '</div><br /><br />';  
 	echo $output; ?>

	</div>






	<script>
	$(document).ready(function() {




		// =============> ADD Class active for popup  <=============
		$(".open-button").on("click", function(){
			$(".form-popup").fadeIn("500").addClass("active");
		});

		$(".cancel").on("click", function(){
			$(".form-popup").fadeOut(500, function() {
				$(".form-popup").removeClass("active");
				location.reload();
			});
		});
		// =============> END: ADD Class active for popup  <=============





		// =============> SEARCH TABLE  <=============

	  	$("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#mytable tbody tr").filter(function() {
		      	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
  		});
		// =============>END: SEARCH TABLE  <=============





		// =============> SORT Table  <=============
		var thIndex = 0,
	    curThIndex = null;

		$(function(){
		  $('table thead tr th').click(function(){
		    thIndex = $(this).index();
		    if(thIndex != curThIndex){
		      curThIndex = thIndex;
		      sorting = [];
		      tbodyHtml = null;
		      $('table tbody tr').each(function(){
		        sorting.push($(this).children('td').eq(curThIndex).html() + ', ' + $(this).index());
		      });
		      
		      sorting = sorting.sort();
		      sortIt();
		    }
		  });
		})

		function sortIt(){
		  for(var sortingIndex = 0; sortingIndex < sorting.length; sortingIndex++){
		  	rowId = parseInt(sorting[sortingIndex].split(', ')[1]);
		  	tbodyHtml = tbodyHtml + $('table tbody tr').eq(rowId)[0].outerHTML;
		  }
		  $('table tbody').html(tbodyHtml);
		}
		// =============>END: SORT Table  <=============

	});


	</script>