<script>
	
	<?php 
	    if($this->session->flashdata('exam_schedule_add') == 'success') {
	        echo "demo.showNotification('top','center','done',2,'Exam Schedule Added.');";
	    }
	    if($this->session->flashdata('class')) {
	    	$classesID = $this->session->flashdata('class'); 
	    	$sectionID = $this->session->flashdata('section'); 
	    	$subjectID = $this->session->flashdata('subject'); ?>
	        getSection('<?=$classesID?>','<?=base_url()?>','<?=$sectionID?>');
	        getSubjectOptions('<?=$classesID?>','<?=base_url()?>','<?=$subjectID?>');
   <?php } ?>


   $('#exam_schedule').bind('click', function() {
   		var exam_date = [];
   		var time_from = [];
   		var time_to = [];
   		var room = [];
   		var hash = [];

   		$('#tbody tr').each(function() {
   			var d 	= $(this).find('#exam_date').val();
   			var t_f = $(this).find('#time_from').val();
   			var t_t = $(this).find('#time_to').val();
   			var r 	= $(this).find('#room').val();
   			var h   = $(this).find('#hash').val();
   			exam_date.push(d);
   			time_from.push(t_f);
   			time_to.push(t_t);
   			room.push(r);
   			hash.push(h);
   		});

   		var data = 'exam_date='+exam_date+'&time_from='+time_from+'&time_to='+time_to+'&room='+room+'&esi='+hash;
   		$.ajax({
   			type: 	'post',
   			url: 	'<?=base_url()?>/exam/add_schedule/<?=$examID?>/<?=$classesID?>',
   			data:  	data,
   			success: function(data) {
   				console.log(data);
   			}
   		}).fail(function(errObj, status, err) {
   			console.log(err);
   		});
   		
   });

   $('#sub').on('click', function() {

   		var exam = $('#select_exam').find('#exam').val();
   		var clas = $('#select_exam').find('#class').val();
   		var target = '<?=base_url("exam/add_schedule/")?>'+exam+'/'+clas;
   		window.location.href = target;
   		
   });

</script>