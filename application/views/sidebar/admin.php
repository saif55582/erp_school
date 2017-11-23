<div class="sidebar-wrapper">
    <ul class="nav">
        <?php 
        if($active == 'dashboardd') 
            echo '<li class="active">'; 
        else
            echo '<li>'; 
        ?>
            <a href="<?=base_url('dashboard');?>">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <?php 
        if($active == 'student') 
            echo '<li class="active">'; 
        else
            echo '<li>'; 
        ?>
            <a href="<?=base_url('student');?>">
                <i class="material-icons">school</i>
                <p>Student</p>
            </a>
        </li>
        <?php 
        if($active == 'teacher') 
            echo '<li class="active">'; 
        else
            echo '<li>'; 
        ?>
            <a href="<?=base_url('teacher');?>">
                <i class="material-icons">people</i>
                <p>Teacher</p>
            </a>
        </li>
        <?php
        if($active == 'academics') {
            echo '<li class="active">'; 
            echo '<a data-toggle="collapse" href="#academic" aria-expanded="true">';
        }
        else {
            echo '<li>';
            echo '<a data-toggle="collapse" href="#academic">';
        }
        ?>
            
                <i class="material-icons">apps</i>
                <p>Academics<b class="caret"></b></p>
            </a>
            <?php
                if($active == 'academics') {
                    echo '<div class="collapse in" id="academic">';
                }
                else {
                     echo '<div class="collapse" id="academic">';
                }
                ?>
            
                <ul class="nav">
                <?php
                    if($subactive == 'class')
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?=base_url('classes');?>">Class</a>
                    </li>
                <?php   
                    if($subactive == 'section') 
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?= base_url('section')?>">Section</a>
                    </li>
                <?php   
                    if($subactive == 'subject') 
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?= base_url('subject')?>">Subject</a>
                    </li>
                <?php   
                    if($subactive == 'syllabus') 
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?= base_url('syllabus') ?>">Syllabus</a>
                    </li>
                <?php   
                    if($subactive == 'assignment') 
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?= base_url('assignment'); ?>">Assignments</a>
                    </li>
                <!-- <?php   
                    if($subactive == 'time_table') 
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="">Time Table</a>
                    </li> -->
                </ul>
            </div>
        </li>
       <!--  <li>
            <a data-toggle="collapse" href="#employee">
                <i class="material-icons">group</i>
                <p>Employee<b class="caret"></b></p>
            </a>
            <div class="collapse" id="employee">
                <ul class="nav">
                    <li>
                        <a href="">Add User Type</a>
                    </li>
                    <li>
                        <a href="">Add Department</a>
                    </li>
                    <li>
                        <a href="">Add Designation</a>
                    </li>
                    <li>
                        <a href="">Add Employee</a>
                    </li>
                    <li>
                        <a href="">Employee List</a>
                    </li>
                    <li>
                        <a href="">Add Bank Details</a>
                    </li>
                </ul>
            </div>
        </li> -->
   <!--      <li>
            <a data-toggle="collapse" href="#student">
                <i class="material-icons">group</i>
                <p>Students<b class="caret"></b></p>
            </a>
            <div class="collapse" id="student">
                <ul class="nav">
                    <li>
                        <a href="">Student Category</a>
                    </li>
                    <li>
                        <a href="">Student Admission</a>
                    </li>
                    <li>
                        <a href="">Student List</a>
                    </li>
                    <li>
                        <a href="">Student Gate Pass</a>
                    </li>
                    <li>
                        <a href="">Manage ID Cards</a>
                    </li>
                </ul>
            </div>
        </li> -->
        
        <?php
        if($active == 'leave-apps') {
            echo '<li class="active">'; 
            echo '<a data-toggle="collapse" href="#leave_application" aria-expanded="true">';
        }
        else {
            echo '<li>';
            echo '<a data-toggle="collapse" href="#leave_application">';
        }
        ?>
            
                <i class="material-icons">apps</i>
                <p>Leave Application<b class="caret"></b></p>
            </a>
            <?php
                if($active == 'leave-apps') {
                    echo '<div class="collapse in" id="leave_application">';
                }
                else {
                     echo '<div class="collapse" id="leave_application">';
                }
                ?>
            
                <ul class="nav">
                <?php
                    if($subactive == 'stud_leave')
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="">Students Leave</a>
                    </li>
                <?php   
                    if($subactive == 'emp_leave') 
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?= base_url('emp_leave'); ?>">Employee Leave</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php
        if($active == 'attendance') {
            echo '<li class="active">'; 
            echo '<a data-toggle="collapse" href="#attendance" aria-expanded="true">';
        }
        else {
            echo '<li>';
            echo '<a data-toggle="collapse" href="#attendance">';
        }
        ?>
            
                <i class="material-icons">date_range</i>
                <p>Attendance<b class="caret"></b></p>
            </a>
            <?php
                if($active == 'attendance') {
                    echo '<div class="collapse in" id="attendance">';
                }
                else {
                     echo '<div class="collapse" id="attendance">';
                }
                ?>
            
                <ul class="nav">
                <?php
                    if($subactive == 'attendance_stud')
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?= base_url('attendance/student'); ?>">Students Attendance</a>
                    </li>
                <?php   
                    if($subactive == 'attendance_tech') 
                        echo '<li class="active">';
                    else
                        echo '<li>';
                ?>
                        <a href="<?= base_url('attendance/teacher'); ?>">Employee Attendance</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li>
            <a data-toggle="collapse" href="#exam">
                <i class="material-icons">apps</i>
                <p>Exam<b class="caret"></b></p>
            </a>
            <div class="collapse" id="exam">
                <ul class="nav">
                    <li>
                        <a data-toggle="collapse" href="#exam_schedule">
                            <p>Exam Schedule<b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="exam_schedule">
                            <ul class="nav">
                                <li><a href="#">Add Exam Schedule</a></li>
                                <li><a href="#">Edit Exam Schedule</a></li>
                                <li><a href="#">Delete Exam Schedule</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#marks">
                            <p>Marks<b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="marks">
                            <ul class="nav">
                                <li><a href="#">Add Marks</a></li>
                                <li><a href="#">Edit Marks</a></li>
                                <li><a href="#">Delete Marks</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#report">
                            <p>Report<b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="report">
                            <ul class="nav">
                                <li><a href="#">Class Wise</a></li>
                                <li><a href="#">Section Wise</a></li>
                                <li><a href="#">Schedule Wisr</a></li>
                                <li><a href="#">All Student</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <!-- <li>
            <a data-toggle="collapse" href="#transport">
                <i class="material-icons">apps</i>
                <p>Transport<b class="caret"></b></p>
            </a>
            <div class="collapse" id="transport">
                <ul class="nav">
                    <li>
                        <a href="">Add Vehicle</a>
                    </li>
                    <li>
                        <a href="">Driver Allocation</a>
                    </li>
                    <li>
                        <a href="">Add Destination</a>
                    </li>
                    <li>
                        <a href="">Syllabus</a>
                    </li>
                    <li>
                        <a href="">Assignments</a>
                    </li>
                    <li>
                        <a href="">Time Table</a>
                    </li>
                </ul>
            </div>
        </li> -->

        <li>

            <a data-toggle="collapse" href="#Administrator">

                <i class="material-icons">account_circle</i>

                <p>Administrator

                    <b class="caret"></b>

                </p>

            </a>

            <div class="collapse" id="Administrator">

                <ul class="nav">

                    <li>

                        <a href="pages/pricing.html">Academic Year</a>

                    </li>

                    <li>

                        <a href="pages/timeline.html">System Admin</a>

                    </li>

                    <li>

                        <a href="pages/login.html">Reset Password</a>

                    </li>

                    <li>

                        <a href="pages/pricing.html">Import</a>

                    </li>

                    <li>

                        <a href="pages/pricing.html">Role</a>

                    </li>

                    <li>

                        <a href="pages/pricing.html">Permission</a>

                    </li>

                    <li>

                        <a href="pages/pricing.html">Update</a>

                    </li>


                </ul>

            </div>

        </li>  

        <li>

            <a data-toggle="collapse" href="#pagesExamples">

                <i class="material-icons">settings</i>

                <p>Setting

                    <b class="caret"></b>

                </p>

            </a>

            <div class="collapse" id="pagesExamples">

                <ul class="nav">

                    <li>

                        <a href="pages/pricing.html">General Setting</a>

                    </li>

                    <li>

                        <a href="pages/timeline.html">Payment Setting</a>

                    </li>

                    <li>

                        <a href="pages/login.html">SMS Setting</a>

                    </li>


                </ul>

            </div>

        </li>   

    </ul>

</div>