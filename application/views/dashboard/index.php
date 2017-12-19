<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">school</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Students</p>
                        <h3 class="card-title"><?=count($students)?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            
                        </div>
                    </div>
                </div>
            </div>
           <!--  <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Parents</p>
                        <h3 class="card-title">120</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Teacher</p>
                        <h3 class="card-title"><?=count($teachers)?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Subject</p>
                        <h3 class="card-title"><?=count($subjects)?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>