<div  class="content">
    <div class="container-fluid">
    	<div class="row">
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
                        <h4 class="card-title"><strong><?= $student -> f_name.' '.$student -> l_name ?></strong></h4>
                        <h6 class="category text-gray">Class : <?= $this->mylibrary->getClassName($student->classesID); ?></h6>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">receipt</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title"><strong>Marks</strong></h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                            <div class="col-md-12" style="background-color: #eee; border-radius: 5px; border: solid 1px #b11919;">
                                <div class="row">
                                    <div id="form_get_marks">
                                        <button style="float:right !important;" id="proceed" class="btn btn-rose pull-right btn-sm" style="margin-right: 30px;">
                                            Proceed
                                        </button>
                                        <input type="hidden" id="marks_list" value="<?=$marks_listID?>">
                                        <div style="float:right !important;" onclick="setFocus()" class="col-sm-3 mytargetchange">
                                           <select  name="examID" id="exam_sel" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Exam" required>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="material-datatables">
                            <table n="students" id="" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr width="100%">    
                                        <th width="20%">Subject ID</th>
                                        <th width="20%">Subject </th>
                                        <th width="20%" class="disabled-sorting text-center">Marks</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                                <form method='get' id='marks_submit'>
                                    <tbody id="tbody">
                                     <!-- <?php
                                         $i = 0;
                                         if($examID) {
                                            foreach($students as $student) { ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                            if($student->photo == 'default.png') {
                                                            echo "<img src='".base_url()."/main_asset/assets/img/default.png' alt='' class='img img-' style='width:50px'>";
                                                            }
                                                            else {
                                                            echo "<img src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/student/".$student->photo."' alt='' class='img' style='width:60px'>";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?=strtoupper($student->f_name.' '.$student->l_name)?></td>
                                                    <td><?=$student->roll_no?></td>
                                                    <td><?=$student->reg_no?></td>
                                                    <td class='text-center td-actions'>
                                                        <input type='text' value='<?=$m_array[$i]?>' id='marks_obtained'>
                                                        <input type='hidden' id='student' value='<?=base64_encode($student->studentID*786786)?>'>
                                                    </td>
                                                </tr>    
                                      <?php 
                                            $i++;
                                            }
                                        }
                                        ?> -->
                                        
                                    </tbody>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>