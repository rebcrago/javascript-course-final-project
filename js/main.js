//use document.ready to wait for the ready state of the page
$(document).ready(function(){//take the following actions when the page loads
	//bind to the submit event on the form
	$('form').on('submit', function(e){//take the following actions on form submission
		e.preventDefault(); //prevent the submit button on the form from taking any action
		var searchFieldVal = $('#search').val(); //get the value from the title field
		
		//make an ajax call using jquery's ajax method
		$.ajax({
			type: "GET", //make the call of type get to retrieve information from the server
			url: 'https://cragolibrarian.com/goodreads.php?title=' +  searchFieldVal, //call our API --  use PHP to get around CORS
			async:true,
			dataType : 'json',  //expect json back from the server
			success: function(data, status, xhr) { //take these actions on a sucessful response
				//replace the innerHTML of the reviews section with data from our "data" parameter
				$('.reviews').html(data.reviews_widget); //data.reviews_widget should contain a custom widget for reviews from goodreads api
			}
		});
	});
});