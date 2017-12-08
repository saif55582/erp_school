<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Syllabus</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <a href="<?= base_url('Syllabus/add')?>">
                                <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Syllabus</button>
                            </a>
    
                            <div onclick="setFocus();" class="col-md-3 mytargetchange" style="float:right;">
                                <select id="get_rows" base="<?=base_url()?>" act="syllabus/getRows" name="classesID"  data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                    <?php
                                        foreach ($classes as $class) {
                                            echo "<option value='".base64_encode($class->classesID)."'>".strtoupper($class->class_name)."</option>";                                      
                                        }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>Title</th>
                                        <th>Class</th>
                                        <th>Description</th>
                                        <th>File</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Class</th>
                                        <th>Description</th>
                                        <th>File</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                    <?php
                                    foreach($syllabuses as $syllabus) :?>
                                    <tr id="<?=$syllabus->syllabusID?>">
                                        <td><?=$syllabus->title?></td>
                                        <td>
                                            <?php
                                                echo $this->mylibrary->getClassName($syllabus->classesID);
                                            ?>
                                        </td>
                                        <td><p><?=$syllabus->description?></td>
                                        <td>
                                            <?php
                                                $instituteID = $this->session->userdata('instituteID');
                                            ?>
                                            <a rel="tooltip" href="<?=base_url()?>main_asset/school_docs/<?=$instituteID?>/data/<?=$syllabus->file?>" download="<?=$syllabus->file?>" >
                                                <span style="color:seagreen"  class="material-icons">file_download</span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href='<?=base_url()?>syllabus/edit/<?=base64_encode($syllabus->syllabusID)?>'>
                                                <button type='button' rel='tooltip' class='btn btn-info mybtn'>
                                                <i class='material-icons'>edit</i>
                                                </button>
                                            </a>
                                            <button id="<?= $syllabus->syllabusID?>" cm="syllabus/dest" base="<?=base_url()?>" type="button" rel="tooltip" class="btn btn-danger mybtn pop">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>

                                    <?php
                                    endforeach;
                                    ?>
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