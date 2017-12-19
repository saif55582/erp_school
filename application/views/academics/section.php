<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Section</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <button onclick="clear_form()" data-toggle="modal" data-target="#myModal" class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Section</button>
    
                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select onchange="selectClass(this.value)" name="classesID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                    <?php
                                    
                                        $classesID = $this->session->flashdata('classesID');
                                        foreach($classes as $class):
                                            if($class->classesID == $classesID) {
                                                echo "<option selected value='".$class->classesID."'>".strtoupper($class->class_name)."</option>";
                                            }
                                            else {
                                                echo "<option value='".$class->classesID."'>".strtoupper($class->class_name)."</option>";
                                            }
                                        endforeach;

                                    ?>
                                </select>
                                <?php
                                ?>
                            </div>

                        </div>
                        <div class="material-datatables">
                            <table n='section' id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>Section Name</th>
                                        <th>Teacher Name</th>
                                        <th>Max Students</th>
                                        <th>Note</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Section Name</th>
                                        <th>Teacher Name</th>
                                        <th>Max Students</th>
                                        <th>Note</th>
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
                <h4 class="modal-title my-title">Add Section</h4>
            </div>
            <div class="modal-body">
               <form method="post" class="classform form-horizontal" action="<?=base_url('section/insertSection')?>">
                    <div class="form-group label-floating">
                        <label class="label-on-left">Section Name: <span class="text-danger">*</span></label>
                        <input value="<?php echo isset($section_name) ? $section_name : ''?>" type="text" class="form-control up_case" name="section_name" id="section_name" >
                        <h7 id="section_name_add" class="text-danger"><?= form_error('section_name')?></h7>
                    </div>

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
                        <label class="control-labe">Max Students: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control up_case" name="max_student">
                        <h7 id="max_student_add" class="text-danger"><?= form_error('max_student')?></h7>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-labe">Note: </label>
                        <input type="text" class="form-control up_case" name="note">
                        <h7 class="text-danger"><?= form_error('note')?></h7>
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

<!-- Classic Modal -->
<div data-keyboard="false" data-backdrop="static" class="modal" id="supportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="set_loader('supportModal','<?=base_url()?>');" aria-hidden="true">
                    <i  class="material-icons">clear</i>
                </button>
                <h4 class="modal-title my-title">Edit Section</h4>
                <center><h7 id="validation_errors" class='text-danger'></h7></center>
            </div>
            <div class="modal-body" id="modal-body">
             <center><div id='load'><img class="img img-responsive" src='<?=base_url()?>main_asset/assets/img/load.gif'></div></center>
            </div>
            <div class="modal-footer">
               <!--  <button type="button" class="btn btn-success btn-sm btn-wd">Add</button>
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button> -->
              </div>
        </div>
    </div>
</div>
<!--  End Modal -->