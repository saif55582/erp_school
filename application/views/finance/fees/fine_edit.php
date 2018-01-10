<div  class="content">



    <div class="container-fluid">



        <div class="row">



            <div class="col-sm-12">



                <div class="card">



                    <div class="card-header card-header-icon" data-background-color="rose">



                        <i class="material-icons">assignment</i>



                    </div>



                    <div class="card-content">



						<h4 class="card-title my-title">Update Fine</h4>

                        <div class="row">
                            
                            <div class="col-sm-12">
                                
                                <form method="post" class="classform form-horizontal" action="">

                                    <div class="row">

                                        <div onclick="setFocus()" class="col-md-4 col-sm-4 mytargetchange">

                                            <select name="fee_listID" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Fee Category" required="true">

                                                <?php

                                                    foreach ($fee_list as $key) {

                                                        if ($key->fee_listID == $fine->fee_listID) {
                                                            
                                                            echo '<option selected="true" value="'.$key->fee_listID.'">'.$key->fee_type.'</option>';
                                                        }else{

                                                            echo '<option value="'.$key->fee_listID.'">'.$key->fee_type.'</option>';
                                                        }
                                                        

                                                    }

                                                ?>

                                            </select>

                                        </div>

                                        <div onclick="setFocus()" class="col-md-4 col-sm-4 mytargetchange">

                                            <select name="classesID[]" id="class" onchange="getStudentOption(this.value,'<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required="true" multiple="true">

                                                <?php
                                                    $fee_class = unserialize($fine->classesID);
                                                    $j = 0;
                                                    foreach($class_list as $class):

                                                        for ($i=0; $i < count($fee_class); $i++) { 
                                                            
                                                            if ($class->classesID == base64_decode($fee_class[$i])) {

                                                                echo '<option selected="true" value="'.base64_encode($class->classesID).'">'.strtoupper($class->class_name).'</option>';

                                                                $j=1; break;

                                                            }else{
                                                                $j = 0;
                                                            }
                                                        }
                                                        if (!$j) {
                                                            echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                                        }

                                                    endforeach;

                                                ?>

                                            </select>

                                        </div>


                                        <div class="col-md-4 col-sm-4" style="padding-top: 10px;">

                                            <div class="form-group label-floating is-empty">

                                                <label class="control-label">Fine Amount</label>

                                                <input type="text" name="amount" class="form-control" value="<?= $fine->amount ?>" required="true">

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-4 mytargetchange">

                                            <select name="fine_type" id="fine_type" class="selectpicker" data-style="select-with-transition" title="Select Fine Type" required="true">

                                                <?php
                                                    if ($fine->fine_type == 'Fixed') {
                                                        echo'<option selected="true" value="Fixed">Fixed</option>';
                                                        echo'<option value="Incremental">Incremental</option>';
                                                    }else{
                                                        echo'<option value="Fixed">Fixed</option>';
                                                        echo'<option selected="true" value="Incremental">Incremental</option>';
                                                    }
                                                ?>

                                            </select>

                                        </div>

                                        <div id="incremented" class="col-md-4 col-sm-4 mytargetchange" style="display: none;">

                                            <select name="incrementby" class="selectpicker" data-style="select-with-transition" title="Fine Increment in">
                                                
                                                <?php
                                                    echo'<option value="Monthly">Monthly</option>';
                                                    echo'<option selected="true" value="Per Day">Per Day</option>';
                                                ?>

                                            </select>

                                        </div>

                                        <div class="col-md-4 col-sm-4" style="padding-top: 10px;">

                                            <div class="form-group label-floating is-empty">

                                                <label class="control-label">Fine Start From</label>

                                                <input value="<?= $fine->fsf ?>" type="text" name="fsf" class="form-control datepicker"/>

                                            </div>

                                        </div>

                                    </div>

                                    <button class="btn btn-rose btn-sm pull-right" type="submit">Update</button>

                                </form>

                            </div>


                        </div>

					</div>


				</div>


			</div>



		</div>



	</div>



</div>