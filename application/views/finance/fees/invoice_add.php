<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-offset-2">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
						<h4 class="card-title my-title">Add Invoice</h4>
                        <form method="post" class="classform form-horizontal">
                    		<div class="row">

                            	<div onclick="setFocus();" class="col-sm-6 col-sm-6 mytargetchange">
                                    <select name="classesID" id="class" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
                                        <option>Hello</option>
                                        <option>Sello</option>
                                        <option>Gello</option>
                                        <option>Kello</option>
                                    </select>
                                </div>

                                <div onclick="setFocus();" class="col-sm-6 col-sm-6 mytargetchange">
                                    <select name="studentID" id="class" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Student">
                                        <option>All</option>
                                        <option>Hello</option>
                                        <option>Sello</option>
                                        <option>Gello</option>
                                        <option>Kello</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Library Fee</label>
                                        <input type="text" value="<?=set_value('name')?>" name="name" class="form-control up_case">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Monthly Fee</label>
                                        <input type="text" value="<?=set_value('name')?>" name="name" class="form-control up_case">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Computer Fee</label>
                                        <input type="text" value="<?=set_value('name')?>" name="name" class="form-control up_case">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">FINE</label>
                                        <input type="text" value="<?=set_value('name')?>" name="name" class="form-control up_case">
                                    </div>
                                </div>
                                
                            </div>
		                    <button type="submit" class="btn btn-rose pull-right btn-sm">Add</button>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>