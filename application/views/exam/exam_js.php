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
</script>