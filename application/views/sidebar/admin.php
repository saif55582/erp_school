<?php
    $_li1 = array(
        'dashboard'=>($li1 == 'dashboard' ) ? "class='active'" : "class=' '",
        'student'=>($li1 == 'student' ) ? "class='active'" : "class=' '",
        'teacher'=>($li1 == 'teacher' ) ? "class='active'" : "class=' '",
        'academics'=>($li1 == 'academics' ) ? "class='active'" : "class=' '",
        'attendance'=>($li1 == 'attendance' ) ? "class='active'" : "class=' '",
        'finance'=>($li1 == 'finance' ) ? "class='active'" : "class=' '",
    );
    $_a1 = array(
         'academics'=>($a1 == 'academics' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'attendance'=>($a1 == 'attendance' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'finance'=>($a1 == 'finance' ) ? "aria-expanded='true' " : "aria-expanded='false' "
    );

    $_div1 = array(
        'academics'=>($div1 == 'academics') ? "class='collapse in'" : "class='collapse'",
        'attendance'=>($div1 == 'attendance') ? "class='collapse in'" : "class='collapse'",
        'finance'=>($div1 == 'finance') ? "class='collapse in'" : "class='collapse'"
    );

    $_li2 = array(
        'class'=>($li2 == 'class' ) ? "class='active'" : "class=' '",
        'section'=>($li2 == 'section' ) ? "class='active'" : "class=' '",
        'subject'=>($li2 == 'subject' ) ? "class='active'" : "class=' '",
        'syllabus'=>($li2 == 'syllabus' ) ? "class='active'" : "class=' '",
        'assignment'=>($li2 == 'assignment' ) ? "class='active'" : "class=' '",
        'student'=>($li2 == 'student' ) ? "class='active'" : "class=' '",
        'employee'=>($li2 == 'employee' ) ? "class='active'" : "class=' '",
        'fee'=>($li2 == 'fee' ) ? "class='active'" : "class=' '"
        
    );

    $_a2 = array(
         'fee'=>($a2 == 'fee' ) ? "aria-expanded='true' " : "aria-expanded='false'"
    );

    $_div2 = array(
        'fee'=>($div2 == 'fee') ? "class='collapse in'" : "class='collapse'"
    );

    $_li3 = array(
        'fee-category'=>($li3 == 'fe-category' ) ? "class='active'" : "class=' '",
        'fee-sub-category'=>($li3 == 'fee-sub-category' ) ? "class='active'" : "class=' '",
        'fee-category-fine'=>($li3 == 'fee-category-fine' ) ? "class='active'" : "class=' '",
        'fee-allocation'=>($li3 == 'fee-allocation' ) ? "class='active'" : "class=' '",
        'quick-payment'=>($li3 == 'quick-payment' ) ? "class='active'" : "class=' '",
        'fee-collection'=>($li3 == 'fee-collection' ) ? "class='active'" : "class=' '"
    );

?>

<div class="sidebar-wrapper">
    <ul class="nav">
        <li <?=$_li1['dashboard']?> >
        <?php 
        if($active == 'dashboard') 
            echo '<li class="active">'; 
        else
            echo '<li>'; 
        ?>
            <a href="<?=base_url('dashboard');?>">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li <?=$_li1['student']?> >
            <a href="<?=base_url('student')?>">
                <i class="material-icons">school</i>
                <p>Student</p>
            </a>
        </li>
        <li <?=$_li1['teacher']?> >
            <a href="<?=base_url('teacher');?>">
                <i class="material-icons">people</i>
                <p>Teacher</p>
            </a>
        </li>
        <li <?=$_li1['academics']?> >
            <a data-toggle="collapse" href="#academics" <?=$_a1['academics']?> >
                <i class="material-icons">import_contacts</i>
                <p>Academics<b class="caret"></b></p>
            </a>
            <div style="margin-left:10px;;" <?=$_div1['academics']?> id="academics">
                <ul class="nav">
                    <li <?=$_li2['class']?>>
                        <a href="<?=base_url('classes');?>">Class</a>
                    </li>
                    <li <?=$_li2['section']?>>
                        <a href="<?= base_url('section')?>">Section</a>
                    </li>
                    <li <?=$_li2['subject']?>>
                        <a href="<?= base_url('subject')?>">Subject</a>
                    </li>
                    <li <?=$_li2['syllabus']?>>
                        <a href="<?= base_url('syllabus') ?>">Syllabus</a>
                    </li>
                    <li <?=$_li2['assignment']?>>
                        <a href="<?= base_url('assignment'); ?>">Assignments</a>
                    </li>
                </ul>
            </div>
        </li>
        <li <?=$_li1['attendance']?> >
            <a data-toggle="collapse" href="#attendance" <?= $_a1['attendance']?> >
                <i class="material-icons">date_range</i>
                <p>Attendance<b class="caret"></b></p>
            </a>
            <div style="margin-left:10px;" <?= $_div1['attendance']?> id="attendance">
                <ul class="nav">
                    <li <?=$_li2['student']?> >
                        <a href="<?= base_url('attendance/student'); ?>">Students Attendance</a>
                    </li>
                    <li <?=$_li2['employee']?> >
                        <a href="<?= base_url('attendance/teacher'); ?>">Employee Attendance</a>
                    </li>
                </ul>
            </div>
        </li>

        <li <?=$_li1['finance'];?>>
            <a data-toggle="collapse" href="#finance" <?=$_a1['finance']?> >
                <i class="material-icons">account_balance_wallet</i>
                <p>Finance<b class="caret"></b></p>
            </a>
            <div style="margin-left:10px;"  <?=$_div1['finance']?> id="finance">
                <ul class="nav">
                    <li <?=$_li2['fee']?> >
                        <a data-toggle="collapse" href="#fees" <?=$_a2['fee']?> >
                            Fees<b class="caret"></b>
                        </a>
                        <div style="margin-left:20px;" <?=$_div2['fee']?> id="fees">
                            <ul class="nav">
                                <li <?=$_li3['fee-category']?> ><a href="<?=base_url('fees')?>">Fee Category</a></li>
                                <li <?=$_li3['fee-sub-category']?> ><a href="#">Fee Sub Category</a></li>
                                <li <?=$_li3['fee-category-fine']?> ><a href="#">Fee Category Fine</a></li>
                                <li <?=$_li3['fee-allocation']?> ><a href="#">Fee Allocation</a></li>
                                <li <?=$_li3['quick-payment']?> ><a href="#">Quick Payment</a></li>
                                <li <?=$_li3['fee-collection']?> ><a href="#">Fee Collection</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#exam">
                <i class="material-icons">border_color</i>
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
        
        <li class="">
            <a data-toggle="collapse" href="#leave_application" aria-expanded="false">            
                <i class="material-icons">assignment</i>
                <p>Leave Application<b class="caret"></b></p>
            </a>
            <div class="collapse " id="leave_application">
                <ul class="nav">
                    <li class="">';
                        <a href="">Students Leave</a>
                    </li>

                    <li class="">
                        <a href="<?= base_url('emp_leave'); ?>">Employee Leave</a>
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