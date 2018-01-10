<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">

						<h4 class="card-title my-title">Edit Exam Schedule</h4>
                        <form method="post" class="classform form-horizontal" action="<?=base_url()?>exam/schedule_edit">
							<input type="hidden" name='i' value="<?=base64_encode($exam_schedule->exam_scheduleID)?>">
                        		<div class="col-md-12"></div>
								<label class="col-md-2 label-on-left">Exam: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="examID"  id="examID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Exam" required>
	                                            <?php
		                                            $examID = $exam_schedule->examID;
		                                            foreach ($exams as $exam) {
		                                            	if($examID == $exam->examID) {
		                                            		echo "<option selected value='".base64_encode($exam->examID)."'>".strtoupper($exam->name)."</option>";
		                                            	}
		                                            	else {
		                                            		echo "<option value='".base64_encode($exam->examID)."'>".strtoupper($exam->name)."</option>";
		                                            	}
		                                            }
	                                            ?>
	                                        </select>
	                                        <h7 class='text-danger'><?=form_error('classesID')?></h7>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                </div>
                                </div>


                        		<label class="col-md-2 label-on-left">Class: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="classesID"  onchange="getSection(this.value,'<?=base_url()?>',null);getSubjectOptions(this.value,'<?=base_url()?>');" class="selectpicker" data-style="select-with-transition" title="Select Class" required>
	                                            <?php
	                                            $classesID = $exam_schedule->classesID;
	                                            foreach ($classes as $class) {
	                                            	if($classesID == $class->classesID) {
	                                            		echo "<option selected value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
	                                            	}
	                                            	else {
	                                            		echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
	                                            	}
	                                                
	                                            }
	                                            ?>
	                                        </select>
	                                        <h7 class='text-danger'><?=form_error('classesID')?></h7>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                </div>
                                </div>

                                <label class="col-md-2 label-on-left">Section: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                       <select name="sectionID" id="sec" class="selectpicker" data-style="select-with-transition" title="Select Section">

			                                </select>
	                                        <h7 class='text-danger'><?=form_error('sectionID')?></h7>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                </div>
                                </div>
									
								<label class="col-md-2 label-on-left">Subject: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="subjectID" id="sub" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Subject" required>
	                                           <option value="">Select Subject</option>
	                                        </select>
	                                        <h7 class='text-danger'><?=form_error('subjectID')?></h7>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                </div>
                                </div>

	                           
	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Date: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$exam_schedule->date?>" name="exam_date" class="form-control datepicker" required >
		                                        <span class="text-danger"><?=form_error('exam_date')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Time From: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$exam_schedule->time_from?>" name="time_from" class="form-control timepicker" required>
		                                        <span class="text-danger"><?=form_error('time_from')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Time TO: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$exam_schedule->time_to?>" name="time_to" class="form-control timepicker" required>
		                                        <span class="text-danger"><?=form_error('time_to')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Room: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$exam_schedule->room?>" name="room" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('room')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>
		                    
		                    <button type="submit" class="btn btn-success btn-sm">Save</button>

		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>