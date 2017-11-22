<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Add Attendance</h4>
                        <form method="post" class="classform form-horizontal" action="#">
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    
                                    <div onclick="setFocus();" class="form-group label-floating">
                                        <label class="control-labe">Class: <span class="text-danger">*</span></label>
                                        <select onchange="getSection(this.value,'<?=base_url()?>',null)"  name="classesID"  id="classesID" data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
                                            <?php
                                                foreach ($classes as $class) {
                                                    echo"
                                                        <option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>"
                                                    ;
                                                }
                                            ?>
                                        </select>
                                        <h7 id="classesID_add" class="text-danger"><?= form_error('classesID')?></h7>
                                    </div>

                                    <div onclick="setFocus();" class="form-group label-floating">
                                        <label class="control-labe">Section: <span class="text-danger">*</span></label>
                                        <select  name="sectionID"  id="sec"  class="selectpicker" data-style="select-with-transition" title=" ">
                                            <option value="">Select Section</option>
                                        </select>
                                        <h7 id="classesID_add" class="text-danger"><?= form_error('sectionID')?></h7>
                                    </div>

                                    <div class="form-group label-floating">
                                        <label class="control-labe">Date: <span class="text-danger">*</span></label>
                                        <input type="text" name="date" class="form-control datepicker"/>
                                        <h7 id="date" class="text-danger"><?= form_error('date')?></h7>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-sm">Attendance</button>     
                                </div>
                                <div class="col-sm-6" id="info" style="">
                                    <div style="background-color: #eceff1; margin: 30px; padding: 30px; text-align: center; border-radius: 9px; box-shadow: 10px 10px 20px -5px #CCC;">
                                        <h4><strong style="color: #b11919;">Attendance Details</strong></h4>
                                        <div class="row">
                                            <div class="col-sm-6 text-info" align="right"><h6><strong>Class : </strong></h6></div>
                                            <div class="col-sm-6" align="left"><h6><i>UKG</i></h6></div>
                                            <div class="col-sm-6 text-info" align="right"><h6><strong>Section : </strong></h6></div>
                                            <div class="col-sm-6" align="left"><h6><i>Sec A</i></h6></div>
                                            <div class="col-sm-6 text-info" align="right"><h6><strong>Day : </strong></h6></div>
                                            <div class="col-sm-6" align="left"><h6><i>Monday</i></h6></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="stud" style="">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Email</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Email</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img style="width:60px;" class="img" src="<?= base_url('main_asset/assets/img/default.png'); ?>">
                                        </td>
                                        <td>Rahul</td>
                                        <td>4</td>
                                        <td>rahul@gmail.com</td>
                                        <td>
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn btn-round btn-default" id="present">Present</button>
                                                <button type="button" class="btn btn-round btn-default" id="absent">Absent</button>
                                                <button type="button" class="btn btn-round btn-default" id="leave">Leave</button>
                                            </div>
                                        </td>
                                    </tr>                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>