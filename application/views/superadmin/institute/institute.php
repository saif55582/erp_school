<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">school</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Institutes</h4>
                        <div class="toolbar">
                            
                        </div>
                        <div class="material-datatables">
                            <table n="teachers" id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>School Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Students</th>
                                        <th>Active</th>                                        
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>School Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Students</th>
                                        <th>Active</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($institutes as $institute) : ?>

                                        <tr id="<?= $institute->instituteID;?>">
                                        <!-- <td>
                                            <?php

                                                if($teacher->photo == 'default.png') {
                                                    echo "<img src='".base_url()."/main_asset/assets/img/default.png' alt='' class='img img-' style='width:50px'>";
                                                }
                                                else {
                                                    echo "<img src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/teacher/".$teacher->photo."' alt='' class='img' style='width:60px'>";
                                                }
                                            ?>                                                
                                        </td> -->

                                        <td><?= strtoupper($institute->school_name) ?></td>
                                        <td><?=$institute->phone?></td>
                                        <td><?=$institute->email?></td>
                                        <td><?=$institute->students?></td>
                                        <td>
                                            <div style="float: left;margin-top:-18px">
                                                <div class="togglebutton">
                                                    <label>
                                                        <input class='institute_active' hash='<?=base64_encode($institute->instituteID)?>' type="checkbox" <?=$institute->active ? 'checked' : '' ?> >
                                                    </label>
                                                </div>
                                            </div>       
                                        </td>
                                        <td class="text-center td-actions">
                                                                                         
                                            <div>
                                                <a href="<?= base_url(); ?>superinstitute/view/<?=base64_encode($institute->instituteID*786786) ?>">
                                                    <button type="button" rel="tooltip" class="btn btn-success">
                                                    <i class="material-icons">launch</i>
                                                    </button>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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

