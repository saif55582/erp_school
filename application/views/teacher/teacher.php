<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Teachers</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <a href="<?= base_url(); ?>teacher/add" <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Teacher</button></a>

                            <?php

                            ?>
                        </div>
                        <div class="material-datatables">
                            <table n="teachers" id="datatables" class="mytable table table-striped table-no-bordered table-hover export" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        
                                        foreach ($teachers as $teacher) :
                                    ?>
                                        <tr id="<?= $teacher->teacherID;?>">
                                        <td>
                                            <?php

                                                if($teacher->photo == 'default.png') {
                                                    echo "<img src='".base_url()."/main_asset/assets/img/default.png' alt='' class='img img-' style='width:50px'>";
                                                }
                                                else {
                                                    echo "<img src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/teacher/".$teacher->photo."' alt='' class='img' style='width:60px'>";
                                                }
                                            ?>                                                
                                        </td>
                                        <td><?= strtoupper($teacher->name) ?></td>
                                        <td><?=$teacher->email?></td>
                                        <td><?=$teacher->phone?></td>
                                        <td><?= $teacher->username ?></td>
                                        <td>
                                            <?=$teacher->slug?>
                                        </td>
                                        <td class="text-center td-actions">
                                            <a href="<?= base_url(); ?>teacher/view/<?=base64_encode($teacher->teacherID*786786)?>">
                                                <button type="button" rel="tooltip" class="btn btn-success">
                                                <i class="material-icons">open_in_new</i>
                                                </button>
                                            </a>
                                            <a href="<?= base_url(); ?>teacher/edit/<?=$teacher->teacherID?>">
                                                <button type="button" rel="tooltip" class="btn btn-info">
                                                <i class="material-icons">edit</i>
                                                </button>
                                            </a>
                                            <button id="<?= $teacher->teacherID ?>" onclick="del(this.id)" type="button" rel="tooltip" class="btn btn-danger">
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

