<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Student Attendance</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <a href="<?= base_url('attendance/student/add')?>">
                                <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add/Edit Attendance</button>
                            </a>
                            <div class="col-md-2" style="float:right;margin-top:11px">
                                <button base="<?=base_url()?>" id="fetch_attendance" class="btn btn-sm btn-rose">Fetch</button>
                            </div>

                            <div class="col-md-2" style="float:right;">
                                <input id="setd" type="text" class="form-control datepicker" placeholder="Select Date">
                            </div>

                            <div onclick="setFocus();" class="col-md-2 mytargetchange" style="float:right;margin-top:11px">
                                <select name="classesID" id="sec" class="selectpicker" data-style="select-with-transition" title="Select Section">
                                    <option value="">Select Section</option>
                                </select>
                            </div>

                            <div onclick="setFocus();" class="col-md-2 mytargetchange" style="float:right;margin-top:11px">
                                <div id="setd"></div>
                                <select name="classesID" id="class" onchange="getSection(this.value,'<?=base_url()?>',null);" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                    <?php
                                    
                                        foreach($classes as $class):
                                                echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                        endforeach;

                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="material-datatables">
                            <table n='student_attendance_day' id="datatable" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr width="100%">    
                                        <th width='15%'>Photo</th>
                                        <th width='13%'>Name</th>
                                        <th width='13%'>Roll</th>
                                        <th width='12%'>Class</th>
                                        <th width='12%'>Section</th>
                                        <th width='40%' class="disabled-sorting text-center ">Attendance</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th class="text-center">Attendance</th>
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