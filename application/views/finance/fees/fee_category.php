<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Students</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <a href="<?= base_url(); ?>student/add" <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Students</button></a>

                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select name="classesID" id="sec" onchange="getStudent($('#class').val(),this.value,'<?=base_url()?>');" class="selectpicker" data-style="select-with-transition" title="Select Section">
                                    <option value="">Select Section</option>
                                </select>
                                <?php
                                ?>
                            </div>


                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select name="classesID" id="class" onchange="getSection(this.value,'<?=base_url()?>',null);getStudent(this.value,null,'<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                    <?php
                                    
                                        foreach($classes as $class):
                                                echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                        endforeach;

                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Amount</th>
                                        <th>Fee Type</th>
                                        <th>Date</th>
                                        <th>Receipt Prefix</th>
                                        <th>Description</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Amount</th>
                                        <th>Fee Type</th>
                                        <th>Date</th>
                                        <th>Receipt Prefix</th>
                                        <th>Description</th>
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

