<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Subject</h4>
                        <form method="post" class="classform form-horizontal" action="#">
		                    
		                    <div onclick="setFocus();" class="form-group label-floating">
		                        <label class="control-labe">Class: <span class="text-danger">*</span></label>
		                        <select  name="classesID"  id="classesID" data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
		                            <?php
		                            foreach ($classes as $class) {
		                                echo "<option value='".$class->classesID."'>".strtoupper($class->class_name)."</option>";
		                            }
		                            ?>
		                        </select>
		                        <h7 id="classesID_add" class="text-danger"><?= form_error('classesID')?></h7>
		                    </div>    
		    
		                    <div class="form-group label-floating">
		                        <label class="control-labe">Teacher: <span class="text-danger">*</span></label>
		                        <select name="teacherID" id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
		                            <?php
		                            foreach ($teachers as $teacher) {
		                                echo "<option value='".$teacher->teacherID."'>".strtoupper($teacher->name)." (".$teacher->teacherID.")</option>";
		                            }
		                            ?>
		                        </select>
		                        <h7 id="teacherID_add" class="text-danger"><?= form_error('teacherID')?></h7>
		                    </div>

		                    <div class="form-group label-floating">
		                        <label class="control-labe">Type: <span class="text-danger">*</span></label>
		                        <select name="submit_type" id="submit_type"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
		                            <option value="Optional">Optional</option>
		                            <option value="Mandatory">Mandatory</option>
		                        </select>
		                        <h7 id="teacherID_add" class="text-danger"><?= form_error('submit_type')?></h7>
		                    </div>     

		                    <div class="form-group label-floating">
		                        <label class="control-labe">Pass Marks: <span class="text-danger">*</span></label>
		                        <input type="text" class="form-control up_case" name="pass_marks">
		                        <h7 id="max_student_add" class="text-danger"><?= form_error('pass_marks')?></h7>
		                    </div>

		                    <div class="form-group label-floating">
		                        <label class="control-labe">Final Marks: <span class="text-danger">*</span></label>
		                        <input type="text" class="form-control up_case" name="final_marks">
		                        <h7 id="max_student_add" class="text-danger"><?= form_error('final_marks')?></h7>
		                    </div>

		                    <div class="form-group label-floating">
		                        <label class="control-labe">Subject Name: <span class="text-danger">*</span></label>
		                        <input type="text" class="form-control up_case" name="subject_name">
		                        <h7 id="max_student_add" class="text-danger"><?= form_error('subject_name')?></h7>
		                    </div>

		                    <div class="form-group label-floating">
		                        <label class="control-labe">Subject Code: <span class="text-danger">*</span></label>
		                        <input type="text" class="form-control up_case" name="subjrct_code">
		                        <h7 id="max_student_add" class="text-danger"><?= form_error('subjrct_code')?></h7>
		                    </div>
		                    
		                    <button type="submit" class="btn btn-success btn-sm">Add</button>
		                </form>

		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>