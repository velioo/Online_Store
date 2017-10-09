$(document).ready(function() {
	
	var specificationsUrl = getSpecificationsUrl();
	
	
	$('#category').on('change', function() {
		
		var categoryId = $('#category').val();
		
		if(categoryId != "") {		
			$.post(specificationsUrl, {categoryId: categoryId}, function(data, status) {
				if(data) {
					$('#specifications_tbody').empty();
					$('.specifications_div').show();
					$.each(data, function(index, value) {
						$('#specifications_tbody').append('<tr><td>' + value.name + '</td>' + '<td><input name="specs[' + value.id + ']" type="text">' + '</tr>');
					});
				} else {
					$('#specifications_tbody').empty();
				}
			});
		} else {
			$('.specifications_div').hide();
		}
		
	});
	
});
