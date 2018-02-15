<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Exam Schedule</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                             <a href="<?= base_url();?>exam/add_schedule" >
                                <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Exam Schedule
                                </button>
                             </a>
                            <div class="col-md-12" style="background-color: #eee; border-radius: 5px; border: solid 1px #b11919;">
                                <div class="row">
                                    
                                    <div id="form_add_marks">

                                        <div onclick="setFocus()" class="col-sm-3 mytargetchange">
                                           <select name="examID" id="exam_sel" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Exam" required>
                                                <?php
                                                    foreach($exams as $exam):

                                                        if($examID == $exam->examID)
                                                            echo "<option selected value='".base64_encode($exam->examID)."'>".strtoupper($exam->name)."</option>";
                                                        else
                                                            echo "<option value='".base64_encode($exam->examID)."'>".strtoupper($exam->name)."</option>";
                                                    endforeach;
                                                ?>
                                            </select>
                                        </div> 

                                        <div onclick="setFocus()" class="col-sm-2 mytargetchange">
                                            <select name="classesID" id="class" onchange="getSection(this.value,'<?=base_url()?>');getSubjectOptions(this.value,'<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class" required>
                                                <?php
                                                    foreach($classes as $class):
                                                            if($classesID == $class->classesID) 
                                                                echo "<option selected value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                                            else
                                                                echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                                    endforeach;

                                                ?>
                                            </select>
                                        </div>

                                        <button id="proceed" class="btn btn-rose pull-right btn-sm" style="margin-right: 20px;">
                                            Proceed
                                        </button>
                                    </div>
                                </div>
                            </div>
                           

                        </div>
                        <div class="material-datatables">
                             <table n="exam_schedule" id="" class="mytable table table-striped table-no-bordered table-hover datatables 
                              <?=$exam_schedule ? 'export_all' : ''?>" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-primary">
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Time From</th>
                                    <th>Time To</th>
                                    <th>Room</th>
                                </thead>
                                <tbody id="tbody">
                                <?php  if($exam_schedule): ?>
                                <?php 

                                    foreach(unserialize($exam_schedule->data) as $data): ?>                             
                                    <tr>
                                        <td>
                                            <?=$this->mylibrary->getSubjectParam($data['subjectID'], 'subject_name')?>      
                                                                           
                                        </td>
                                        <td>
                                            <?=$data['date']?>
                                        </td>
                                        <td>
                                            <?=$data['time_from']?>
                                        </td>
                                        <td>
                                            <?=$data['time_to']?>
                                        </td>
                                        <td>
                                            <?=$data['room']?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <?php endif; ?>
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

