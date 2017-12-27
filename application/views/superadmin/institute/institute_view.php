<div  class="content">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-md-12">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <?php
                                $superadmin = base_url().'main_asset/school_docs/superadmin/default.png';
                                        echo  "<img src='".$superadmin."' class='img'>";
                            ?>
                        </a>
                    </div>
                    <div class="card-content">
                        <h6 class="category text-gray">Institute Name</h6>
                        <h4 class="card-title text-success"><strong><?=strtoupper($institute->school_name)?></strong></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">account_balance</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><strong>Institute Profile</strong></h4>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Phone</div>
                                    <div class="col-md-6 col-sm-6">: <?=$institute->phone?></div>  
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Email</div>
                                    <div class="col-md-6 col-sm-6">: <?=$institute->email?></div>  
                                </div>
                            </div>
                            <br><br>

                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Pin Code</div>
                                    <div class="col-md-6 col-sm-6">: <?=$institute->school_pincode?></div>  
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Admin Name</div>
                                    <div class="col-md-6 col-sm-6">: <?=$admin->name?></div>  
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>