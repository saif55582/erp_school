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
                        <form method="post" class="classform form-horizontal">
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    
                                    <div onclick="setFocus();" class="form-group label-floating">
                                        <label class="control-labe">Class: <span class="text-danger">*</span></label>
                                        <select onchange="getSection(this.value,'<?=base_url()?>',null)"  name="classesID"  id="ci" data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
                                            <?php
                                                foreach ($classes as $class) {
                                                    echo"
                                                        <option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                                }
                                            ?>
                                        </select>
                                        <h7 id="classesID_add" class="text-danger"><?= form_error('classesID')?></h7>
                                    </div>

                                    <div onclick="setFocus();" class="form-group label-floating">
                                        <label class="control-labe">Section: <span class="text-danger">*</span></label>
                                        <select onchang="gsa(this.value,'<?=base_url()?>')" name="sectionID"  id="sec"  class="selectpicker" data-style="select-with-transition" title=" ">
                                            <option>Select Section</option>
                                        </select>
                                        <h7 id="classesID_add" class="text-danger"><?= form_error('sectionID')?></h7>
                                    </div>

                                    <div class="form-group label-floating">
                                        <label class="control-labe">Date: <span class="text-danger">*</span></label>
                                        <input type="text" id='d' name="date" class="form-control datepicker"/>
                                        <h7 id="date" class="text-danger"><?= form_error('date')?></h7>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-sm">Attendance</button>     
                                </div>
                                <div class="col-sm-6" id="info" style="">
                                  
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
                                <h3 style="display:one" id="setd"></h3>
                                <thead class="text-rose">
                                    <tr width="100%">    
                                        <th width='15%'>Photo</th>
                                        <th width='13%'>Name</th>
                                        <th width='13%'>Roll</th>
                                        <th width='12%'>Class</th>
                                        <th width='12%'>Section</th>
                                        <th width='40%' class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>