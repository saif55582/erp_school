<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">create</i>
                    </div>
                    <div class="card-content" id="academic_edit_form">
                        <h4 class="card-title my-title">Create Academic Year</h4>
                        <form method="post" id="ac_form" action="<?=base_url()?>administrator/academic_year">
                            <div class="form-group label-floating">
                                <label class="control-labe">Name</label>
                                <input type="text" name="name" class="form-control " required>
                                <span class="text-danger" id="err_name"></span>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-labe">Start Date</label>
                                <input type="text" name="start" class="form-control datepicker" required>
                                <span class="text-danger" id="err_start"></span>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-labe">End Date</label>
                                <input type="text" name="end" class="form-control datepicker" required>
                                <input type="hidden" id="base" value="<?=base_url()?>" >
                                <span class="text-danger" id="err_end"></span>
                            </div>
                            <button type="submit" name='add' class="btn btn-fill btn-rose btn-sm">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Academic Years</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose" style="font-size:12px;">
                                    <tr>    
                                        <th>Academic Year</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th class="disabled-sorting text-center ">Active</th>
                                        <th class="disabled-sorting text-center ">Delete</th>
                                    </tr>
                                </thead>
                                <tfoot style="font-size:12px;">
                                    <tr>
                                        <th>Academic Year</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th class="text-center">Active</th>
                                        <th class="disabled-sorting text-center ">Delete</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody_academics_year">
                                    <?php
                                    $where = array(
                                        'instituteID'=>$this->session->userdata('instituteID')
                                    );

                                    $academic_year = $this->academic_year_m->get_academic_year_where($where);
                                    $institute = $this->institute_m->get_institute($this->session->userdata('instituteID'));
                                    $academic_yearID =  $institute->academic_yearID;
                                    foreach($academic_year as $year) : ?>
                                        <tr id="<?=$year->academic_yearID?>">
                                            <td><?=$year->name?></td>
                                            <td><?=$year->start?></td>
                                            <td><?=$year->end?></td>
                                            <td class="text-center td-actions">
                                               <div class="radio">
                                                    <label>
                                                        <?php
                                                        if($academic_yearID == $year->academic_yearID)
                                                            echo "<input type='radio' base='".base_url()."' id='a' name='ac_status' value='".$year->academic_yearID."'  checked='true'>";
                                                        else
                                                           echo "<input type='radio' base='".base_url()."' id='a' name='ac_status' value='".$year->academic_yearID."'>";
                                                        ?>
                                                        
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center td-actions" id='aci_body'>
                                                <button onclick="pop(this.id,'<?=base_url()?>','administrator/ay_dest')" id="<?=$year->academic_yearID?>" type="button" rel="tooltip" class="btn btn-danger">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php 
                                    endforeach; ?>
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