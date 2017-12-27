<div class="content">

    <div class="container-fluid">

        <div class="row">



            <div class="col-md-12">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

                        <h4 class="card-title my-title">invoice</h4>

                        <div class="toolbar">

                            <!--Here you can write extra buttons/actions for the toolbar              -->

                            <a href="<?= base_url('fees/addinvoice')?>">

                                <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Invoice</button>

                            </a>

                        </div>



                        <div class="col-md-12" style="background-color: #eee; border-radius: 5px; border: solid 1px #b11919;">

                            <div class="row">

                                <form method="post" action="<?= base_url('fees/invoice'); ?>" autocomplete="off">

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

                                        <select name="month" id="class" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Month">

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

                                            <option value=""></option>

                                        </select>

                                    </div>

                                    <button name="submit" type="submit" class="btn btn-rose pull-right btn-sm" style="margin-right: 20px;">
                                        <i class="material-icons">search</i> Search
                                    </button>

                                </form>

                            </div>

                        </div>



                        <div class="col-md-12">

                            <div class="material-datatables">

                                <table class="table table-striped table-hover" width="100%" style="width:100%">

                                    <thead class="text-rose">

                                        <tr>    

                                            <th>Student</th>

                                            <th>Class</th>

                                            <th>Roll No</th>

                                            <th>Amount</th>

                                            <th>Pay Status</th>

                                            <th class="disabled-sorting text-center ">Actions</th>

                                        </tr>

                                    </thead>

                                    <tfoot>

                                        <tr>

                                            <th>Student</th>

                                            <th>Class</th>

                                            <th>Roll No</th>

                                            <th>Amount</th>

                                            <th>Pay Status</th>

                                            <th class="disabled-sorting text-center ">Actions</th>

                                        </tr>

                                    </tfoot>

                                    <tbody id="tbody">
                                    <?php if($number){ ?>
                                        <?php foreach($student as $stud ) : ?>

                                            <td>
                                                <?= $this->mylibrary->getStudentParam($stud->studentID,'f_name') ?>
                                                <?= $this->mylibrary->getStudentParam($stud->studentID,'l_name') ?>
                                            </td>
                                            <td><?= $this->mylibrary->getClassName($stud->classesID) ?></td>
                                            <td><?= $this->mylibrary->getStudentParam($stud->studentID,'roll_no') ?></td>
                                            <td><?= $stud->total ?></td>
                                            <td>
                                                <?php
                                                    if($stud->pay_money == 0)
                                                        echo'<button class="btn btn-danger btn-sm">Not Paid</button>';
                                                    elseif($stud->pay_money < $stud->total)
                                                        echo'<button class="btn btn-warning btn-sm">Partially Paid</button>';
                                                    else
                                                        echo '<button class="btn btn-info btn-sm">Paid</button>';
                                                ?>
                                            </td>
                                            <td align="center">

                                                <a href="<?= base_url(); ?>fees/view/<?= base64_encode($stud->fee_allocationID*169) ?>">

                                                    <button class="btn btn-success mybtn">
                                                        <i class="material-icons">visibility</i>
                                                    </button>

                                                </a>

                                                <a href="<?= base_url(); ?>fees/editinvoice/<?= base64_encode($stud->fee_allocationID*169) ?>">

                                                    <button type="button" class="btn btn-info mybtn"><i class="material-icons">border_color</i></button>

                                                </a>

                                                <button id="" cm="" base="" type="button" class="btn btn-danger mybtn pop"><i class="material-icons">close</i></button>

                                            </td>
                                        <?php endforeach; ?>
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