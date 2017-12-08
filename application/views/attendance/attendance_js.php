<script>
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
	
</script>