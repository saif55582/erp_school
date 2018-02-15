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

                                <div id="select_user">
                                    <label class="col-md-2 label-on-left">User Type: <?=requiredStar()?></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="setFocus()" class="form-group label-floating is-empty">
                                                <select name="usertype"  id="usertype" class="selectpicker" data-style="select-with-transition" title="Select User" required>
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
                                </div>

                
                                <div style="display:none" id="class_select">
                                    <label class="col-md-2 label-on-left">Class: <?=requiredStar()?></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="setFocus()" class="form-group label-floating is-empty">
                                                <select name="class" id="class"  class="selectpicker" data-style="select-with-transition" title="Select Class" required>
                                                    <?php
                                                    foreach ($classes as $class) {
                                                        echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <h7 class='text-danger'><?=form_error('teacherID')?></h7>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>

                                <div style="" id="select_user">
                                    <label class="col-md-2 label-on-left">Users: <?=requiredStar()?></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="setFocus()" class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <select name="user[]" id="stud"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title=" Select User" multiple="true">
                                                    
                                                </select>
                                                <h7 class='text-danger'><?=form_error('option')?></h7>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>

                                <div id="message">
                                    <label class="col-md-2 label-on-left">Message: <?=requiredStar()?></label>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <textarea name="message" rows="5" class="form-control up_case" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            <button type="submit" class="btn btn-success btn-sm">Send</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>