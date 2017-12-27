<?php
	error_reporting(0);
	$subtotal = $fee->total;
	$concession = $this->mylibrary->getFeeListParam($fee->concession_type, 'discount');
	$discount = ($subtotal * $concession) / 100;
?>
<div class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                	<div style="margin: 20px;">

                		<!-- <button class="btn btn-rose btn-sm card-title my-title">Print Receipt <i class="material-icons">print</i></button> -->

                	</div>

                    <div class="card-content">

	                    <div class="row">

	                    	<div class="col-sm-2 col-sm-offset-5" align="center">

	                        	<img src="../../main_asset/assets/img/logo.png" alt="img">

	                        </div>

	                    </div>

                        <div class="row">

                        	<div class="col-sm-6" align="left">

	                        	<p><img src="../../main_asset/assets/img/default-avatar.png" alt="img" style="width: 30%;"></p>

								<div class="col-sm-6">Name</div>
								<div class="col-sm-6">: 
									<?= $this->mylibrary->getStudentParam($fee->studentID,'f_name') ?>
                                    <?= $this->mylibrary->getStudentParam($fee->studentID,'l_name') ?>
								</div>

								<div class="col-sm-6">Class</div>
								<div class="col-sm-6">: 
									<?= $this->mylibrary->getClassName($fee->classesID) ?>
								</div>

								<div class="col-sm-6">Section</div>
								<div class="col-sm-6">: 
									<?= $this->mylibrary->getSectionName($student->sectionID) ?>
								</div>

								<div class="col-sm-6">Roll</div>
								<div class="col-sm-6">: 
									<?= $student->roll_no ?>
								</div>

	                        </div>

	                        <div class="col-sm-6" align="right">

	                        	<p><strong>Invoice #70</strong></p>

	                        	<p>

	                        		Payment Status : 

	                        		<?php
                                        if($fee->pay_money == 0)
                                            echo'<button class="btn btn-danger btn-sm">Not Paid</button>';
                                        elseif($fee->pay_money < $fee->total)
                                            echo'<button class="btn btn-warning btn-sm">Partially Paid</button>';
                                        else
                                            echo '<button class="btn btn-info btn-sm">Paid</button>';
                                    ?>

	                        	</p>

	                        </div>

                        </div>

	                    <div class="row">

	                    	<div class="col-sm-12">

	                        	<div class="list-group hover">

	                        		<div class="list-group-item" style="background-color: #b11919; color: #fff;">

	                        			<span>Fee Type</span><span class="pull-right">Total</span>

	                        		</div>

	                        		<?php
	                        			$fee_list = unserialize($fee->fee_value);

	                        			foreach ($fee_list as $key => $value) {
		                        			if($value > 0){
		                        				echo'
													<a class="list-group-item">

					                        			<span>'.$this->mylibrary->getFeeListParam($key,'fee_type').'</span><span class="pull-right">'.$value.'</span>

					                        		</a>
		                        				';
		                        			}
	                        			}
	                        		?>
	                        		

								 </div>

	                        </div>

	                    </div>

	                    <div class="row">

	                    	<div class="col-sm-6"></div>

	                    	<div class="col-sm-6">

	                    		<div class="row" style="background-color: #eee; border-radius: 5px; border: solid 1px #b11919; padding: 20px;">

	                    			<div class="col-sm-6">Sub Total</div>

	                    			<div class="col-sm-3">:</div>

	                    			<div class="col-sm-3" align="right">₹ 
	                    				<?= $subtotal ?>
	                    			</div>



	                    			<div class="col-sm-6">Concession</div>

	                    			<div class="col-sm-3">:</div>

	                    			<div class="col-sm-3" align="right"><?= $concession ?>%</div>



	                    			<div class="col-sm-6">Discount Amount</div>

	                    			<div class="col-sm-3">:</div>

	                    			<div class="col-sm-3" align="right">₹ <?= $discount ?></div>



	                    			<div class="col-sm-6"><strong>Grand Total (INR)</strong></div>

	                    			<div class="col-sm-3">:</div>

	                    			<div class="col-sm-3" align="right"><strong>₹ <?= $subtotal - $discount ?></strong></div>

	                    		</div>



	                    		<div class="row">

	                    			<div class="col-sm-12 bg-success" style="margin-top: 10px; margin-bottom: 10px; padding: 10px; border: solid 1px #b11919; border-radius: 5px;">

	                    				<strong>Paid Amount</strong><strong class="pull-right">₹ 
	                    					<?= ($fee->pay_money); ?>
	                    				</strong>

	                    			</div>

	                    			<div class="col-sm-12 bg-danger" style="margin-top: 10px; margin-bottom: 10px; padding: 10px; border: solid 1px #b11919; border-radius: 5px;">

	                    				<strong>Due Amount (INR)</strong>
	                    				<strong class="pull-right">₹ 
											<?= ($subtotal - $discount) - ($fee->pay_money); ?>
	                    				</strong>

	                    			</div>

	                    		</div>



	                    		<button class="btn btn-rose pull-right" data-toggle="modal" data-target="#myModal">

	                    			Collect Fee <i class="material-icons">fast_forward</i>

	                    		</button>

	                    	</div>

	                    </div>

                    </div>

                    <!-- end content-->

                </div>

                <!--  end card  -->

            </div>

        </div>

        <!-- end row -->

        <!-- Classic Modal -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                            <i class="material-icons">clear</i>

                        </button>

                        <h4 class="modal-title"><strong>Collect Fee</strong></h4>

                    </div>

                    <div class="modal-body">

						<form method="post" class="form-horizontal" action="<?= base_url('fees/payamount') ?>">

							<input type="hidden" name="id" value="<?= $fee->fee_allocationID ?>">

							<div class="form-group">

								<label class="control-label col-sm-3">Grand Total</label>

								<div class="col-sm-9">

									<input type="text" class="form-control" value="<?= ($subtotal - $discount) - ($fee->pay_money); ?>" readonly="true">

								</div>

							</div>

							<div class="form-group">

								<label class="control-label col-sm-3" for="pwd">Pay Amount</label>

								<div class="col-sm-9"> 

									<input type="text" name="payamnt" class="form-control" required="true">

								</div>

							</div>

							<div class="form-group"> 

								<div class="col-sm-offset-2 col-sm-10">

									<button type="submit" class="btn btn-rose pull-right btn-sm">Submit</button>

								</div>

							</div>

						</form>

                    </div>

                </div>

            </div>

        </div>

        <!--  End Modal -->

    </div>

</div>