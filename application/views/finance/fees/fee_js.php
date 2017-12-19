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

    $('#FeeType').DataTable({
        "pagingType": "simple_numbers",
        "bInfo":false,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

    var table = $('#FeeType').DataTable();
    $('.card .material-FeeType label').addClass('form-group');
    


    $('#concession').DataTable({
        "pagingType": "simple_numbers",
        "bInfo":false,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });


    var table = $('#concession').DataTable();
    $('.card .material-concession label').addClass('form-group');

</script>