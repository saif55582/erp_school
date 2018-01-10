<div  class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title my-title">Fee Collection</h4>

                        <form>
                        	
                        	<div class="row">
	                        	<div onclick="setFocus();" class="col-md-4 col-sm-4 mytargetchange">
	                                <select name="classesID" id="class" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Class">
	                                    <option>Hello</option>
	                                    <option>Sello</option>
	                                    <option>Gello</option>
	                                    <option>Kello</option>
	                                </select>
	                            </div>

	                            <div onclick="setFocus();" class="col-md-4 col-sm-4 mytargetchange">
	                                <select name="sectionID" id="class" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Section">
	                                    <option>Hello</option>
	                                    <option>Sello</option>
	                                    <option>Gello</option>
	                                    <option>Kello</option>
	                                </select>
	                            </div>

	                            <div onclick="setFocus();" class="col-md-4 col-sm-4 mytargetchange">
	                                <select name="studentID" id="class" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Student">
	                                    <option>Hello</option>
	                                    <option>Sello</option>
	                                    <option>Gello</option>
	                                    <option>Kello</option>
	                                </select>
	                            </div>
	                        </div>

							<div class="row">
								<div onclick="setFocus();" class="col-md-4 col-sm-4 mytargetchange">
	                                <select name="feeID" id="class" data-live-search="true" class="selectpicker" data-style="select-with-transition" title="Select Category">
	                                    <option>Hello</option>
	                                    <option>Sello</option>
	                                    <option>Gello</option>
	                                    <option>Kello</option>
	                                </select>
	                            </div>

	                            <div class="col-md-4 col-sm-4 mytargetchange">
	                                <div class="form-group label-floating is-empty">
	                                    <label class="control-label">Payment Date</label>
	                                    <input onfocusout="getAge(this.value)" value="" type="text" name="pay_date" class="form-control datepicker"/>
	                                </div>
	                            </div>

	                            <div class="col-md-4 col-sm-4">
	                                <select onchange="PaymentMode(this.value)" name="payment_mode" id="pay_mode" class="selectpicker" data-style="select-with-transition" title="Payment Mode">
	                                    <option value="Cash">Cash</option>
	                                    <option value="DD">Demand Draft</option>
	                                    <option value="Cheque">Cheque</option>
	                                </select>
	                            </div>
	                        </div>

							<div class="row" id="cheque_block" style="display: none;">
	                            <div class="col-md-4 col-sm-4">
	                                <div class="form-group label-floating is-empty">
	                                    <label class="control-label">Cheque Number</label>
	                                    <input type="text" value="" name="cheque_no" class="form-control">
	                                </div>
	                            </div>

	                            <div class="col-md-4 col-sm-4 mytargetchange">
	                                <div class="form-group label-floating is-empty">
	                                    <label class="control-label">Cheque Date</label>
	                                    <input onfocusout="getAge(this.value)" value="" type="text" name="cheque_date" class="form-control datepicker"/>
	                                </div>
	                            </div>

	                            <div class="col-md-4 col-sm-4">
	                                <div class="form-group label-floating is-empty">
	                                    <label class="control-label">Payable</label>
	                                    <input type="text" value="" name="payable" class="form-control">
	                                </div>
	                            </div>
							</div>

							<div class="row" id="dd_block" style="display: none;">
	                            <div class="col-md-6 col-sm-6">
	                                <div class="form-group label-floating is-empty">
	                                    <label class="control-label">DD Number</label>
	                                    <input type="text" value="" name="dd_no" class="form-control">
	                                </div>
	                            </div>

	                            <div class="col-md-6 col-sm-6 mytargetchange">
	                                <div class="form-group label-floating is-empty">
	                                    <label class="control-label">DD Date</label>
	                                    <input onfocusout="getAge(this.value)" value="" type="text" name="dd_date" class="form-control datepicker"/>
	                                </div>
	                            </div>
	                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>