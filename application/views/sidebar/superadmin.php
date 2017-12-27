<?php
    $_li1 = array(
        'dashboard'=>($li1 == 'dashboard' ) ? "class='active'" : "class=' '",
        'institute'=>($li1 == 'institute' ) ? "class='active'" : "class=' '",
        'teacher'=>($li1 == 'teacher' ) ? "class='active'" : "class=' '",
        'academics'=>($li1 == 'academics' ) ? "class='active'" : "class=' '",
        'attendance'=>($li1 == 'attendance' ) ? "class='active'" : "class=' '",
        'finance'=>($li1 == 'finance' ) ? "class='active'" : "class=' '",
        'administrator'=>($li1 == 'administrator' ) ? "class='active'" : "class=' '"
    );
    $_a1 = array(
         'academics'=>($a1 == 'academics' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'attendance'=>($a1 == 'attendance' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'finance'=>($a1 == 'finance' ) ? "aria-expanded='true' " : "aria-expanded='false' ",
         'administrator'=>($a1 == 'administrator' ) ? "aria-expanded='true' " : "aria-expanded='false' "
    );

    $_div1 = array(
        'academics'=>($div1 == 'academics') ? "class='collapse in'" : "class='collapse'",
        'attendance'=>($div1 == 'attendance') ? "class='collapse in'" : "class='collapse'",
        'finance'=>($div1 == 'finance') ? "class='collapse in'" : "class='collapse'",
        'administrator'=>($div1 == 'administrator') ? "class='collapse in'" : "class='collapse'"
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
        'attendance_report'=>($li2 == 'attendance_report' ) ? "class='active'" : "class=' '"
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
        'fee_invoice'=>($li3 == 'fee_invoice' ) ? "class='active'" : "class=' '"
    );

?>

<div class="sidebar-wrapper">
    <ul class="nav">
        
        <li <?=$_li1['dashboard']?> >
            <a href="<?=base_url('superdashboard');?>">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>

        <li <?=$_li1['institute']?> >
            <a href="<?=base_url('superinstitute');?>">
                <i class="material-icons">school</i>
                <p>Institutes</p>
            </a>
        </li>
        
    </ul>
</div>