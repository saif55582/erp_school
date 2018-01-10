<script>
	$('.institute_active').change(function() {
    var status = ($(this).prop('checked'));
    var hash = $(this).attr('hash');
    status = status ? 1 : 0;
    var data = 'active='+status+'&hash='+hash;
    
    $.ajax({
        type: 'post',
        url: '<?=base_url();?>superinstitute/status',
        data: data,
        success: function(data) {
        	if(data) {
        		demo.showNotification('top','center', 'done', 2, "Institute status changed" );
        	}
        }
    });
});

</script>