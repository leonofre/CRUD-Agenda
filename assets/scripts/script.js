jQuery( document ).ready( function( $ ) {
	$( document ).on( 'submit', '#register-form', function( event ) {
		event.preventDefault();
		var dados = $( this ).serialize();
		$.ajax({
			type: 'POST',
			url: 'includes/ajax/user-register.php',
			data: dados,
			success: function( response ) {
				response = JSON.parse( response );
				if ( response.success ) {
					document.getElementById( 'register-form' ).reset();
					$( '#success-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#success-message' ).addClass( 'hidden' );
					}, 3000 );
				} else {
					$( '#error-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#error-message' ).addClass( 'hidden' );
					}, 3000 );
				}
			}
		});
		return false;
	});

	$( document ).on( 'submit', '#register-event-form', function( event ) {
		event.preventDefault();
		var dados = $( this ).serialize();
		$.ajax({
			type: 'POST',
			url: 'includes/ajax/event-register.php',
			data: dados,
			success: function( response ) {
				response = JSON.parse( response );
				if ( response.success ) {
					document.getElementById( 'register-event-form' ).reset();
					$( '#success-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#success-message' ).addClass( 'hidden' );
					}, 3000 );
				} else {
					$( '#error-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#error-message' ).addClass( 'hidden' );
					}, 3000 );
				}
			}
		});
		return false;
	});

	$( document ).on( 'click', '.operation', function() {
		$( this ).siblings( 'input.operation' ).attr( 'value', $( this ).val() );
	});

	$( document ).on( 'submit', '.change-event', function( event ) {		
		var dados = $( this ).serialize();
		$.ajax({
			type: 'POST',
			url: 'includes/ajax/event-update-delete.php',
			data: dados,
			success: function( response ) {
				try {
					response = JSON.parse( response );
				} catch(e) {
					if ( ! response.is_update ) {
						$( '#table-container' ).html( response );
					}
					$( '#success-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#success-message' ).addClass( 'hidden' );
					}, 3000 );
					var is_delete = true;
				}

				if ( response.success || is_delete ) {
					$( '#success-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#success-message' ).addClass( 'hidden' );
					}, 3000 );
				} else {
					$( '#error-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#error-message' ).addClass( 'hidden' );
					}, 3000 );
				}
			}
		});
		return false;
	});

	$( document ).on( 'submit', '#update-user-form', function( event ) {		
		var dados = $( this ).serialize();
		$.ajax({
			type: 'POST',
			url: 'includes/ajax/user-update-delete.php',
			data: dados,
			success: function( response ) {
				response = JSON.parse( response );

				if ( response.success ) {
					$( '#success-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#success-message' ).addClass( 'hidden' );
					}, 3000 );
				} else {
					$( '#error-message' ).removeClass( 'hidden' );
					setTimeout( function() {
						$( '#error-message' ).addClass( 'hidden' );
					}, 3000 );
				}
			}
		});
		return false;
	});

	$( document ).on( 'click', '#delete-user', function( event ) {
		event.preventDefault();
		$confirm = confirm( 'Você deseja mesmo deletar este usuário?' );
		if ( $confirm ) {
			$( '#delete-user-form' ).submit();
		}
	});
})