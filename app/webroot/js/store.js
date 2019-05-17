$(document).ready(function(){
		var item_id;
		$('.dialog-form').dialog({
			autoOpen: false,
			show: {
				effect: 'blind',
				duration: 500
			},
			hide: {
				effect: 'blind',
				duration: 500
			}
		});

		$('.purchase').click(function(){
			$('.dialog-form').dialog('open');
			item_id = this.id;
		});

		$('.form1').submit(function(event){
			event.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/items/add_to_cart',
				data: {
					item_id: item_id,
					item_quantity: $('#OrderQuantity').val(),
				},
				success: function(result){
					$('.dialog-form').dialog('close');
					if (result.indexOf('Can') > -1) {
						swal({
								title: 'Error',
								text: result,
								icon: 'error'
							});
					} else {
						swal({
								title: 'Success',
								text: result,
								icon: 'success'
							});
					}
				},
				error: function(){
					$('.dialog-form').dialog('close');
					swal({
							title: 'Error',
							text: 'You must login to purchase item',
							icon: 'error'
						});
				}
			});
		});

		$('#UserUserEmail').change(function(){
			$.ajax({
				type: 'POST',
				url: '/users/check_exist',
				data: {
					email: $('#UserUserEmail').val()
				},
				success: function(result){
					$('#message').html(result);
				}
			});
		});


		$('#UserUserBirthday').datepicker({
				dateFormat: "yy-mm-dd",
				defaultDate: "-27y",
				changeMonth: true,
				changeYear: true,
				yearRange: "1930:2017"
			});


		$('#confirm_pass').change(function(){
				$pass = $('#new_pass').val();
				$confirm = $('#confirm_pass').val();
				if ($pass != $confirm) {
					$('#match').html('Password confirm doesn\'t match');
				} else {
					$('#match').html('');
				}
			});

		$(".delete").click(function(){
	        return confirm('Are you sure?');
	    });
	});