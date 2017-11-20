
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	 <title>My school solutions | Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>main_asset/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url(); ?>main_asset/assets/css/material-dashboard.css" rel="stylesheet" />
    
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
                <a class="navbar-brand" href="#"><img class="img" style="width:250px;" src="<?=base_url()?>main_asset/assets/img/my school solution logo.jpg" ></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   
                    <li class="">
                        <a href="<?=base_url('register')?>">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class=" active ">
                        <a href="<?=base_url('login')?>">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?= base_url()?>main_asset/assets/img/back2.png">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="post">
                                <div class="card card-login ">
                                    <!--<div class="card-header text-center" data-background-color="maroon">
                                        <h4 class="card-title">Login</h4>
                                    </div>-->
                                   
                                    <div class="card-content">
                                        <h3 class="text-center">Existing User Login</h3>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email address</label>
                                                <input type="text" class="form-control" name="username">
                                                <span class="text-danger"><?= form_error('username'); ?></span>
                                                <span class="text-danger"><?= $form_validation ?></span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" name="password">
                                                <span class="text-danger"><?= form_error('password'); ?></span>
                                            </div>
                                        </div>
										<p style="cursor:pointer" data-toggle="modal" data-target="#myModal" class="text-danger text-right">Forgot password</p>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" name="login" class="btn btn-success btn-wd btn-md">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<!-- Classic Modal -->
			<div class="modal" data-keyboard="false" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								<i class="material-icons">clear</i>
							</button>
							<h4 class="modal-title">Forgot password</h4>
						</div>
						<div class="modal-body">
							<form method="post" action="<?=base_url('signin/forgotPassword')?>">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">email</i>
									</span>
									<div class="form-group label-floating">
										<label class="control-label">Email address</label>
										<input type="text" name="f_email" class="form-control" required>
									</div>
								</div>
								<div class="footer text-right">
									<button type="submit" name="forgot" class="btn btn-success btn-xs">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--  End Modal -->
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
						<?=date('Y')?>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_asset/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_asset/assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_asset/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url(); ?>main_asset/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/nouislider.min.js"></script>

<!-- Select Plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>main_asset/assets/js/demo.js"></script>
<script type="text/javascript">

		function showNotification (from, align, color, icon, msg){
			type = ['','info','success','warning','danger','rose','primary'];

			//color = Math.floor((Math.random() * 6) + 1);

			$.notify({
				icon: icon,
				message: msg

			},{
				type: type[color],
				timer: 3000,
				placement: {
					from: from,
					align: align
				}
			});
		}
		
		
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