<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>main_asset/assets/img/" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>main_asset/assets/img/" /
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" /> 
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>main_asset/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS-->
    <link href="<?php echo base_url(); ?>main_asset/assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>main_asset/assets/css/demo.css" rel="stylesheet" />
    <!-- Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body style="background-color:#7E1E15 !important;">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img class="img" style="width:250px;" src="<?=base_url()?>main_asset/assets/img/my school solution logo.jpg" ></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class=" active ">
                        <a href="<?=base_url('register')?>">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class="">
                        <a href="<?=base_url('signin')?>">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="<?= base_url()?>main_asset/assets/img/back2.png">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Register</h2>
                            <form method="post">
                            <div class="row">
                                <div class="col-md-6 ">
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <input type="text" name="first_name" value="<?=set_value('first_name')?>" class="form-control up_case" placeholder="First name" >
                                                <span class="text-danger"><?=form_error('first_name')?></span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <input type="text" name="last_name" value="<?=set_value('last_name')?>" class="form-control up_case" placeholder="Last name" >
                                                <span class="text-danger"><?=form_error('last_name')?></span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">business</i>
                                                </span>
                                                <input type="text" name="school_name" value="<?=set_value('school_name')?>" class="form-control up_case" placeholder="School Name" >
                                                <span class="text-danger"><?=form_error('school_name')?></span>
                                            </div>
                                            
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">location_on</i>
                                                </span>
                                                <input type="text" name="school_pincode" value="<?=set_value('school_pincode')?>" placeholder="School area pin code" class="form-control"  >
                                                <span class="text-danger"><?=form_error('school_pincode')?></span>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                            <input type="text" name="phone" value="<?=set_value('phone')?>" class="form-control" placeholder="Enter phone number" >
                                            <span class="text-danger"><?=form_error('phone')?></span>

                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="text" class="form-control" value="<?=set_value('email')?>" name="email" placeholder="Email id (Related to your school)" >
                                            <span class="text-danger"><?=form_error('email')?></span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">people</i>
                                            </span>
                                            <select name="no_of_students" id="students" class="form-control" >
                                                <option value="">Number of students</option>
                                                <option value="Below 500">Below 500</option>
                                                <option value="500-1000">500-1000</option>
                                                <option value="1000+"> 1000+ </option>
                                            </select>
                                            <span class="text-danger"><?=form_error('no_of_students')?></span>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" name="password" placeholder="Password" class="form-control" >
                                            <span class="text-danger"><?=form_error('password')?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" class="btn btn-success btn-round" value="Get Started">
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
                                <a href="index.php">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="pricing_plans.php">
                                    Pricing
                                </a>
                            </li>
                            <li>
                                <a href="feature.php">
                                    Feature
                                </a>
                            </li>
                            <li>
                                <a href="contactus.php">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </nav>
                   <p class="copyright pull-right">
                        Copyright
                        &copy;
                        
                        School ERP
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>

</body>
<!--   Core JS Files   -->
<script src="<?=base_url()?>main_asset/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>main_asset/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>main_asset/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>main_asset/assets/js/material.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>main_asset/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?=base_url()?>main_asset/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?=base_url()?>main_asset/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?=base_url()?>main_asset/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?=base_url()?>main_asset/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?=base_url()?>main_asset/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?=base_url()?>main_asset/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?=base_url()?>main_asset/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?=base_url()?>main_asset/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?=base_url()?>main_asset/assets/js/nouislider.min.js"></script>

<!-- Select Plugin -->
<script src="<?=base_url()?>main_asset/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?=base_url()?>main_asset/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?=base_url()?>main_asset/assets/js/sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?=base_url()?>main_asset/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?=base_url()?>main_asset/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?=base_url()?>main_asset/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?=base_url()?>main_asset/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?=base_url()?>main_asset/assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {

        $page = $('.full-page');
        image_src = $page.data('image');
        if(image_src !== undefined){
            image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
            $page.append(image_container);
        }
    });
</script>

</html>