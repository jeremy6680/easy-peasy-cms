$(document).ready(function() {
	
		// confirm all destroys
		$('form').submit(function( event ) {
			var method = $(this).children(':hidden[name=_method]').val();
			if ($.type(method) !== 'undefined' && method == 'DELETE') {
				if (!confirm('Êtes-vous sûr ?')) {
					event.preventDefault();
				}
			}
		});
		
		
	// Editor
			$('.titleeditable').editable({height: 60});
            $('.editable').editable({height: 400});
});


