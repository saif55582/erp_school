<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">sms</i>
                    </div>
                    <div class="card-content">

                        <h4 class="card-title my-title">Send Sms</h4>
                        <form method="post" class="classform form-horizontal" action="<?=base_url()?>sms/send">
                                <div class="col-md-12"></div>
                                <label class="col-md-2 label-on-left">Role: <?=requiredStar()?></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div onclick="setFocus()" class="form-group label-floating is-empty">
                                            <select name="usertypeID"  id="usertype" class="selectpicker" data-style="select-with-transition" title="Select User" required>
                                                <?php
                                                foreach ($users as $user) {
                                                    if($user->usertypeID != 1) {
                                                        echo "<option value='".base64_encode($user->usertypeID)."'>".strtoupper($user->usertype)."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <h7 class='text-danger'><?=form_error('classesID')?></h7>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>

                
                                <label class="col-md-2 label-on-left">Class: <?=requiredStar()?></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div onclick="setFocus()" class="form-group label-floating is-empty">
                                            <select name="teacherID" id="teacherID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Teacher" required>
                                                <?php
                                                foreach ($teachers as $teacher) {
                                                    if($teacherID == base64_encode($teacher->teacherID)) {
                                                        echo "<option selected value='".base64_encode($teacher->teacherID)."'>".strtoupper($teacher->name)."</option>";
                                                    }
                                                    else {
                                                        echo "<option value='".base64_encode($teacher->teacherID)."'>".strtoupper($teacher->name)."</option>";
                                                    }
                                                    
                                                }
                                                ?>
                                            </select>
                                            <h7 class='text-danger'><?=form_error('teacherID')?></h7>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>


                                <label class="col-md-2 label-on-left">Users: <?=requiredStar()?></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div onclick="setFocus()" class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <select name="option" id=""  class="selectpicker" data-style="select-with-transition" title=" Select Type" required>
                                                <option  value='1'>Optional</option>
                                                <option  value='0'>Mandatory</option>
                                            </select>
                                            <h7 class='text-danger'><?=form_error('option')?></h7>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>

                                <div class="row">
                                    <label class="col-md-2 label-on-left">Template: <?=requiredStar()?></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <input type="text" value="<?=set_value('pass_marks')?>" name="pass_marks" class="form-control up_case" required>
                                                <span class="text-danger"><?=form_error('pass_marks')?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-2 label-on-left">Message: <?=requiredStar()?></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating is-empty">
                                                <textarea name="description" rows="5" class="form-control up_case" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            <button type="submit" class="btn btn-success btn-sm">Add</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>