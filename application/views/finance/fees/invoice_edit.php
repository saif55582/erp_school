<div  class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8 col-sm-offset-2">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

						<h4 class="card-title my-title">Invoice Edit</h4>

                        <form method="post" class="classform form-horizontal" action="<?= base_url('fees/updateinvoice') ?>">
        
                    		<div class="row">

                                <input type="hidden" value="<?= $fee->fee_allocationID  ?>" name="id">

                                <div class="col-md-12">

                                    <div class="form-group label-floating is-empty">

                                        <label class="control-labe">Student Name</label>

                                        <input type="text" value="<?= $this->mylibrary->getStudentParam($fee->studentID,'f_name') ?>" class="form-control up_case" readonly="true">

                                        <input type="hidden" value="<?= $fee->studentID ?>" name="studentID">

                                    </div>

                                </div>


                                <?php
                                    $fee_list = unserialize($fee->fee_value);

                                    foreach ($fee_list as $key => $value) {


                                        echo'
                                            <div class="col-md-12">

                                                <div class="form-group labe-floating is-empty">

                                                    <label class="control-label">'.$this->mylibrary->getFeeListParam($key,'fee_type').'</label>

                                                    <input type="text" value="'.$value.'" name="fee_typeValue[]" class="form-control up_case">

                                                    <input type="hidden" name="fee_listID[]" class="form-control" value="'.$key.'">

                                                </div>

                                            </div>
                                        ';

                                    }
                                ?>



                                <div onclick="setFocus();" class="col-md-12 col-sm-12 mytargetchange">

                                    <select name="concession_type" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Concession(%)">

                                        <?php
                                            foreach ($concession as $value) {
                                                
                                                if ($value->fee_listID == $fee->concession_type) {
                                                    echo'<option value="'.$value->fee_listID.'" selected>'.$value->concession_type.' ('.$value->discount.'%)</option>';
                                                }else{
                                                    echo'<option value="'.$value->fee_listID.'">'.$value->concession_type.' ('.$value->discount.'%)</option>';
                                                }
                                            }
                                        ?>

                                    </select>

                                </div>

                            </div>

		                    <button type="submit" class="btn btn-rose pull-right btn-sm">Upadate</button>

		                </form>

		            </div>

		        </div>

		    </div>

		</div>

	</div>

</div>