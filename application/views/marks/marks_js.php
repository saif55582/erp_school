<script>


	function getMarksByClass(ci) {
		var target = "<?=base_url('marks/class/')?>"+ci;
		window.location.href = target;
		
	}

	$('#form_add_marks').on('click', '#proceed' , function() {
		var ei = $('#exam_sel').val();
		var ci = $('#class').val();
		var si = $('#sec').val();
		var subi = $('#sub').val();
		var target = "<?=base_url('marks/add_marks/')?>"+ci+'/'+si+'/'+ei+'/'+subi;
		window.location.href = target;
		
	});

	$('#form_get_marks').on('click', '#proceed' , function() {
		var ei = $('#exam_sel').val();
		var mli = $('#marks_list').val();
		if(ei=='') {
			demo.showNotification('top','center', 'error',4, 'Exam must be selected');
			return false;
		}
		var data = 'ei='+ei+'&mli='+mli;
		$.ajax({
			type: 'post',
			data: data,
			url: '<?=base_url('marks/getMarks')?>',
			success: function(data) {
				$('tbody').html(data);
			}
		});
		
	});


	$('#set_marks').bind('click', function() {

		var ei = $('#exam_sel').val();
		var subi = $('#sub').val();

		var ci = $('#form_add_marks').find('#class').val();
		var si = $('#form_add_marks').find('#sec').val();
		var m = [];
		var st = [];

		$('#tbody tr').each(function() {
			
			var sm = $(this).find('#marks_obtained').val();
			var s = $(this).find('#student').val()
			m.push(sm);
			st.push(s);
		});
		 
		var data = 'a='+ei+'&b='+ci+'&c='+si+'&d='+subi+'&e='+st+'&f='+m;
		$.ajax({
			type: 'post',
			url: '<?=base_url()?>/marks/aM',
			data: data,
			success: function(data) {
				if(data == 'done')
					demo.showNotification('top','center', 'done',2, 'Marks Saved');
			}
		}).fail(function(errObj, status, err) {
			demo.showNotification('top','center', 'error',4, err);
		});
		
	});


	function getMarks(subi) {
		var ci = $('#class').val();
		var si = $('#sec').val();
		var ei = $('#exam_subject').find('#exam').val();
		if(ei === '') {
			demo.showNotification('top','center', 'error',4, 'Exam field is required..!');
			return false;
		}
		var data = 'exam='+ei+'&subject='+subi;

		var target = "<?=base_url('marks/add_marks/')?>"+ci+'/'+si+'/'+ei+'/'+subi;
		window.location.href = target;
	}

</script>
<script>

	<?php
		if($this->session->flashdata('class')) { 
			$classesID 	= $this->session->flashdata('class');
			$sectionID 	= $this->session->flashdata('section');
			$subject 	= $this->session->flashdata('subject');
			$base = base_url();

	?>
			getSubjectOptions('<?=$classesID?>','<?=$base?>','<?=$subject?>');
			getSection('<?=$classesID?>','<?=$base?>','<?=$sectionID?>');
<?php	} ?>

</script>