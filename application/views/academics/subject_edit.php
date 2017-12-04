<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">

						<h4 class="card-title my-title">Edit Subject</h4>
                        <form method="post" class="classform form-horizontal" action="<?=base_url()?>subject/edit">
                        	<input type="hidden" name='sui' value="<?=base64_encode($subject->subjectID)?>">
                        		<div class="col-md-12"></div>
                        		<label class="col-md-2 label-on-left">Class: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="classesID"  id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required>
	                                            <?php
	                                            foreach ($classes as $class) {
	                                                $classesID = $subject->classesID;
	                                                if($classesID == ($class->classesID)) {
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

				
								<label class="col-md-2 label-on-left">Teacher: <?=requiredStar()?></label>
								<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="teacherID" id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Teacher" required>
	                                            <?php
	                                            foreach ($teachers as $teacher) {
	                                            	$teacherID = $subject->teacherID;
	                                                if($teacherID == ($teacher->teacherID)) {
	                                                    echo "<option selected value='".base64_encode($teacher->teacherID)."'>".strtoupper($teacher->name)."</option>";
	                                                }
	                                                else {
	                                                    echo "<option value='".base64_encode($teacher->teacherID)."'>".strtoupper($teacher->name)."</option>";
	                                                }
	                                                
	                                            }
	                                            ?>
	                                        </select>
	                                        <h7 class='text-danger'><?=form_error('teacherID')?></h7>
	                                    </div>
	                                </div>
	                                <div class="col-md-6"></div>
                                </div>


								<label class="col-md-2 label-on-left">Type: <?=requiredStar()?></label>
								<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <label class="control-label"></label>
	                                        <select name="option" id=""  class="selectpicker" data-style="select-with-transition" title=" Select Type" required>
	                                        	<?php
	                                        	$optional = $subject->optional;
	                                        	if($optional == 1) {
	                                        		echo "<option selected value='1'>Optional</option>";
	                                        		echo  "<option value='0'>Mandatory</option>";
	                                        	}
	                                        	else {
	                                        		echo "<option  value='1'>Optional</option>";
	                                        		echo  "<option selected value='0'>Mandatory</option>";
	                                        	}
	                                        	?>
	                                        </select>
	                                        <h7 class='text-danger'><?=form_error('option')?></h7>
	                                    </div>
	                                </div>
                                	<div class="col-md-6"></div>
                            	</div>

                            	<div class="row">
	                                <label class="col-md-2 label-on-left">Passs Marks: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$subject->pass_marks?>" name="pass_marks" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('pass_marks')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Final Marks: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$subject->final_marks?>" name="final_marks" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('final_marks')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Subject Name: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$subject->subject_name?>" name="name" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('name')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Subject Code: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$subject->subject_code?>" name="code" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('code')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>
		                    
		                    <button type="submit" class="btn btn-success btn-sm">Update</button>

		                </form>
                    	
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>