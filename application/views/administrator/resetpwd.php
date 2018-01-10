<div  class="content">



    <div class="container-fluid">



        <div class="row">



            <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">



                <div class="card">



                    <div class="card-header card-header-icon" data-background-color="rose">



                        <i class="material-icons">lock_open</i>



                    </div>



                    <div class="card-content">



						<h4 class="card-title my-title">Reset Password</h4>

						
						<form method="post" action="<?=base_url()?>administrator/resetpwd" onsubmit="return resetpwd();">
                            
                            <div class="row">

                            	<div class="col-sm-6 col-md-6 form-group label-floating">
                                    <label class="control-label">User Name</label>
                                    <input type="text" name="uname" id="uname" class="form-control ">
                                </div>

                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                    <label class="control-label">Password</label>
                                    <input type="Password" name="pwd" id="pwd" class="form-control ">
                                </div>

                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                    <label class="control-label">New Password</label>
                                    <input type="Password" name="newpwd" id="newpwd" class="form-control ">
                                </div>

                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                    <label class="control-label">Retype Password</label>
                                    <input type="Password" name="repwd" id="repwd" class="form-control ">
                                </div>

								<button class="btn btn-rose btn-round pull-right btn-sm">Submit</button>

                            </div>

                        </form>

					</div>


				</div>


			</div>


		</div>


	</div>


</div>