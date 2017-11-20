<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Classes</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <button onclick="clearForm();" data-toggle="modal" data-target="#myModal" class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Class</button>
                            <?php

                            ?>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Class Incharge </th>
                                        <th>Max Students</th>
                                        <th>Note</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Class Incharge</th>
                                        <th>Max Students</th>
                                        <th>Note</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        $index = 1;
                                        foreach ($classes as $class) :
                                    ?>
                                        <tr id="<?= $class->classesID;?>">
                                        <td><?= $index++; ?></td>
                                        <td><?= strtoupper($class->class_name) ?></td>
                                        <td>
                                            <?php
                                                $teacher = $this->teacher_m->get_teacher_by_id($class->teacherID);
                                                if(count($teacher)==1) {
                                                    echo strtoupper($teacher->name);
                                                }
                                                else
                                                    echo '----';
                                            ?>    
                                        </td>
                                        <td><?=$class->max_student?></td>
                                        <td><?php echo isset($class->note) ? $class->note : '---'?></td>
                                        <td class="text-center td-actions">
                                            <button onclick="edit_class(<?=$class->classesID?>);" data-toggle="modal" data-target="#supportModal" type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button id="<?= $class->classesID ?>" onclick="del(this.id)" type="button" rel="tooltip" class="btn btn-danger">
                                                <i class="material-icons">close</i>
                                            </button>
                                            
                                        </td>
                                    </tr>
                                    <?php 
                                        endforeach;
                                    ?>
                                    
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
                <h4 class="modal-title my-title">Add Class</h4>
            </div>
            <div class="modal-body">
                
               <form method="post" class="classform form-horizontal" action="<?=base_url('classes/addClass')?>">
                    <div class="form-group label-floating">
                        <label class="label-on-left">Class Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control up_case" name="class_name" >
                        <h7 id="class_name" class="text-danger"><?= form_error('class_name')?></h7>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-labe">Class Incharge: </label>
                        <select name="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" ">
                            <option value="">---</option>
                            <?php
                            foreach ($teachers as $teacher) {
                                echo "<option value='".$teacher->teacherID."'>".$teacher->name." (".$teacher->teacherID.")</option>";
                            }
                            ?>
                        </select>
                        <h7 class="text-danger"><?= form_error('teacherID')?></h7>
                    </div>     

                    <div class="form-group label-floating">
                        <label class="control-labe">Max Students: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control up_case" name="max_student">
                        <h7 id="max_student" class="text-danger"><?= form_error('max_student')?></h7>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-labe">Note: </label>
                        <input type="text" class="form-control up_case" name="note">
                        <h7 id="note class="text-danger"><?= form_error('note')?></h7>
                    </div>
                    <button type="submit" id="subbtn" class="btn btn-success btn-sm">Add</button>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i onclick="set_loader('supportModal','<?=base_url()?>');" class="material-icons">clear</i>
                </button>
                <h4 class="modal-title my-title">Edit Class</h4>
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