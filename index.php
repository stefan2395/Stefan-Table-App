<?php include 'header.php'; ?>
	


	<div class="table__container">
		<div class="add-new__container">
			<a href="#" class="open-button add-new">Add new</a>
		</div>
		
		<div class="select-list__container">
			<select id="a1_title">
		  		<option>Default</option>
			</select>
		</div>




		<div id="responsveTable" class="">
			
		</div>
	</div>




	<div class="form-popup">

		<form id="frm" class="form__container">	
			<a href="#" type="button" class="btn cancel">&times;</a>
			<ul>

				<input type="hidden" id="id" name="id" value="0">

				<li>
					<label>Artikelnummer im Shop</label>
					<input type="text" name="Artikelnummer_im_Shop" id="Artikelnummer_im_Shop">	
				</li>

				<li>
					<label>EAN/GTIN/Barcodenummer/UPC</label>
					<input type="text" name="EAN_GTIN_Barcodenummer_UPC" id="EAN_GTIN_Barcodenummer_UPC">
				</li>

				<li>
					<label>Herstellerartikelnummern HAN/MPN</label>
					<input type="text" name="Herstellerartikelnummern_HAN_MPN" id="Herstellerartikelnummern_HAN_MPN">
				</li>

				<li>
					<label>Hersteller Markenname</label>
					<input type="text" name="Hersteller_Markenname" id="Hersteller_Markenname">
				</li>

				<li>
					<input type="submit" name="submit" id="save">
				</li>

			</ul>
		</form>

	</div>


</body>


<script type="text/javascript">

	$(document).ready(function() {


		// =============> DISPLAY Table  <=============
		load_data();
		function load_data(page) {
			$.ajax({
				method: "POST",
				url:  "table.php",
				data:{
					page:page 
				},
				success: function(data) {
					$("#responsveTable").html(data);
				}
			});
		}

		// pagination
		$(document).on('click', '.pagination_link', function(){  
		   	var page = $(this).attr("id");  
		   	load_data(page);  
		});
		// =============> END: DISPLAY Table  <=============



		// =============> SELECT LIST BRAND Table  <=============
		$(function(){
		  	var items="";
	 	 	$.getJSON("select_brand.php",function(data){

		    $.each(data,function(index,item) {
		      	items+="<option value='"+item.Hersteller_Markenname+"'>"+item.Hersteller_Markenname+"</option>";
		    });
		    	$("#a1_title").html(items); 
		  });

		});	


			$('#a1_title').change(function(){
                //Selected value
                var inputValue = $(this).val();
                alert("value in js "+inputValue);
                
                //Ajax for calling php function
                $.post('select_brand.php', { dropdownValue: inputValue }, function(data){
                    alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
                });
            });

		// =============>END: SELECT LIST BRAND Table  <=============






		// =============> ADD Row  <=============
		$("#save").click(function(){

			var id = $("#id").val();

			if (id == 0) {
				$.ajax({
					type: "post",
					url:  "add_row.php",
					data: $("#frm").serialize(),
					success: function(d) {
						$("<tr></tr>").html(d).appentTo(".table");
						$("#frm")[0].reset();
						$("#id").val("0");
						alert("Row is ADDED!")
					}
				});
		// =============>END: ADD Row  <=============


		// =============> SAVE Row  <=============
			} else {
				$.ajax({
					type: "post",
					url:  "update.php",
					data: $("#frm").serialize(),
					success: function(d) {
						
						$("#frm")[0].reset();
						$("#id").val("0");
						alert("Row is UPDATE!")
					}
				});

			}

		});
		// =============> END: SAVE Row  <=============




		// =============> UPDATE Row  <=============
		$(document).on('click',"#edit", function(){

			var row = $(this);
			var id   = $(this).attr("data-id");

			$('#id').val(id);

			var Artikelnummer_im_Shop = row.closest("tr").find("td:eq(1)").text();
			$("#Artikelnummer_im_Shop").val(Artikelnummer_im_Shop);

			var EAN_GTIN_Barcodenummer_UPC = row.closest("tr").find("td:eq(2)").text();
			$("#EAN_GTIN_Barcodenummer_UPC").val(EAN_GTIN_Barcodenummer_UPC);

			var Herstellerartikelnummern_HAN_MPN = row.closest("tr").find("td:eq(3)").text();
			$("#Herstellerartikelnummern_HAN_MPN").val(Herstellerartikelnummern_HAN_MPN);

			var Hersteller_Markenname = row.closest("tr").find("td:eq(4)").text();
			$("#Hersteller_Markenname").val(Hersteller_Markenname)
		});
		// =============> END: UPDATE Row  <=============







		// =============> DELETE Row  <=============
		$(document).on('click',"#delete", function(){

			var $ele = $(this).parent().parent();
			var id   = $(this).attr("data-id");

				$.ajax({
					type: "post",
					url:  "delete.php",
					data: {id:id},
				    success: function(data){
				         if(data){
				             $ele.fadeOut(500, function() {
				             	$ele.remove()
				             });
				             
				         }else{
				             alert("can't delete the row")
				         }
				    }
				});
		});
		// =============> END: DELETE Row  <=============

	


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

 

	});
	




</script>

</html>
