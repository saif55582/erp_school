<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Exam</h4>
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar              -->
                            <a href="<?= base_url('exam/add')?>">
                                <button class="btn btn-md btn-success btn-wd"> <i class="material-icons">library_add</i> Add Exam</button>
                            </a>

                        </div>
                        <div class="material-datatables">
                            <table n="exam" id="datatables" class="mytable table table-striped table-no-bordered table-hover export" cellspacing="0" width="100%" style="width:100%">
                                <thead class="text-rose">
                                    <tr>    
                                        <th>Exam Name</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Exam Name</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <input type="hidden" value="<?=base_url()?>" id='base'>
                                <tbody id="tbody">
                            <?php foreach ($exams as $exam): ?>
                                    <tr id="<?= $exam->examID?>" >
                                        <td><?=$exam->name?></td>
                                        <td><?=$exam->date?></td>
                                        <td><?=$exam->description?></td>
                                        <td class="text-center td-actions">
                                             <a href='<?=base_url()?>exam/edit/<?=base64_encode($exam->examID)?>'>
                                                <button type='button' rel='tooltip' class='btn btn-info mybtn'>
                                                    <i class='material-icons'>edit</i>
                                                </button>
                                            </a>
                                            <button id="<?= $exam->examID?>" cm="exam/dest" base="<?=base_url()?>" type="button" rel="tooltip" class="btn btn-danger mybtn pop">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
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


