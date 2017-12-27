<div class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">assignment</i>

                    </div>

                    <div class="card-content">

                        <h4 class="card-title my-title">Edit List</h4>

                        <form method="post" class="classform form-horizontal" action="<?= base_url('fees/feeedit/'.base64_encode($listID->fee_listID*169)) ?>">
        
                            <div class="row">

                                <?php if(($listID->type) == 'concession'){ ?>

                                    <div class="col-md-6 col-sm-6">

                                        <div class="form-group label-floating is-empty">

                                            <label class="control-labe">Concession Type</label>

                                            <input type="text" name="concession_type" value="<?= $listID->concession_type ?>" class="form-control up_case">

                                        </div>

                                    </div>
                                    <div class="col-md-6 col-sm-6">

                                        <div class="form-group label-floating is-empty">

                                            <label class="control-labe">Discount (%)</label>

                                            <input type="text" name="discount" value="<?= $listID->discount ?>" class="form-control up_case">

                                        </div>

                                    </div>

                                <?php } else { ?>

                                    <div class="col-md-6 col-sm-6">

                                        <div class="form-group label-floating is-empty">
                                    
                                            <label class="control-labe">Fee Type</label>
                                    
                                            <input type="text" name="fee_type" value="<?= $listID->fee_type ?>" class="form-control up_case">

                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-6">

                                        <div class="form-group label-floating is-empty">
                                    
                                            <label class="control-labe">Note</label>
                                    
                                            <input type="text" name="note" value="<?= $listID->note ?>" class="form-control up_case">

                                        </div>

                                    </div>

                                <?php } ?>

                            </div>

                            <button class="btn btn-rose btn-sm pull-right" type="submit">Submit</button>

                        </form>


                    </div>

                    <!-- end content-->

                </div>

                <!--  end card  -->

            </div>

            <!-- end col-md-6 -->
        </div>
    </div>
</div>