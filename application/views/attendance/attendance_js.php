<script>


	$(document).ready(function() {
	    $('#datatable').DataTable({
	        "pagingType": "full_numbers",
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

	    var table = $('#datatable').DataTable();
	    $('.card .material-datatables label').addClass('form-group');
	    demo.initFormExtendedDatetimepickers();
	    $('.myscroll').perfectScrollbar();
	});


	//report
	TableExport.prototype.defaultButton = "btn btn-blue btn-sm";
	var liveTableData = $('#mytable').tableExport({
		filename: false
	});

	$('#form_student').on('submit', function(e) {
		e.preventDefault();
		var ci = $(this).find('#ci').val();
		var si = $(this).find('#sec').val();
		var d =  $(this).find('#d').val();
		var b = '<?=base_url()?>';
		gsa(ci,si,d,b);
	});

	$('#form_teacher').on('submit', function(e) {
		e.preventDefault();
		var d =  $(this).find('#d').val();
		var b = '<?=base_url()?>';
		gta(d,b);
	});

	$('#report_form').bind('submit', function(e) {

		var name = $('#mytable').attr('n')+ $("#export_year").val()+$('#export_month').val();
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			type: 'POST',
			url: '<?=base_url()?>'+'/attendance/gR',
			data: $(this).serialize(),
			success: function(msg) {
				$('#tbody').html(msg);
				TableExport.prototype.defaultFilename = name;
				
				liveTableData.update();
				liveTableData.reset();
			}
		});

	})
	
	
</script>