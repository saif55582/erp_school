<div  class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header card-header-icon" data-background-color="rose">

                        <i class="material-icons">settings</i>

                    </div>

                    <div class="card-content">

						<h4 class="card-title my-title">General Setting</h4>

                        <form method="post" action="<?=base_url('setting/general')?>" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-sm-4 col-md-4 form-group label-floating">

                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="<?= base_url('main_asset/school_docs/'.$this->session->userdata('instituteID').'/data/'.$institute->school_logo) ?>" alt="image">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                            <span class="btn btn-rose btn-round btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="logo" />
                                            </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-8 col-md-8">
                                
                                    <div class="col-sm-6 col-md-6 form-group label-floating">
                                        <label class="control-label">School Name</label>
                                        <input type="text" name="school_name" class="form-control" value="<?= $institute->school_name ?>">
                                    </div>

                                    <div class="col-sm-6 col-md-6 form-group label-floating">
                                        <label class="control-label">School Pin Code</label>
                                        <input type="text" name="school_pincode" class="form-control" value="<?= $institute->school_pincode ?>">
                                    </div>

                                    <div class="col-sm-6 col-md-6 form-group label-floating">
                                        <label class="control-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" value="<?= $institute->phone ?>">
                                    </div>

                                    <div class="col-sm-6 col-md-6 form-group label-floating">
                                        <label class="control-label">School Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $institute->email ?>">
                                    </div>

                                </div>

                            </div>

                            <button type="Submit" class="btn btn-rose btn-sm pull-right btn-round">Submit</button>

                        </form>

					</div>

				</div>

			</div>

		</div>

	</div>
</div>
