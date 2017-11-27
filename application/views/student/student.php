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
                                <select name="classesID" id="sec" class="selectpicker" data-style="select-with-transition" title="Select Section">
                                    <option value="">Select Section</option>
                                </select>
                                <?php
                                ?>
                            </div>


                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select name="classesID" onchange="getSection(this.value,'<?=base_url()?>',null);gsbc(this.value,'<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
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
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Reg No</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Reg No</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                    <?php 
                                        
                                        foreach ($students as $student) :
                                    ?>
                                        <tr id="<?= $student->studentID;?>">
                                        <td>
                                            <?php

                                                if($student->photo == 'default.png') {
                                                    echo "<img src='".base_url()."/main_asset/assets/img/default.png' alt='' class='img img-' style='width:50px'>";
                                                }
                                                else {
                                                    echo "<img src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/student/".$student->photo."' alt='' class='img' style='width:60px'>";
                                                }
                                            ?>                                                
                                        </td>
                                        <td><?= strtoupper($student->f_name.' '.$student->l_name) ?></td>
                                        <td><?=$student->roll_no?></td>
                                        <td><?=$student->reg_no?></td>
                                        <td>
                                            <?php
                                                $classesID = $student->classesID;
                                                $where = array(
                                                    'instituteID'=>$this->session->userdata('instituteID'),
                                                    'classesID'=>$classesID
                                                );
                                                $classes = $this->classes_m->get_single_class($where);
                                                echo $classes->class_name;

                                            ?>
                                        </td>
                                        <td>
                                             <?php
                                                $sectionID = $student->sectionID;
                                                $where = array(
                                                    'instituteID'=>$this->session->userdata('instituteID'),
                                                    'sectionID'=>$sectionID
                                                );
                                                $section = $this->section_m->get_single_section($where);
                                                echo $section->section_name;

                                            ?>
                                        </td>
                                        <td class="text-center td-actions">
                                            <a href="<?= base_url(); ?>student/edit/<?=$student->studentID?>">
                                                <button type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                            <button id="<?= $student->studentID ?>" onclick="pop(this.id,'<?=base_url()?>','student/dest')" type="button" rel="tooltip" class="btn btn-danger">
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

