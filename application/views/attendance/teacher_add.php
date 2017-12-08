 <div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Add/Edit Attendance</h4>

                        <form method="post" id="form_teacher" class="classform form-horizontal">
                            <div class="row">

                                    <div class="form-group label-floating col-md-3">
                                        <input type="text" id='d' name="date" class="form-control datepicker" placeholder="Select Date"/>
                                    </div>

                                    <button type="submit" class="btn btn-rose btn-sm">Fetch</button>     
                               
                            </div>
                        </form>



                        <div class="material-datatables">
                            <table id="datatable" class="mytable table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <buitton class="btn btn-sm btn-success" onclick="present_all()" id="pa" style="float:right;display:none">All Present</buitton>
                                
                                <h3 style="display:none" id="setd"></h3>
                                <thead class="text-rose">
                                    <tr width="100%">    
                                        <th width='15%'>Photo</th>
                                        <th width='13%'>Name</th>
                                        <th width='13%'>Designation</th>
                                        <th width='12%'>Email</th>
                                        <th width='12%'>Phone</th>
                                        <th width='40%' class="disabled-sorting text-center ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody id="tbody">
                                                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>