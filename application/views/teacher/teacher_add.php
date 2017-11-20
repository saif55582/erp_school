<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Add Teacher
                        </h4>
                        <div class="controls">
                            <?= form_open_multipart(NULL,array('class'=>'form-horizontal'))?>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Name: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" value="<?=set_value('name')?>" name="name" class="form-control up_case">
                                        <h7 class='text-danger'><?=form_error('name')?></h7>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Designation: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" value="<?=set_value('designation')?>" name="designation" class="form-control up_case">
                                        <h7 class='text-danger'><?=form_error('designation')?></h7>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <label class="col-md-3 label-on-left">DOB: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input value="<?=set_value('dob')?>" type="text" name="dob" class="form-control datepicker"/>
                                        <h7 class='text-danger'><?=form_error('dob')?></h7>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Gender: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <select name='sex' class='selectpicker' data-style='select-with-transition' title=" ">
                                            <?php
                                                $selected = set_value('sex');

                                                if($selected == 'MALE') {
                                                    echo "<option selected value='MALE'>MALE</option>";
                                                    echo "<option value='FEMALE'>FEMALE</option>";
                                                }
                                                elseif($selected == 'FEMALE') {
                                                    echo "<option selected value='FEMALE'>FEMALE</option>";
                                                    echo "<option value='MALE'>MALE</option>";
                                                }
                                                else {
                                                    echo "<option value='FEMALE'>FEMALE</option>";
                                                    echo "<option value='MALE'>MALE</option>";
                                                }
                                            ?>
                                            
                                        </select>
                                        <h7 class='text-danger'><?=form_error('sex')?></h7>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <label class="col-md-3 label-on-left">Religion: </label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input value="<?=set_value('religion')?>" type="text" name="religion" class="form-control up_case">
                                        <h7 class='text-danger'><?=form_error('religion')?></h7>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Email: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input value="<?=set_value('email')?>" type="text" name="email" class="form-control">
                                        <h7 class='text-danger'><?=form_error('email')?></h7>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Phone: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input value="<?=set_value('phone')?>" type="number" name="phone" class="form-control">
                                        <h7 class='text-danger'><?=form_error('phone')?></h7>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 label-on-left">Joining Date: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input type="text" value="<?=set_value('doj')?>" name="doj" class="form-control datepicker">
                                        <h7 class='text-danger'><?=form_error('doj')?></h7>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <label class="col-md-3 label-on-left">Address: <?=requiredStar()?></label>
                                <div class="col-md-9">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea name="address" id="" rows="5" class="form-control"><?=set_value('address')?></textarea>
                                        <h7 class='text-danger'><?=form_error('address')?></h7>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">Documents</label>
                                <div class="col-md-9">
                                    <div class="togglebutton">
                                        <label><input type="checkbox" name="doc" id="doc_id"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="entry input-group" style="display: none;">
                                <div class="row">
                                    <div class="col-md-3"><label class="label-on-left">File Name : <?=requiredStar()?></label></div>
                                    <div class="col-md-3 form-group">
                                        <input type="text" name="doc_name[]" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="file" name="doc_file[]" class="label-on-left" id="file_id">
                                    </div>
                                    <div class="col-md-3">
                                        <span class="input-group-btn" style="padding-left: 80px;">
                                            <button class="btn btn-success btn-round btn-add" type="button">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <div class="form-group form-button">
                                    <button type="submit" class="btn btn-fill btn-rose pull-right" style="" id="primaryButton">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img class="img img-responsive" style="width:200px;" src="<?=base_url()?>main_asset/assets/img/faces/default.png" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="photo" >
                        </span>
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                    <span class="text-danger"><?= form_error('photo')?></span>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>