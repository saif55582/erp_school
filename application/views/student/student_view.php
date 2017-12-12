<div  class="content">
    <div class="container-fluid">
    	<div class="row">
            <?php print_r($attendances) ?>
            <div class="col-md-12">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <?php
                                if($student->photo == 'default.png') {
                                        echo  "<img src='".base_url('main_asset/assets/img/default.png')."' class='img'>";
                                    }
                                    else {
                                        echo "<img src='".base_url('main_asset/school_docs/').$this->session->userdata('instituteID')."/student/".$student->photo."' class='img'>";
                                    }
                            ?>
                        </a>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><strong><?= $student -> f_name.' '.$student -> f_name ?></strong></h4>
                        <h6 class="category text-gray">Class : <?= $this->mylibrary->getClassName($student->classesID); ?></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><strong>Student Profile</strong></h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12"><h4><strong>Personal Information</strong></h4></div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Register NO</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> reg_no ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Roll</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> roll_no ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Section</div>
                                    <div class="col-md-6 col-sm-6">: <?= $this->mylibrary->getSectionName($student->sectionID); ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Date of Birth</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> dob ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Gender</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> gender ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Blood Group</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> blood ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Email</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> email ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Address</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> address ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Username</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> username ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Password</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> slug ?></div>  
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12"><h4><strong>Parents Information</strong></h4></div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Father's Name</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> father_name ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Mobile</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> father_phone ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Occupation</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> father_job ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Aadhar</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> father_aadhar ?></div>  
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <hr>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Mother's Name</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> mother_name ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Mobile</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> mother_phone ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Occupation</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> mother_job ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Aadhar</div>
                                    <div class="col-md-6 col-sm-6">: <?= $student -> mother_aadhar ?></div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">receipt</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><strong>Student Attendance</strong></h4>
                        <table class="table table-responsive table-hove table-bordered">
                            <thead>
                                <tr>
                                    <th><STRONG>#</STRONG></th>
                                    <?php

                                        $i = 1;
                                        while ($i <= 31) {
                                            echo'<td>'.$i.'</td>';$i ++;
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($attendances as $attendance): 
                                    echo '<tr>
                                            <td>'.date('M',strtotime($attendance->month_year)).'</td>';
                                    for($i=1;$i<=31;$i++) {?>
                                        <td>
                                            <?php
                                                $d = ($i<10)? 'd0'.$i : 'd'.$i;
                                                 if(strtoupper($attendance -> $d) == 'P')
                                                    echo'<span class="text-success">'.strtoupper($attendance -> $d).'</span>';
                                                else if(strtoupper($attendance -> $d) == 'A')
                                                    echo'<span class="text-danger">'.strtoupper($attendance -> $d).'</span>';
                                                else if(strtoupper($attendance -> $d) == 'L')
                                                    echo'<span class="text-warning">'.strtoupper($attendance -> $d).'</span>';
                       
                                            ?>
                                        </td>
                                <?php
                                    }
                                    echo '</tr>';
                                endforeach;
                                ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>