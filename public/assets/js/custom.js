/* custom js */
$(document).ready(function(){
	
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});


	// close row on click cross
	$(document).on("click",".cross-td",function(){
		$(this).parents('tr').remove();
	});

	
	// add row on click add more btn

	$(document).on("click",".add-row-td", function(){
		var row= $('.add-tr-body').first('tr').html();
		$(this).parents('table').find('.add-tr-body').append(row);
	});


  //end document
});