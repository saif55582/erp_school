<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Syllabus</h4>
                        <form method="post" class="classform form-horizontal" action="#">
		                    
		                    <div onclick="setFocus();" class="form-group label-floating">
		                        <label class="control-labe">Class: <span class="text-danger">*</span></label>
		                        <select  name="classesID"  id="classesID" data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
		                            <?php
			                            foreach ($classes as $class) {
			                                echo"
			                                	<option value='".$class->classesID."'>".strtoupper($class->class_name)."</option>"
			                                ;
			                            }
		                            ?>
		                        </select>
		                        <h7 id="classesID_add" class="text-danger"><?= form_error('classesID')?></h7>
		                    </div>    

		                    <div class="form-group label-floating">
		                        <label class="control-labe">Title: <span class="text-danger">*</span></label>
		                        <input type="text" class="form-control up_case" name="titlt">
		                        <h7 id="max_student_add" class="text-danger"><?= form_error('title')?></h7>
		                    </div>

		                    <div class="form-group label-floating">
		                        <label class="control-labe">Description: <span class="text-danger">*</span></label>
		                        <input type="text" class="form-control up_case" name="description">
		                        <h7 id="max_student_add" class="text-danger"><?= form_error('description')?></h7>
		                    </div>

		                    <div class="form-group label-floating">
		                        <label class="control-labe">File Upload: <span class="text-danger">*</span></label>
		                        <input type="text" class="form-control up_case" name="file_upload">
		                        <h7 id="max_student_add" class="text-danger"><?= form_error('file_upload')?></h7>
		                    </div>

		                    <button type="submit" class="btn btn-success btn-sm">Add</button>
		                </form>

		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>