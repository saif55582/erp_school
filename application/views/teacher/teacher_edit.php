<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Teacher
                                    </h4>
                                    <?php
                                        
                                    ?>
                                    <form class="form-horizontal" method="post">
                                        
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Name: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" value="<?=$teacher->name
                                                    ?>" name="name" class="form-control up_case">
                                                    <h7 class='text-danger'><?=form_error('name')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?=$teacher->teacherID?>" name="tui" >
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Designation: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" value="<?=$teacher->designation
                                                    ?>" name="designation" class="form-control up_case">
                                                    <h7 class='text-danger'><?=form_error('designation')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <label class="col-md-3 label-on-left">DOB: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" value="<?=$teacher->dob
                                                    ?>" name="dob" class="form-control datepicker"/>
                                                    <h7 class='text-danger'><?=form_error('dob')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Gender: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <select name='gender' class='selectpicker' data-style='select-with-transition' title="<?=$teacher->sex
                                                    ?>" >
                                                        <option  value='MALE'>MALE</option>
                                                        <option  value='FEMALE'>FEMALE</option>
                                                    </select>
                                                    <h7 class='text-danger'><?=form_error('gender')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <label class="col-md-3 label-on-left">Religion: </label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" value="<?=$teacher->religion
                                                    ?>" name="religion" class="form-control up_case">
                                                    <h7 class='text-danger'><?=form_error('religion')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Email: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input value="<?=$teacher->email
                                                    ?>" type="email" name="email" class="form-control">
                                                    <h7 class='text-danger'><?=form_error('email')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Phone: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input value="<?=$teacher->phone
                                                    ?>" type="number" name="phone" class="form-control">
                                                    <h7 class='text-danger'><?=form_error('phone')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Joining Date: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input value="<?=$teacher->doj
                                                    ?>" type="text" name="doj" class="form-control datepicker">
                                                    <h7 class='text-danger'><?=form_error('doj')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Username: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input value="<?=$teacher->username
                                                    ?>" type="text" name="username" class="form-control">
                                                    <h7 class='text-danger'><?=form_error('username')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Address: <?=requiredStar()?></label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <textarea value="" name="address" id="" rows="5" class="form-control"><?=$teacher->address
                                                    ?></textarea>
                                                    <h7 class='text-danger'><?=form_error('address')?></h7>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    <button type="submit" class="btn btn-fill btn-rose">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img class="img img-responsive" style="width:200px;" src="<?=base_url()?>main_asset/school_docs/<?=$this->session->userdata('instituteID')."/teacher/$teacher->photo"?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Change image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="..." />
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>