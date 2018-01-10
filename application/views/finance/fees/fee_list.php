<div class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-6 col-sm-6">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

                        <h4 class="card-title my-title">Fee List</h4>

                        <div class="toolbar">

                            <!--Here you can write extra buttons/actions for the toolbar              -->

                            <button class="btn btn-md btn-success btn-wd" data-toggle="modal" data-target="#addFeeType"> <i class="material-icons">library_add</i> Add Fee Type</button>

                        </div>

                        <div class="material-datatables">

                            <table id="FeeType" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">

                                <thead class="text-rose">

                                    <tr>    

                                        <th>Fee Type</th>

                                        <th>Fee Description</th>

                                        <th class="disabled-sorting text-center ">Actions</th>

                                    </tr>

                                </thead>
                                    
                                <tfoot>

                                    <tr>

                                        <th>Fee Type</th>

                                        <th>Fee Description</th>

                                        <th class="disabled-sorting text-center ">Actions</th>

                                    </tr>

                                </tfoot>

                                <tbody id="tbody">

                                    <?php foreach ($fees as $fee) : ?>
                                        <tr id="<?= $fee->fee_listID ?>">
                                            <td><?= $fee->fee_type ?></td>
                                            <td><?= $fee->note ?></td>
                                            <td class="text-center td-actions">
                                                <a href="<?= base_url('fees/feeedit/'.base64_encode($fee->fee_listID*169)) ?>">
                                                    <button type='button' class='btn btn-info mybtn'>
                                                        <i class='material-icons'>edit</i>
                                                    </button>
                                                </a>
                                                <button id="<?= $fee->fee_listID?>" cm="fees/deletefee" base="<?=base_url()?>" type="button" class="btn btn-danger mybtn pop">
                                                    <i class="material-icons">close</i>
                                                </button>
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

            <!-- end col-md-6 -->

            <!-- Classic Modal -->

            <div class="modal fade" id="addFeeType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                                <i class="material-icons">clear</i>

                            </button>

                            <h4 class="modal-title"><strong>Add Fee Type</strong></h4>

                        </div>

                        <div class="modal-body">

                            <form class="form-horizontal" action="<?=base_url('fees/addfee')?>" method="post" >

                                <div class="form-group">

                                    <label class="control-label col-sm-3">Fee Type</label>

                                    <div class="col-sm-9">
                                        <input type="text" value="fee" name="type" hidden="true"> 
                                        <input type="text" class="form-control up_case" name="feetype" required="true">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="control-label col-sm-3" for="pwd">Note</label>

                                    <div class="col-sm-9"> 

                                        <input type="text" class="form-control up_case" name="note" required="true">

                                    </div>

                                </div>

                                <div class="form-group"> 

                                    <div class="col-sm-offset-2 col-sm-10">

                                        <button type="submit" class="btn btn-rose pull-right btn-sm">Add Fee</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <!--  End Modal -->

            <div class="col-md-6 col-sm-6">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

                        <h4 class="card-title my-title">Fee Concession</h4>

                        <div class="toolbar">

                            <!--Here you can write extra buttons/actions for the toolbar              -->

                            <button class="btn btn-md btn-success btn-wd" data-toggle="modal" data-target="#addConcessionType"> <i class="material-icons">library_add</i> Add Concession Type</button>

                        </div>

                        <div class="material-datatables">

                            <table id="concession" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">

                                <thead class="text-rose">

                                    <tr>    

                                        <th>Concession Type</th>

                                        <th>Discount (%)</th>

                                        <th class="disabled-sorting text-center ">Actions</th>

                                    </tr>

                                </thead>
                                    
                                <tfoot>

                                    <tr>

                                        <th>Concession Type</th>

                                        <th>Discount (%)</th>

                                        <th class="disabled-sorting text-center ">Actions</th>

                                    </tr>

                                </tfoot>

                                <tbody id="tbody2">

                                    <?php foreach ($concession as $cons) : ?>
                                        <tr id="<?= $cons->fee_listID ?>">
                                            <td><?= $cons->concession_type ?></td>
                                            <td><?= $cons->discount ?></td>
                                            <td class="text-center td-actions">
                                                <a href="<?= base_url('fees/feeedit/'.base64_encode($cons->fee_listID*169)) ?>">
                                                    <button type='button' class='btn btn-info mybtn'>
                                                        <i class='material-icons'>edit</i>
                                                    </button>
                                                </a>
                                                <button id="<?= $cons->fee_listID?>" cm="fees/deletefee" base="<?=base_url()?>" type="button" rel="tooltip" class="btn btn-danger mybtn pop">
                                                    <i class="material-icons">close</i>
                                                </button>
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

            <!-- end col-md-6 -->

            <!-- Classic Modal -->

            <div class="modal fade" id="addConcessionType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                                <i class="material-icons">clear</i>

                            </button>

                            <h4 class="modal-title"><strong>Consession Type</strong></h4>

                        </div>

                        <div class="modal-body">

                            <form class="form-horizontal" action="<?= base_url('fees/addconcession') ?>" method="post" >

                                <div class="form-group">

                                    <label class="control-label col-sm-3">Consession Type</label>

                                    <div class="col-sm-9">

                                        <input type="text" value="concession" name="type" hidden="true"> 

                                        <input type="text" class="form-control up_case" name="concession" required="true">

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="control-label col-sm-3" for="pwd">Discount(%)</label>

                                    <div class="col-sm-9"> 

                                        <input type="text" class="form-control" name="discount" required="true">

                                    </div>

                                </div>

                                <div class="form-group"> 

                                    <div class="col-sm-offset-2 col-sm-10">

                                        <button type="submit" class="btn btn-rose pull-right btn-sm">Add Consession</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <!--  End Modal -->

        </div>

        <!-- end row -->

    </div>

</div>



