<div  class="content">



    <div class="container-fluid">



        <div class="row">



            <div class="col-sm-12">



                <div class="card">



                    <div class="card-header card-header-icon" data-background-color="rose">



                        <i class="material-icons">assignment</i>



                    </div>



                    <div class="card-content">



						<h4 class="card-title my-title">System Admin</h4>



                        <ul class="nav nav-pills nav-pills-rose">

                            <li class="active">

                                <a href="#admin_list" data-toggle="tab">Admin List</a>

                            </li>

                            <li>

                                <a href="#add_admin" data-toggle="tab">
                                    Add Admin
                                </a>

                            </li>

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="admin_list">


                                <div class="material-datatables">
                                        
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">

                                        <thead class="text-rose">

                                            <tr>    

                                                <th>Photo</th>

                                                <th>Name</th>

                                                <th>Email</th>

                                                <th>Role</th>

                                                <th>Username</th>

                                                <th>Password</th>

                                                <th class="disabled-sorting text-center ">Actiion</th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <th>Photo</th>

                                                <th>Name</th>

                                                <th>Email</th>

                                                <th>Role</th>

                                                <th>Username</th>

                                                <th>Password</th>

                                                <th class="disabled-sorting text-center ">Actiion</th>

                                            </tr>

                                        </tfoot>

                                        <tbody>

                                            <?php foreach ($admin as $adm) { ?>
                                                    
                                                <tr id="<?= $adm->adminID ?>">
                                                    <td></td>
                                                    <td><?= $adm->name ?></td>
                                                    <td><?= $adm->email ?></td>
                                                    <td><?= $adm->phone ?></td>
                                                    <td><?= $adm->username ?></td>
                                                    <td><?= $adm->slug ?></td>
                                                    <td></td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            <div class="tab-pane" id="add_admin">

                                <form method="post" action="<?=base_url()?>administrator/systemadmin" enctype="form-data/multipart">
                                    <div class="row">

                                        <div class="row">    
                                            <div class="col-sm-4 col-md-4">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="<?= base_url() ?>/main_asset/assets/img/image_placeholder.jpg" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="photo" />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8 col-sm-8">
                                                
                                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="name" class="form-control " required>
                                                </div>

                                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" name="email" class="form-control " required>
                                                </div>

                                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                                    <label class="control-label">Phone</label>
                                                    <input type="text" name="phone" pattern="[0-9]{10}" class="form-control " required>
                                                </div>

                                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" name="uname" class="form-control " placeholder="No Space Allowed in Username" required>
                                                </div>

                                                <div class="col-sm-6 col-md-6 form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input type="text" name="pwd" class="form-control " required>
                                                </div>


                                                <button style="margin-top: 60px;" class="btn btn-rose btn-round pull-right">Submit</button>

                                            </div>

                                        </div>

                                        <!-- <div class="col-sm-4 col-md-4 form-group label-floating">
                                            <label class="control-label">Date Of Birth</label>
                                            <input type="text" name="dob" class="form-control datepicker" required>
                                        </div>
                                        
                                        <div class="col-sm-4 col-md-4 form-group label-floating">
                                            <select class="form-control">
                                                <option hidden="true">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-4 col-md-4 form-group label-floating">
                                            <label class="control-label">Religion</label>
                                            <input type="text" name="religion" class="form-control " required>
                                        </div>

                                        <div class="col-sm-4 col-md-4 form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <input type="text" name="address" class="form-control " required>
                                        </div>
                                        
                                        <div class="col-sm-4 col-md-4 form-group label-floating">
                                            <label class="control-label">Joining Date</label>
                                            <input type="text" name="doj" class="form-control datepicker" required>
                                        </div> -->


                                    </div>
                                    
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>