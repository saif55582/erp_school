<!doctype html>
<html lang="en">
<head>
<title>Sign In</title>
<?php include 'head.php'; ?>
</head>
<body>
    <div class="wrapper wrapper-full-page">
                <div class="container">
        <div class="full-page login-page" filter-color="black" data-image="<?= base_url()?>main_asset/assets/img/pattern.jpg"">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        
                            <form method="post" >
                                <div class="card card-login ">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">
                                            <?php 
                                                echo 'School Title' 
                                            ?>
                                        </h4>
                                        <h4><?= $form_validation; ?></h4>
                                    </div>
                                    
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Username</label>
                                                <input type="text" class="form-control" name="username">
                                                <h7 class="text-danger"><?= form_error('username'); ?></h7>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" name="password">
                                                <h7 class="text-danger"><?= form_error('password');?></h7>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose  btn-md">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?= base_url();?>main_asset/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>main_asset/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>main_asset/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>main_asset/assets/js/material.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>main_asset/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?= base_url();?>main_asset/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?= base_url();?>main_asset/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?= base_url();?>main_asset/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?= base_url();?>main_asset/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url();?>main_asset/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?= base_url();?>main_asset/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?= base_url();?>main_asset/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?= base_url();?>main_asset/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?= base_url();?>main_asset/assets/js/nouislider.min.js"></script>
<!-- Select Plugin -->
<script src="<?= base_url();?>main_asset/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?= base_url();?>main_asset/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?= base_url();?>main_asset/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?= base_url();?>main_asset/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?= base_url();?>main_asset/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?= base_url();?>main_asset/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?= base_url();?>main_asset/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url();?>main_asset/assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

    });
</script>

</html>