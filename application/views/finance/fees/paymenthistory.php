<div class="content">

    <div class="container-fluid">

        <div class="row">



            <div class="col-md-12">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

                        <h4 class="card-title my-title">Payment History</h4>

                        <div class="toolbar">

                            <!--Here you can write extra buttons/actions for the toolbar              -->

                        </div>



                        <div class="col-md-12" style="margin-bottom: 10px; margin-top: 10px; background-color: #eee; border-radius: 5px; border: solid 1px #b11919;">

                            <div class="row">

                                <form method="post" action="<?= base_url('fees/paymenthistory'); ?>" autocomplete="off">

                                    <div onclick="setFocus()" class="col-sm-3 mytargetchange">
                                        <select name="classesID" id="class" onchange="getStudentOption(this.value,'<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                            <?php
                                            
                                                foreach($classes as $class):
                                                        echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                                endforeach;

                                            ?>
                                        </select>
                                    </div>

                                    <div onclick="setFocus()" class="col-sm-3 mytargetchange">
                                        <select name="studentID" id="stud" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Student">
                                            
                                        </select>
                                    </div>

                                    <div onclick="setFocus();" class="col-md-3 col-sm-3 mytargetchange">

                                        <select name="month" id="class" class="selectpicker" data-style="select-with-transition" title="Select Month">

                                            <option value="JAN">JAN</option>

                                            <option value="FEB">FEB</option>

                                            <option value="MAR">MAR</option>

                                            <option value="APR">APR</option>

                                            <option value="MAY">MAY</option>

                                            <option value="JUN">JUN</option>

                                            <option value="JUL">JUL</option>

                                            <option value="AUG">AUG</option>

                                            <option value="SEP">SEP</option>

                                            <option value="OCT">OCT</option>

                                            <option value="NOV">NOV</option>

                                            <option value="DEC">DEC</option>

                                            

                                        </select>

                                    </div>

                                    <button name="submit" type="submit" class="btn btn-rose pull-right btn-sm" style="margin-right: 20px;">
                                        <i class="material-icons">search</i> Search
                                    </button>

                                </form>

                            </div>

                        </div>

                        <?php if ($number && $student) { ?>
                                
                                <div class="col-sm-6 col-md-6" style="padding: 10px; margin-bottom: 10px; margin-top: 10px; background-color: #eee; border-radius: 5px; border: solid 1px #b11919;">
                                <div class="col-sm-6"><strong>Student</strong></div>
                                <div class="col-sm-6 text-info">
                                    <strong> 
                                        <?= $this->mylibrary->getStudentParam($student->studentID,'f_name') ?>
                                        <?= $this->mylibrary->getStudentParam($student->studentID,'l_name') ?>
                                    </strong>
                                </div>
                                <div class="col-sm-6"><strong>Class</strong></div>
                                <div class="col-sm-6 text-info">
                                    <strong>
                                        <?= $this->mylibrary->getClassName($student->classesID) ?>
                                    </strong>
                                </div>
                                <div class="col-sm-6"><strong>Section</strong></div>
                                <div class="col-sm-6 text-info">
                                    <strong>
                                        <?= $this->mylibrary->getSectionName($student->sectionID) ?>
                                    </strong>
                                </div>
                                <div class="col-sm-6"><strong>Roll No.</strong></div>
                                <div class="col-sm-6 text-info">
                                    <strong>
                                        <?= $this->mylibrary->getStudentParam($student->studentID,'roll_no') ?>
                                    </strong>
                                </div>
                                <div class="col-sm-6"><strong>Month</strong></div>
                                <div class="col-sm-6 text-info">
                                    <strong>
                                        <?= $student->month ?>
                                    </strong>
                                </div>
                            </div>
                            
                        <?php } ?>

                        <div class="col-md-6 col-sm-6">

                            <div class="material-datatables">

                                <table class="table table-striped table-hover" width="100%" style="width:100%">

                                    <thead class="text-rose">

                                        <tr>    
                                            <th>Amount</th>

                                            <th>Date</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tfoot>

                                        <tr>
                                            <th>Amount</th>

                                            <th>Date</th>

                                            <th>Action</th>

                                        </tr>

                                    </tfoot>

                                    <tbody id="tbody">
                                        <?php 
                                            if($number && $student) { 
                                                $pay_details = unserialize($student->pay_details); 
                                                if($pay_details != ''){    
                                                    foreach ($pay_details as $payment) { 
                                                        foreach($payment as $date => $amount) { ?>
                      
                                                        <tr>
                                                            <td>₹ <?= $amount ?></td>
                                                            <td><?= date('d-M-y', strtotime($date)) ?></td>
                                                            <td>
                                                                <a href="">

                                                                    <button type="button" class="btn btn-info mybtn"><i class="material-icons">receipt</i></button>

                                                                </a>
                                                            </td>
                                                        </tr>
                                                
                                        <?php }  } } }?>
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