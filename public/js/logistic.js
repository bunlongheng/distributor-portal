$('#note').hide();
		
		$("#payment_method").change(function() {

			
			console.log($("#payment_method option:selected").val());


			
			if ($("#payment_method option:selected").val() == 'Shipper Paid') {
				$('#shipping_carrier').prop('disabled', 'disabled');
				$('#shipping_carrier').val('Receiver Paid');
				$('#shipping_number').hide();
				$('#note').show();
				$('#shipping_carrier').hide();
				$('#shiping_carrier_label').hide();

				



			} else {
				$('#shipping_carrier').prop('disabled', false);
				$('#shipping_number').show();
				$('#note').hide();
				$('#shiping_carrier_label').show();
				$('#shipping_carrier').show();
			}
		}).trigger('change'); 