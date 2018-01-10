<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">



                <div class="card">



                    <div class="card-header card-header-icon" data-background-color="rose">



                        <i class="material-icons">assignment</i>



                    </div>



                    <div class="card-content">



						<h4 class="card-title my-title">Fine Category</h4>



                        <ul class="nav nav-pills nav-pills-rose">

                            <li class="active">

                                <a href="#addd_fine" data-toggle="tab">₹ Add Fine</a>

                            </li>

                            <li>

                                <a href="#fine_list" data-toggle="tab">
                                    Fine List
                                </a>

                            </li>

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="addd_fine">

                                <form method="post" class="classform form-horizontal" action="<?= base_url('fees/fine'); ?>">

                                    <div class="row">

                                        <div onclick="setFocus()" class="col-md-4 col-sm-4 mytargetchange">

                                            <select name="fee_listID" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Fee Category" required="true">

                                                <?php

                                                    foreach ($fee_list as $key) {

                                                            echo "<option value='".$key->fee_listID."'>".$key->fee_type."</option>";

                                                    }

                                                ?>

                                            </select>

                                        </div>

                                        <div onclick="setFocus()" class="col-md-4 col-sm-4 mytargetchange">
                
                                            <select name="classesID[]" id="class" onchange="getStudentOption(this.value,'<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required="true" multiple="true">

                                                <?php

                                                    foreach($class_list as $class):

                                                            echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";

                                                    endforeach;

                                                ?>

                                            </select>

                                        </div>


                                        <div class="col-md-4 col-sm-4" style="padding-top: 10px;">

                                            <div class="form-group label-floating is-empty">

                                                <label class="control-label">Fine Amount</label>

                                                <input type="text" name="amount" class="form-control" value="" required="true">

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-sm-4 mytargetchange">

                                            <select name="fine_type" id="fine_type" class="selectpicker" data-style="select-with-transition" title="Select Fine Type" required="true">

                                                <option value="Fixed">Fixed</option>

                                                <option value="Incremental">Incremental</option>

                                            </select>

                                        </div>

                                        <div id="incremented" class="col-md-4 col-sm-4 mytargetchange" style="display: none;">

                                            <select name="incrementby" class="selectpicker" data-style="select-with-transition" title="Fine Increment in">

                                                <option value="Monthly">Monthly</option>

                                                <option value="Per Day">Per Day</option>

                                            </select>

                                        </div>

                                        <div class="col-md-4 col-sm-4" style="padding-top: 10px;">

                                            <div class="form-group label-floating is-empty">

                                                <label class="control-label">Fine Start From</label>

                                                <input type="text" name="fsf" class="form-control datepicker"/>

                                            </div>

                                        </div>

                                    </div>

                                    <button class="btn btn-rose btn-sm pull-right" type="submit">Submit</button>

                                </form>

                            </div>

                            <div class="tab-pane" id="fine_list">

                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr class="text-info">
                                                <th>Fee Category</th>
                                                <th>Class</th>
                                                <th>Fine Amount</th>
                                                <th>Fine Type</th>
                                                <th>Start From</th>
                                                <th class="disabled-sorting text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Fee Category</th>
                                                <th>Class</th>
                                                <th>Fine Amount</th>
                                                <th>Fine Type</th>
                                                <th>Start From</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                foreach ($fee_fine as $fine) { 
                                                    $classes = unserialize($fine->classesID);
                                            ?>
                                            
                                                <tr id="<?= $fine->fee_fineID?>">
                                                    <td><?= $this->mylibrary->getFeeParam($fine->fee_listID, 'fee_type') ?></td>
                                                    <td class="text-right">
                                                        <?php
                                                            for ($i=0; $i < count($classes); $i++) { 
                                                                echo $this->mylibrary->getClassName(
                                                                    base64_decode($classes[$i])
                                                                );
                                                                if($i < count($classes) - 1) echo'-';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-center"><?= $fine->amount ?></td>
                                                    <td><?php
                                                        if($fine->fine_type == 'Fixed')
                                                            echo $fine->fine_type;
                                                        else
                                                            echo $fine->fine_type." (".$fine->incrementby.")";
                                                    ?></td>
                                                    <td><?= date('d-M-Y',strtotime($fine->fsf)) ?></td>
                                                    <td class="text-right">
                                                        <a href="<?= base_url('fees/fineedit/'.base64_encode($fine->fee_fineID*169)) ?>">
                                                            <button type='button' class='btn btn-info mybtn'>
                                                                <i class='material-icons'>edit</i>
                                                            </button>
                                                        </a>
                                                        <!-- <button id="<?= $fine->fee_fineID?>" cm="fees/delete_fee_fine" base="<?=base_url()?>" type="button" class="btn btn-danger mybtn pop">
                                                        
                                                            <i class="material-icons">close</i>
                                                        
                                                        </button> -->
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


		            </div>



		        </div>



		    </div>

		    

		</div>



	</div>



</div>



