<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Subject</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <a href="<?= base_url('Subject/add')?>">
                                <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Subject</button>
                            </a>
    
                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select onchange="selectClass(this.value)" name="classesID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                </select>
                            </div>

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>#</th>
                                        <th>Subject Name</th>
                                        <th>Subject Author</th>
                                        <th>Subject Code</th>
                                        <th>Teacher</th>
                                        <th>Pass Mark</th>
                                        <th>Final Mark</th>
                                        <th>Type</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject Name</th>
                                        <th>Subject Author</th>
                                        <th>Subject Code</th>
                                        <th>Teacher</th>
                                        <th>Pass Mark</th>
                                        <th>Final Mark</th>
                                        <th>Type</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>


<!-- Classic Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title my-title">Add Subject</h4>
            </div>
            <div class="modal-body">
               <form method="post" class="classform form-horizontal" action="#">
                    
                    <div onclick="setFocus();" class="form-group label-floating">
                        <label class="control-labe">Class: <span class="text-danger">*</span></label>
                        <select  name="classesID"  id="classesID" data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
                            <?php
                            foreach ($classes as $class) {
                                echo "<option value='".$class->classesID."'>".strtoupper($class->class_name)."</option>";
                            }
                            ?>
                        </select>
                        <h7 id="classesID_add" class="text-danger"><?= form_error('classesID')?></h7>
                    </div>    
    
                    <div class="form-group label-floating">
                        <label class="control-labe">Teacher: <span class="text-danger">*</span></label>
                        <select name="teacherID" id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
                            <?php
                            foreach ($teachers as $teacher) {
                                echo "<option value='".$teacher->teacherID."'>".strtoupper($teacher->name)." (".$teacher->teacherID.")</option>";
                            }
                            ?>
                        </select>
                        <h7 id="teacherID_add" class="text-danger"><?= form_error('teacherID')?></h7>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-labe">Type: <span class="text-danger">*</span></label>
                        <select name="submit_type" id="submit_type"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
                            <option value="Optional">Optional</option>
                            <option value="Mandatory">Mandatory</option>
                        </select>
                        <h7 id="teacherID_add" class="text-danger"><?= form_error('submit_type')?></h7>
                    </div>     

                    <div class="form-group label-floating">
                        <label class="control-labe">Pass Marks: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control up_case" name="pass_marks">
                        <h7 id="max_student_add" class="text-danger"><?= form_error('pass_marks')?></h7>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-labe">Final Marks: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control up_case" name="final_marks">
                        <h7 id="max_student_add" class="text-danger"><?= form_error('final_marks')?></h7>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-labe">Subject Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control up_case" name="subject_name">
                        <h7 id="max_student_add" class="text-danger"><?= form_error('subject_name')?></h7>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-labe">Subject Code: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control up_case" name="subjrct_code">
                        <h7 id="max_student_add" class="text-danger"><?= form_error('subjrct_code')?></h7>
                    </div>
                    
                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                </form>
            </div>
            <div class="modal-footer">
               <!--  <button type="button" class="btn btn-success btn-sm btn-wd">Add</button>
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button> -->
              </div>
        </div>
    </div>
</div>
<!--  End Modal -->
