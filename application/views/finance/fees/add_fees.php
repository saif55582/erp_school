<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">

						<h4 class="card-title my-title">Add Fees</h4>
                        <form method="post" class="classform form-horizontal">
                        		<div class="col-md-12"></div>
                        		<div class="row">
	                                <label class="col-md-2 label-on-left">Fee Name: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=set_value('fee_name')?>" name="fee_name" class="form-control up_case" placeholder="eg:Tution Fee" required>
		                                        <span class="text-danger"><?=form_error('fee_name')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Fee Description:</label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="text" value="<?=set_value('fee_desc')?>" name="fee_desc" class="form-control up_case" placeholder="" >
		                                        <span class="text-danger"><?=form_error('fee_desc')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

	                            <div class="row">
	                                <label class="col-md-2 label-on-left">Amount: <?=requiredStar()?></label>
	                                <div class="row">
		                                <div class="col-md-4">
		                                    <div class="form-group label-floating is-empty">
		                                        <label class="control-label"></label>
		                                        <input type="number" value="<?=set_value('amount')?>" name="amount" class="form-control up_case" placeholder="" required>
		                                        <span class="text-danger"><?=form_error('amount')?></span>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                	
		                                </div>
	                                </div>
	                            </div>

								<label class="col-md-2 label-on-left">Fee Type: <?=requiredStar()?></label>
								<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <label class="control-label"></label>
	                                        <select name="fee_type" id=""  class="selectpicker" data-style="select-with-transition" title="Select Type" required>
	                                        	<option  value='1'>Annual</option>
	                                        	<option  value='2'>Bi-Annual</option>
	                                        	<option  value='3'>Tri-Annual</option>
	                                        	<option  value='4'>Quarterly</option>
	                                        	<option  value='5'>Monthly</option>
	                                        	<option  value='6'>One Time</option>
	                                        </select>
	                                        <h7 class='text-danger'><?=form_error('fee_type')?></h7>
	                                    </div>
	                                </div>
                                	<div class="col-md-6"></div>
                            	</div>


                        		<label class="col-md-2 label-on-left">Class: <?=requiredStar()?></label>
                        		<div class="row">
	                                <div class="col-md-4">
	                                    <div onclick="setFocus()" class="form-group label-floating is-empty">
	                                        <select name="classesID"  id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required>
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
				
		                    <button type="submit" class="btn btn-success btn-sm">Add</button>

		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>