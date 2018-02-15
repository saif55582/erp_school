<script>

	$('#usertype').change(function() {
		var ch = atob($(this).val());
		switch(ch) {
			case '2': 
				//teacher

				break;
			case '3':
				//student 
				$('#class_select').show('slow');
				break;
		}
	});

	$('#class').change(function() {
		var clas = ($(this).val());		
		var b = "<?=base_url()?>";
		getStudentOption(clas, b);

	});
	
</script>