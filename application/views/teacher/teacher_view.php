<div  class="content">
    <div class="container-fluid">
    	<div class="row">
            <div class="col-md-12">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <?php
                                if($teacher->photo == 'default.png') {
                                        echo  "<img src='".base_url('main_asset/assets/img/default.png')."' class='img'>";
                                    }
                                    else {
                                        echo "<img src='".base_url('main_asset/school_docs/').$this->session->userdata('instituteID')."/teacher/".$teacher->photo."' class='img'>";
                                    }
                            ?>
                        </a>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><strong><?= $teacher -> name ?></strong></h4>
                        <h6 class="category text-gray">Designation : <?= $teacher->designation ?></h6>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><strong>teacher Profile</strong></h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12"><h4><strong>Personal Information</strong></h4></div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Date of Birth</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> dob ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Gender</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> sex ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Religion</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher-> religion ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Contact No</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> phone ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">User Name</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> username ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Email</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> email ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Address</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> address ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Username</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> username ?></div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">Password</div>
                                    <div class="col-md-6 col-sm-6">: <?= $teacher -> slug ?></div>  
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
                        <h4 class="card-title"><strong>teacher Attendance</strong></h4>
                        <table class="table table-responsive table-hover table-bordered">
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
                                                <th>'.date('M',strtotime($attendance->month_year)).'</th>';
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
                                                <?php }
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