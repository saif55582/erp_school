<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">

						<h4 class="card-title my-title">Add Exam</h4>
                        <form method="post" class="classform form-horizontal" action="<?=base_url()?>exam/edit">
                        	<input type="hidden" name="i" value="<?=base64_encode($exam->examID)?>">
                        		<div class="col-md-12"></div>
	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Exam Name: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$exam->name?>" name="exam_name" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('exam_name')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Date: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$exam->date?>" name="exam_date" class="form-control datepicker" required>
		                                        <span class="text-danger"><?=form_error('exam_date')?></span>
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
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=$exam->description?>" name="description" class="form-control up_case" required>
		                                        <span class="text-danger"><?=form_error('description')?></span>
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