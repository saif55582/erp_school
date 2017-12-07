<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Fee List</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <a href="<?= base_url('fees/add')?>">
                                <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Fees</button>
                            </a>
    
                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select id="get_rows" base="<?=base_url()?>" act="fees/rows" name="classesID" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                     <?php
                                        foreach ($classes as $class) {
                                            echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";                                      
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>Fee Name</th>
                                        <th>Fee Description</th>
                                        <th>Amount</th>
                                        <th>Fee Type</th>
                                        <th>Class</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Fee Name</th>
                                        <th>Fee Description</th>
                                        <th>Amount</th>
                                        <th>Fee Type</th>
                                        <th>Class</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                    <?php
                                    foreach ($fees as $fee):
                                    ?>
                                    <tr id="<?= $fee->fee_listID ?>" >
                                        <td><?= $fee->fee_name ?></td>
                                        <td><?= ($fee->fee_desc !="" ? $fee->fee_desc : '-----') ?></td>
                                        <td><?= $fee->amount ?></td>
                                        <td>
                                            <?php
                                                switch($fee->fee_type) {
                                                    case 1:
                                                        echo 'Annual';
                                                        break;
                                                    case 2:
                                                        echo 'Bi-Annual';
                                                        break;
                                                    case 3:
                                                        echo 'Tri-Annual';
                                                        break;
                                                    case 4:
                                                        echo 'Quarterly';
                                                        beak;
                                                    case 5:
                                                        echo 'Monthly';
                                                        break;
                                                    case 6:
                                                        echo 'One Time';
                                                        break;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                             <?php
                                                echo $this->mylibrary->getClassName($fee->classesID);
                                            ?>
                                        </td>
                                        <td class="text-center td-actions">
                                            <!-- <a href='<?=base_url()?>fees/edit/<?=base64_encode($fee->fee_listID)?>'>
                                                <button type='button' rel='tooltip' class='btn btn-info mybtn'>
                                                <i class='material-icons'>edit</i>
                                                </button>
                                            </a> -->
                                            <button id="<?= $fee->fee_listID?>" cm="fees/dest" base="<?=base_url()?>" type="button" rel="tooltip" class="btn btn-danger mybtn pop">
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

