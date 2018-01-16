<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">

						<h4 class="card-title my-title">Select Exam & Class</h4>
                        <div class="classform form-horizontal" id='select_exam'>
                        		<div class="col-md-12"></div>

								<label class="col-md-2 label-on-left">Exam: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="exam"  id="exam"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Exam" required>
	                                            <?php
	                                            foreach ($exams as $exam) {

	                                            	if($examID == $exam->examID) {

	                                            		echo "<option selected value='".base64_encode($exam->examID)."'>".strtoupper($exam->name)."</option>";
	                                            	}
	                                            	else {
	                                            		echo "<option   value='".base64_encode($exam->examID)."'>".strtoupper($exam->name)."</option>";
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
	                                        <select name="class" id="class" getSubjectOptions(this.value,'<?=base_url()?>');" class="selectpicker" data-style="select-with-transition" title="Select Class" required>
	                                            <?php
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

		                    <button  id='sub' class="btn btn-success btn-sm">Submit</button> 

		                </div>
		            </div>
		        </div>

				<?php print_r($exam_schedule); ?>
				<?php  if($subjects): ?>
		        <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">add</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Add Exam Schedule</h4>
                            <table class="table">
                                <thead class="text-primary">
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Time From</th>
                                    <th>Time To</th>
                                    <th>Room <?=count($exam_schedule)?></th>
                                </thead>
                                <tbody id="tbody">
                                <?php 

                            		foreach($exam_schedule as $schedule): ?>								
									<tr>
										<td><?=$schedule->subjectID?></td>
										<td>
		                                    <input type="text" value="" id="exam_date" class="form-control datepicker exam_date" required > 
		                                    <input type="hidden" id="hash" value="<?=base64_encode($schedule->scheduleID)?>">   
										</td>
										<td>
											<input type="text" value="" id="time_from" class="form-control timepicker time_from" required>
										</td>
										<td>
											<input type="text" value="" id="time_to" class="form-control timepicker time_to" required>
										</td>
										<td><input type="text" value="" id="room" class="form-control room"> </td>
									</tr>
                           		<?php endforeach; ?>
                                </tbody>
                            </table>
                        <button id="exam_schedule" class="btn btn-success btn-sm">Save</button> 
                    </div>
                </div>

            <?php endif; ?>
		    </div>
		</div>
	</div>
</div>