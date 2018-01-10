<?php

	error_reporting(0);

	$subtotal     = $fee->total;

	$concession   = $this->mylibrary->getFeeListParam($fee->concession_type, 'discount');

	$discount     = ($subtotal * $concession) / 100;

	$grandtotal   = $subtotal - $discount;

	$ttl_fx_fine  = 0;
	$ttl_inc_fine = 0;
	foreach ($fee_fine as $fine) {

		$classesID = unserialize($fine->classesID);

		for ($i=0; $i < count($classesID); $i++) { 
			
			if (base64_decode($classesID[$i]) == $fee->classesID) {
				
				$fee_list = unserialize($fee->fee_value);

				foreach ($fee_list as $key => $value) {

					if($key == $fine->fee_listID){

						if ($fine->fine_type == 'Fixed') {

							if ((date('Y-m-d') >= $fine->fsf) && (($subtotal - $discount) > $fee->pay_money)) {
								$ttl_fx_fine += $fine->amount;
							}

						}
						if ($fine->fine_type == 'Incremental') {
							
							if ($fine->incrementby == 'Monthly') {
								
								if (strtotime(date('Y-m-d')) >= strtotime($fine->fsf)) {

							
									$interval = date_diff(date_create($fine->fsf), date_create(date('Y-m-d')));
									$days = $interval->format('%a') + 1;
									
									$month = intval($days / 30);

									if ($days % 30) {
										$month += 1;
									}
									
									$ttl_inc_fine += $month * $fine->amount;
								}
							}
							if ($fine->incrementby == 'Per Day') {
								
								if (strtotime(date('Y-m-d')) >= strtotime($fine->fsf)) {

							
									$interval = date_diff(date_create($fine->fsf), date_create(date('Y-m-d')));
									$days = $interval->format('%a');

									$ttl_inc_fine = $fine->amount * $days;
									

								}
							}
						}
					}
				}

			}

		}
		
	}

	$totalfine = $ttl_fx_fine + $ttl_inc_fine;

	if ($grandtotal > $fee->pay_money) {
		
		$grandtotal += $totalfine;
	}

	$deuamount    = $grandtotal - ($fee->pay_money);

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



                        	<div class="col-sm-6" align="left">



	                        	<p>

	                        		<?php

		                        	if($student->photo == 'default.png') {

		                            	echo"<img  class='img img-thumbnail' src='".base_url()."/main_asset/assets/img/default.png' alt='photo' style='width:30%;margin-left:20px;'>";

		                            }

		                            else {

		                            	echo"<img class='img img-thumbnail' src='".base_url()."/main_asset/school_docs/".$this->session->userdata('instituteID')."/student/".$student->photo."' alt='photo'  style='width:30%;margin-left:20px;'>";



		                            }

	                            ?>

	                        	</p>

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



	                    	<div class="col-sm-6">

	                    		<div style="background-color: #b11919; color: #fff; font-weight: bold; border-radius: 2px; text-align: center;padding: 10px;">Payment History of <?= $fee->month?>.</div>

	                    		<table class="table table-striped table-hover" width="100%" style="width:100%">



                                    <thead class="text-rose">



                                        <tr>    

                                            <th>Amount</th>



                                            <th>Date</th>



                                            <th>Action</th>



                                        </tr>



                                    </thead>



                                    <tfoot>



                                        <tr>

                                            <th>Amount</th>



                                            <th>Date</th>



                                            <th>Action</th>



                                        </tr>



                                    </tfoot>



                                    <tbody id="tbody">

                                        <?php 

                                            $pay_details = unserialize($fee->pay_details); 

                                            if($pay_details != ''){    

                                                foreach ($pay_details as $payment) { 

                                                    foreach($payment as $date => $amount) { ?>

                  

                                                    <tr>

                                                        <td>₹ <?= $amount ?></td>

                                                        <td><?= date('d-M-y', strtotime($date)) ?></td>

                                                        <td>

                                                            <a href="">



                                                                <button type="button" class="btn btn-info mybtn"><i class="material-icons">receipt</i></button>



                                                            </a>

                                                        </td>

                                                    </tr>

                                                

                                        <?php }  } }?>

                                    </tbody>



                                </table>

	                    	</div>



	                    	<div class="col-sm-6">



	                    		<div class="row" style="background-color: #eee; border-radius: 5px; border: solid 1px #b11919; padding: 20px;">



	                    			<div class="col-sm-6 col-xs-6">Sub Total</div>



	                    			<div class="col-sm-3 col-xs-3">:</div>



	                    			<div class="col-sm-3 col-xs-3" align="right">₹ 

	                    				<?= $subtotal ?>

	                    			</div>







	                    			<div class="col-sm-6 col-xs-6">Concession</div>



	                    			<div class="col-sm-3 col-xs-3">:</div>



	                    			<div class="col-sm-3 col-xs-3" align="right"><?= $concession ?>%</div>







	                    			<div class="col-sm-6 col-xs-6">Discount Amount</div>



	                    			<div class="col-sm-3 col-xs-3">:</div>



	                    			<div class="col-sm-3 col-xs-3" align="right">₹ <?= $discount ?></div>



									

									<div class="col-sm-6 col-xs-6">Fine Amount</div>


									<div class="col-sm-3 col-xs-3">:</div>


									<div class="col-sm-3 col-xs-3" align="right">₹ <?= $totalfine ?></div>



	                    			<div class="col-sm-6 col-xs-6"><strong>Grand Total (INR)</strong></div>



	                    			<div class="col-sm-3 col-xs-3">:</div>



	                    			<div class="col-sm-3 col-xs-3" align="right"><strong>₹ <?= $grandtotal ?></strong></div>



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

											<?= $deuamount ?>

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



									<input type="text" class="form-control" value="<?= $deuamount ?>" readonly="true">



								</div>



							</div>



							<div class="form-group">



								<label class="control-label col-sm-3" for="pwd">Pay Amount</label>



								<div class="col-sm-9"> 


									<?php

										if ($deuamount == 0) {
											
											echo'<input type="number" name="payamnt" class="form-control" required="true" disabled="true">';
										}
										else{

											echo'<input type="number" max="'.$deuamount.'" name="payamnt" class="form-control" required="true">';
										}
									?>



									



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