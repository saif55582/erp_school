<script type="text/javascript">
	
	function PaymentMode(mode){
		if(mode == 'Cheque'){
			$('#cheque_block').show();
			$('#dd_block').hide();
		}
		if(mode == 'DD'){
			$('#cheque_block').hide();
			$('#dd_block').show();
		}
		if(mode == 'Cash'){
			$('#cheque_block').hide();
			$('#dd_block').hide();
		}
	}

</script>