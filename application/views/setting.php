<!doctype html>
<html lang="en">

<head>
    <title>General Setting</title>
    <?php include 'head.php' ?>
    <?php
        print_r($institute_details);
    ?>
</head>

<body>
    
    <div class="content">
        <div class="container-fluid">
            <div class="collapse navbar-collapse nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
                    <a href="<?= base_url();?>dashboard/signout"><button class="btn btn-danger btn-wd btn-sm">Logout</button></a>
                    <li class="separator hidden-lg hidden-md"></li>
                </ul>  
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">account_balance</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">
                                Institute Details
                            </h4>
                            <?php echo form_open_multipart('setting/update_institute_details');?>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Institute Name: <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="institute_name">
                                            <h7 class="text-danger"><?= form_error('institute_name');?></h7>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Institute Phone: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="institute_phone">
                                            <h7 class="text-danger"><?= form_error('institute_phone');?></h7>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Institute Mobile: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="institute_mobile">
                                            <h7 class="text-danger"><?= form_error('institute_mobile');?></h7>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Institute Email: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="institute_email">
                                            <h7 class="text-danger"><?= form_error('institute_email');?></h7>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Institute Fax:</label>
                                            <input type="text" class="form-control" name="institute_fax">
                                            <h7 class="text-danger"><?= form_error('institute_fax');?></h7>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Adress: <span class="text-danger">*</span></label>
                                            <div class="form-group label-floating">
                                                <label class="control-label"> </label>
                                                <textarea class="form-control" rows="5" name="institute_address">
                                                </textarea>
                                                <h7 class="text-danger"><?= form_error('institute_address'); ?></h7>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="<?php echo base_url();?>main_asset/assets/img/image_placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select Logo</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="institute_logo" />
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success pull-right">Save</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>main_asset/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>main_asset/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>main_asset/assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>main_asset/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url();?>main_asset/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url();?>main_asset/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/nouislider.min.js"></script>
<!-- Select Plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url();?>main_asset/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url();?>main_asset/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url();?>main_asset/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url();?>main_asset/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url();?>main_asset/assets/js/demo.js"></script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/user.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Jul 2017 20:46:15 GMT -->
</html>