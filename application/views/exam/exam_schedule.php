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
                            <a href="<?= base_url();?>exam/add_schedule" <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Exam Schedule</button></a>

                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select name="sectionID" id="sec" onchange="getExamSchedule ($('#class').val(),this.value,'<?=base_url()?>');" class="selectpicker" data-style="select-with-transition" title="Select Section">
                                    <option value="">Select Section</option>
                                </select>
                                <?php
                                ?>
                            </div>


                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select name="classesID" id="class" onchange="getSection(this.value,'<?=base_url()?>',null);getExamSchedule(this.value,null,'<?=base_url()?>');" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                    <?php
                                    
                                        foreach($classes as $class):
                                                echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";
                                        endforeach;

                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="material-datatables">
                            <table n="exam_schedule" id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>Exam Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Room</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Exam Name</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Room</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                          <!--  <?php foreach ($exam_schedules as $exam): ?>
                                    <tr id="<?= $exam->examID?>" >
                                        <td><?=$this->mylibrary->getExamParam($exam->examID, 'name')?></td>
                                        <td><?=$this->mylibrary->getClassName($exam->classesID)?></td>
                                        <td><?=$this->mylibrary->getSectionName($exam->sectionID)?></td>
                                        <td><?=$this->mylibrary->getSubjectParam($exam->subjectID, 'subject_name')?></td>
                                        <td><?=date('d-M-y', strtotime($exam->date))?></td>
                                        <td><?=date('h:i A', strtotime($exam->time_from)).' - '.date('h:i A', strtotime($exam->time_to))?></td>
                                        <td><?=$exam->room?></td>
                                        <td class="text-center  td-actions">
                                             <a href='<?=base_url()?>exam/edit/<?=base64_encode($exam->examID)?>'>
                                                <button type='button' rel='tooltip' class='btn btn-info mybtn'>
                                                    <i class='material-icons'>edit</i>
                                                </button>
                                            </a>
                                            
                                            <button id="<?= $exam->examID ?>" cm="exam/dest_schedule" base="<?=base_url()?>" type="button" rel="tooltip" class="btn btn-danger mybtn pop">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                            <?php endforeach; ?> -->
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

