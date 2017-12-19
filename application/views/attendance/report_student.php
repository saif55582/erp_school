<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">insert_chart</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Student Attendance Report</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                            <div class="row">
                                <form id="report_form" metho="post" >
                                    
                                    <input name="user" value="1" type="hidden">

                                    <div onclick="setFocus();" class="col-md-2 mytargetchange">
                                        <select name="classesID" id="class" onchange="getSection(this.value,'<?=base_url()?>',null);" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                            <?php
                                            
                                                foreach($classes as $class):
                                                        echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                                endforeach;

                                            ?>
                                        </select>
                                    </div>

                                    <div onclick="setFocus();" class="col-md-2 mytargetchange" >
                                        <select name="sectionID" id="sec" class="selectpicker" data-style="select-with-transition" title="Select Section">
                                            <option value="">Select Class First</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <select class="selectpicker" id='export_year' name="year" data-style="select-with-transition" title="Select Year">
                                            <?php
                                            foreach($years as $year) {

                                                echo "<option value='".$year."'>".$year."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div onclick="setFocus();" class="col-lg-2 col-md-2 col-sm-2">
                                        <select class="selectpicker" id='export_month' name="month" data-style="select-with-transition" title="Select Month">
                                            <option value="01">January </option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July </option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November </option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button base="<?=base_url()?>" class="btn btn-sm btn-rose">Get Report</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div style="overflow-x: scroll;" class="myscroll material-datatables">
                            <table id='mytable' n="student_att_rep" class="table table-responsive table-hover table-bordered">
                            <thead> 
                                <tr>
                                    <td>Roll</td>
                                    <td>Name</td>
                                    <?php

                                        $i = 1;
                                        while ($i <= 31) {
                                            echo'<td>'.$i.'</td>';$i ++;
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>