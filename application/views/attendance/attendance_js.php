<script>
	$('form').on('submit', function(e) {
		e.preventDefault();
		var ci = $(this).find('#ci').val();
		var si = $(this).find('#sec').val();
		var d =  $(this).find('#d').val();
		var b = '<?=base_url()?>';
		//gsa(ci, si, base);
		gsa(ci,si,d,b);
	});
</script>