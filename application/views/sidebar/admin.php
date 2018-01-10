<?php
    $_li1 = array(
        'dashboard'=>($li1 == 'dashboard' ) ? "class='active'" : "class=' '",
        'student'=>($li1 == 'student' ) ? "class='active'" : "class=' '",
        'teacher'=>($li1 == 'teacher' ) ? "class='active'" : "class=' '",
        'academics'=>($li1 == 'academics' ) ? "class='active'" : "class=' '",
        'attendance'=>($li1 == 'attendance' ) ? "class='active'" : "class=' '",
        'finance'=>($li1 == 'finance' ) ? "class='active'" : "class=' '",
        'administrator'=>($li1 == 'administrator' ) ? "class='active'" : "class=' '",
        'exam'=>($li1 == 'exam' ) ? "class='active'" : "class=' '",
        'marks'=>($li1 == 'marks' ) ? "class='active'" : "class=' '"
    );
    $_a1 = array(
         'academics'=>($a1 == 'academics' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'attendance'=>($a1 == 'attendance' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'finance'=>($a1 == 'finance' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'administrator'=>($a1 == 'administrator' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'exam'=>($a1 == 'exam' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'marks'=>($a1 == 'marks' ) ? "aria-expanded='true' " : "aria-expanded='false' "
    );

    $_div1 = array(
        'academics'=>($div1 == 'academics') ? "class='collapse in'" : "class='collapse'",
        'attendance'=>($div1 == 'attendance') ? "class='collapse in'" : "class='collapse'",
        'finance'=>($div1 == 'finance') ? "class='collapse in'" : "class='collapse'",
        'administrator'=>($div1 == 'administrator') ? "class='collapse in'" : "class='collapse'",
        'exam'=>($div1 == 'exam') ? "class='collapse in'" : "class='collapse'",
        'marks'=>($div1 == 'marks') ? "class='collapse in'" : "class='collapse'"
    );


    $_li2 = array(
        'class'=>($li2 == 'class' ) ? "class='active'" : "class=' '",
        'section'=>($li2 == 'section' ) ? "class='active'" : "class=' '",
        'subject'=>($li2 == 'subject' ) ? "class='active'" : "class=' '",
        'syllabus'=>($li2 == 'syllabus' ) ? "class='active'" : "class=' '",
        'assignment'=>($li2 == 'assignment' ) ? "class='active'" : "class=' '",
        'student'=>($li2 == 'student' ) ? "class='active'" : "class=' '",
        'teacher'=>($li2 == 'teacher' ) ? "class='active'" : "class=' '",
        'fee'=>($li2 == 'fee' ) ? "class='active'" : "class=' '",
        'academic_year'=>($li2 == 'academic_year' ) ? "class='active'" : "class=' '",
        'permission'=>($li2 == 'permission' ) ? "class='active'" : "class=' '",
        'attendance_report'=>($li2 == 'attendance_report' ) ? "class='active'" : "class=' '",
        'exam_name'=>($li2 == 'exam_name' ) ? "class='active'" : "class=' '",
        'exam_report'=>($li2 == 'exam_report' ) ? "class='active'" : "class=' '",
        'exam_schedule'=>($li2 == 'exam_schedule' ) ? "class='active'" : "class=' '",
        'mark'=>($li2 == 'mark' ) ? "class='active'" : "class=' '",
        'percentage'=>($li2 == 'percentage' ) ? "class='active'" : "class=' '",
        'promotion'=>($li2 == 'promotion' ) ? "class='active'" : "class=' '",
        'systemadmin'=>($li2 == 'systemadmin' ) ? "class='active'" : "class=' '",
        'resetpwd'=>($li2 == 'resetpwd' ) ? "class='active'" : "class=' '"

    );

    $_a2 = array(
         'fee'=>($a2 == 'fee' ) ? "aria-expanded='true' " : "aria-expanded='false'",
         'attendance_report'=>($a2 == 'attendance_report' ) ? "aria-expanded='true' " : "aria-expanded='false'"
    );

    $_div2 = array(
        'fee'=>($div2 == 'fee') ? "class='collapse in'" : "class='collapse'",
        'attendance_report'=>($div2 == 'attendance_report') ? "class='collapse in'" : "class='collapse'"
    );

    $_li3 = array(
        'fee-category'=>($li3 == 'fee-category' ) ? "class='active'" : "class=' '",
        'fee-category-fine'=>($li3 == 'fee-category-fine' ) ? "class='active'" : "class=' '",
        'fee-allocation'=>($li3 == 'fee-allocation' ) ? "class='active'" : "class=' '",
        'quick-payment'=>($li3 == 'quick-payment' ) ? "class='active'" : "class=' '",
        'fee-collection'=>($li3 == 'fee-collection' ) ? "class='active'" : "class=' '",
        'attendance_rep_student'=>($li3 == 'attendance_rep_student' ) ? "class='active'" : "class=' '",
        'attendance_rep_teacher'=>($li3 == 'attendance_rep_teacher' ) ? "class='active'" : "class=' '",
        'fee_type'=>($li3 == 'fee_type' ) ? "class='active'" : "class=' '",
        'fee_balance'=>($li3 == 'fee_balance' ) ? "class='active'" : "class=' '",
        'fee_invoice'=>($li3 == 'fee_invoice' ) ? "class='active'" : "class=' '",
        'fine_type'=>($li3 == 'fine_type' ) ? "class='active'" : "class=' '",
        'paymenthistory'=>($li3 == 'paymenthistory' ) ? "class='active'" : "class=' '"
    );

?>

<div class="sidebar-wrapper">
    <ul class="nav">
        <li <?=$_li1['dashboard']?> >
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
            <div style="margin-left:10px;" <?=$_div1['academics']?> id="academics">
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
                    <!-- <li <?=$_li2['assignment']?>>
                        <a href="<?= base_url('assignment'); ?>">Assignments</a>
                    </li> -->
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
                        <a href="<?= base_url('attendance/student'); ?>">Student Attendance</a>
                    </li>
                    <li <?=$_li2['teacher']?> >
                        <a href="<?= base_url('attendance/teacher'); ?>">Teacher Attendance</a>
                    </li>
                    <li <?=$_li2['attendance_report']?> >
                        <a data-toggle="collapse" href="#attendance_report" <?=$_a2['attendance_report']?> >
                            Reports<b class="caret"></b>
                        </a>
                        <div style="margin-left:20px;" <?=$_div2['attendance_report']?> id="attendance_report">
                            <ul class="nav">
                                <li <?=$_li3['attendance_rep_student']?> ><a href="<?=base_url('attendance/report/student')?>">Student</a></li>
                                <li <?=$_li3['attendance_rep_teacher']?> ><a href="<?=base_url('attendance/report/teacher')?>">Teacher</a></li>
                            </ul>
                        </div>
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
                                    
                                <li <?=$_li3['fee_type']?> ><a href="<?= base_url('fees')?>">Fee Category</a></li>
                                <li <?=$_li3['fine_type']?> ><a href="<?= base_url('fees/fine')?>">Fine Category</a></li>
                                <li <?=$_li3['fee_invoice']?>><a href="<?= base_url('fees/invoice')?>">Invoice</a></li>
                                <li <?=$_li3['paymenthistory']?>><a href="<?= base_url('fees/paymenthistory')?>">Payment History</a></li>
                                <!-- <li <?=$_li3['fee_balance']?> ><a href="<?= base_url('fees/balance')?>">Balance History</a></li>
                                <li><a href="#">Expense History</a></li> -->
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>

        <li <?=$_li1['exam'];?>>
            <a data-toggle="collapse" href="#exam" <?=$_a1['exam']?>>
                <i class="material-icons">assignment</i>
                <p>Exam<b class="caret"></b></p>
            </a>
             <div style="margin-left:10px;" <?=$_div1['exam']?> id="exam">
                <ul class="nav">
                    <li <?=$_li2['exam_name']?>>
                        <a href="<?=base_url('exam');?>">Exam</a>
                    </li>
                    <li <?=$_li2['exam_schedule']?>>
                        <a href="<?= base_url('exam/schedule')?>">Exam Schedule</a>
                    </li>
                    <li <?=$_li2['mark']?>>
                        <a href="<?=base_url('marks');?>">Marks</a>
                    </li>
                    <li <?=$_li2['promotion']?>>
                        <a href="<?= base_url('marks/promotion')?>">Promotion</a>
                    </li>
                    <!-- <li <?=$_li2['exam_report']?>>
                        <a href="<?= base_url('exam/report')?>">Reports</a>
                    </li> -->
                </ul>
            </div>
        </li>

        <!-- <li <?=$_li1['marks'];?>>
            <a data-toggle="collapse" href="#marks" <?=$_a1['marks']?>>
                <i class="material-icons">assignment</i>
                <p>Marks<b class="caret"></b></p>
            </a>
             <div style="margin-left:10px;" <?=$_div1['marks']?> id="marks">
                <ul class="nav">
                    <li <?=$_li2['mark']?>>
                        <a href="<?=base_url('marks');?>">Marks</a>
                    </li>
                    <li <?=$_li2['percentage']?>>
                        <a href="<?= base_url('marks/percentage')?>">Percentage</a>
                    </li>
                    <li <?=$_li2['promotion']?>>
                        <a href="<?= base_url('marks/promotion')?>">Promotion</a>
                    </li>
                </ul>
            </div>
        </li> -->

        
        <li class="">
            <a data-toggle="collapse" href="#leave_application" aria-expanded="false">            
                <i class="material-icons">border_color</i>
                <p>Leave Application<b class="caret"></b></p>
            </a>
            <div class="collapse " id="leave_application">
                <ul class="nav">
                    <li class="">
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

        <li <?=$_li1['administrator'];?> >
            <a data-toggle="collapse" href="#Administrator" <?=$_a1['administrator']?> >
                <i class="material-icons">account_circle</i>
                <p>Administrator
                    <b class="caret"></b>
                </p>
            </a>
            <div <?=$_div1['administrator']?> id="Administrator">
                <ul class="nav">
                    <li <?=$_li2['academic_year']?>>
                        <a href="<?=base_url()?>administrator/academic_year">Academic Year</a>
                    </li>
                    <li <?=$_li2['systemadmin']?>>
                        <a href="<?=base_url()?>administrator/systemadmin">System Admin</a>
                    </li>
                    <li <?=$_li2['resetpwd']?>>
                        <a href="<?=base_url()?>administrator/resetpwd">Reset Password</a>
                    </li>
                    <li>
                        <a href="pages/pricing.html">Import</a>
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