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
   		var subject	=	[];
   		var exam_date = [];
   		var time_from = [];
   		var time_to = [];
   		var room = [];
   		var hash = $('#hash').val();

   		$('#tbody tr').each(function() {
   			var s 	= $(this).find('#subject').val();
   			var d 	= $(this).find('#exam_date').val();
   			var t_f = $(this).find('#time_from').val();
   			var t_t = $(this).find('#time_to').val();
   			var r 	= $(this).find('#room').val();
   			subject.push(s);
   			exam_date.push(d);
   			time_from.push(t_f);
   			time_to.push(t_t);
   			room.push(r);
   		});

   		var data = 'subject='+subject+'&exam_date='+exam_date+'&time_from='+time_from+'&time_to='+time_to+'&room='+room+'&esi='+hash;
   		$.ajax({
   			type: 	'post',
   			url: 	'<?=base_url()?>/exam/add_schedule/<?=$examID?>/<?=$classesID?>',
   			data:  	data,
   			success: function(data) {
   				if(data === '1')
   					demo.showNotification('top','center','done',2,'Exam Schedule Saved.');
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
<script>
  $('#form_add_marks').on('click', '#proceed' , function() {
      var ei = $('#exam_sel').val();
      var ci = $('#class').val();
      if(ei && ci) {
         var target = "<?=base_url('exam/schedule/')?>"+ei+'/'+ci;
         window.location.href = target;   
      }
      else {
         demo.showNotification('top','center','done',4,'Select Exam and class');
      }
      
      
   });
</script>