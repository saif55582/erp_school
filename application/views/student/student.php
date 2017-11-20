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

                            <?php

                            ?>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>#</th>
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
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Reg No</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        $index = 1;
                                        
                                        foreach ($students as $student) :
                                    ?>
                                        <tr id="<?= $student->studentID;?>">
                                        <td><?= $index++; ?></td>
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
                                        <td><?=$student->classesID?></td>
                                        <td><?=$student->sectionID?></td>
                                        <td class="text-center td-actions">
                                            <a href="<?= base_url(); ?>student/edit/<?=$student->studentID?>">
                                                <button type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                            <button id="<?= $student->studentID ?>" onclick="del(this.id)" type="button" rel="tooltip" class="btn btn-danger">
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

