<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Edit Syllabus</h4>
                        <form method="post" class="classform form-horizontal" enctype="multipart/form-data" action="<?=base_url()?>syllabus/edit">
	                        <div class="col-md-12"></div>
	                		

	                        <div class="row">
	                            <label class="col-md-2 label-on-left">Title: <?=requiredStar()?></label>
	                            <div class="row">
	                                <div class="col-md-4">
	                                    <div class="form-group label-floating is-empty">
	                                        <input type="text" value="<?=$syllabus->title?>" name="title" class="form-control up_case" required>
	                                        <input type="hidden" name='syi' value="<?=base64_encode($syllabus->syllabusID)?>">
	                                        <span class="text-danger"><?=form_error('title')?></span>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                	
	                                </div>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <label class="col-md-2 label-on-left">Description: <?=requiredStar()?></label>
	                            <div class="row">
	                                <div class="col-md-4">
	                                    <div class="form-group label-floating is-empty">
	                                        <textarea name="description" rows="5" class="form-control up_case" required><?=$syllabus->description?></textarea>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                	
	                                </div>
	                            </div>
	                        </div>




	                        <label class="col-md-2 label-on-left">Class: <?=requiredStar()?></label>
	                		<div class="row">
	                            <div class="col-md-4">
	                                <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                    <select name="classesID"  id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required>
	                                        <?php
	                                        $classesID = $syllabus->classesID;
	                                        foreach ($classes as $class) {
	                                        		if($classesID == $class->classesID) {
	                                                	echo "<option selected value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
	                                                }
	                                                else {
	                                                	echo "<option  value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
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
	

							<div class="row">
	                            <label class="col-md-2 label-on-left">File: <?=requiredStar()?></label>
	                            <div class="row">
	                                <div class="col-md-4">&nbsp;</div>
	                                <div class="col-md-6">
	                                	 <input type="file" name="photo" >
	                                	 <span class="text-danger"><?=form_error('photo')?></span>
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