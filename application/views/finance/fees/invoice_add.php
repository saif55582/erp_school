<div  class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

						<h4 class="card-title my-title">Add Invoice</h4>

                        <form method="post" class="classform form-horizontal" action="<?= base_url('fees/insert_invoice'); ?>">

                    		<div class="row">

                            	<div onclick="setFocus()" class="col-sm-4 mytargetchange">
                                    <select name="classesID" id="class" onchange="getStudentOption('<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required="true">
                                        <?php
                                        
                                            foreach($classes as $class):
                                                    echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                            endforeach;

                                        ?>
                                    </select>
                                </div>

                                <div onclick="setFocus()" class="col-sm-4 mytargetchange">
                                    <select name="studentID" id="stud" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Student">
                                        
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                	<div class="togglebutton">All Student
                                        <label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" id="all" name="all_student" value="yes">
                                        </label>
                                    </div>
                                </div>
							
							</div>
							<div class="row">
							
                                <? foreach ($fees as $fee) : ?>
                                    

                                    <div class="col-sm-6">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>

                                            <input type="hidden" name="fee_listID[]" class="form-control" value="<?= $fee->fee_listID ?>">

                                            <input type="text" name="fee_typeValue[]" class="form-control" placeholder="<?= $fee->fee_type ?>">
                                            <span class="help-block"><?= $fee->fee_type ?></span>
                                        </div>
                                    </div>

                                <? endforeach; ?>                             

                            </div>
                            <div class="row">

								<div >
									<div onclick="setFocus()" class="col-sm-6 mytargetchange">
	                                    <select name="concession_type" id="fee" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Concession">
	                                        <?php
	                                        
	                                            foreach($concession as $cons):
	                                                    echo "<option value='".$cons->fee_listID."'>".strtoupper($cons->concession_type)."</option>";
	                                            endforeach;

	                                        ?>
	                                    </select>
	                                </div>
								</div>

                                <div onclick="setFocus()" class="col-sm-6 mytargetchange">
                                    <select name="month" class="selectpicker" data-style="select-with-transition" title="Select Month" required="true">
                                        <option value="Jan">Jan</option>
                                        <option value="Feb">Feb</option>
                                        <option value="Mar">Mar</option>
                                        <option value="Apr">Apr</option>
                                        <option value="May">May</option>
                                        <option value="Jun">Jun</option>
                                        <option value="Jul">Jul</option>
                                        <option value="Aug">Aug</option>
                                        <option value="Sep">Sep</option>
                                        <option value="Oct">Oct</option>
                                        <option value="Nov">Nov</option>
                                        <option value="Dec">Dec</option>
                                    </select>
                                </div>

                            </div>

								<button type="submit" class="btn btn-rose pull-right btn-sm">Add</button>

		                </form>

		            </div>

		        </div>

		    </div>

		    <div class="col-sm-12">
                <ul class="timeline timeline-simple">
                    <li class="timeline-inverted">
                        <div class="timeline-badge danger">
                            <i class="material-icons">warning</i>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <span class="label label-danger">Note</span>
                            </div>
                            <div class="timeline-body">
                                <ul type="disc">
                                	<li>If You already added student Invoice for current month then invoice will not add. You can only edit.</li>
                                	<li>If you need any fee type then you can add before you create invoice and also you can write new fee type here into fee type input it will be saved.</li>
                                </ul>
                            </div>
                        </div>
                    </li>  
                </ul>
		    </div>

		</div>

	</div>

</div>