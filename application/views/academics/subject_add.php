<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">

						<h4 class="card-title my-title">Add Subject</h4>
                        <form method="post" class="classform form-horizontal" action="<?=base_url()?>subject/add">
                        		<div class="col-md-12"></div>
                        		<label class="col-md-2 label-on-left">Class: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="classesID" id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required>
	                                            <?php
	                                            foreach ($classes as $class) {
	                                                $classesID = (set_value('classesID'));
	                                                if($classesID == base64_encode($class->classesID)) {
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
	                                                if($teacherID == base64_encode($teacher->teacherID)) {
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
	                                        	<option  value='1'>Optional</option>
	                                        	<option  value='0'>Mandatory</option>
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
		                                        <input type="text" value="<?=set_value('pass_marks')?>" name="pass_marks" class="form-control up_case" required>
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
		                                        <input type="text" value="<?=set_value('final_marks')?>" name="final_marks" class="form-control up_case" required>
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
		                                        <input type="text" value="<?=set_value('name')?>" name="name" class="form-control up_case" required>
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
		                                        <input type="text" value="<?=set_value('code')?>" name="code" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('code')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>
		                    
		                    <button type="submit" class="btn btn-success btn-sm">Add</button>

		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>