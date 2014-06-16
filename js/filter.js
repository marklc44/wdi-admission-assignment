// Filter function
// Requires jQuery

// takes the class of the item to be filtered
// '.blog-post' or '.project' 
function filterCategories(postType) {

	var $filter = $('.filters').find('.label');
	var $filterSet = $(postType);
	$filter.click(function(e) {
		e.preventDefault();
		var filterData = $(this).attr('data-category');
		$project.each(function() {
			if($(this).attr('data-category') == filterData) {
				$(this).removeClass('hidden');
	  	} else {
	  		$(this).removeClass('hidden')
	  		$(this).addClass('hidden');
	  	}
	  });
		});
		
	$('.label.all').click(function() {
		$(postType).removeClass('hidden');
	});

}