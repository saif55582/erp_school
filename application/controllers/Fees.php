<?php



defined('BASEPATH') or exit('No direct scripting allowed');



class Fees extends MY_Controller {



	function __construct() {

		parent::__construct();

		if($this->mylibrary->isLoggedIn() == FALSE)

			redirect('signin');

	}





	function index() {

		$fees = array(

			'instituteID'=>$this->session->userdata('instituteID'),

			'type' => 'fee'

		);

		$cons = array(

			'instituteID'=>$this->session->userdata('instituteID'),

			'type' => 'concession'

		);

		$this->data['fees'] = $this->fee_list_m->get_order_by_fee($fees);

		$this->data['concession'] = $this->fee_list_m->get_order_by_fee($cons);

		$this->data['title']      = 'Fee';

		$this->data['subview']    = 'finance/fees/fee_list';

		$this->data['script']     = 'finance/fees/fee_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'finance';

		$this->data['a1']         = 'finance';

		$this->data['div1']       = 'finance';

		$this->data['li2']        = 'fee';

		$this->data['a2']         = 'fee';

		$this->data['div2']       = 'fee';

		$this->data['li3']        = 'fee_type';

		$this->load->view('main_layout',$this->data);

	}



	function addfee(){



		if($_POST){

			

			$array = array(

				'instituteID' => $this->session->userdata('instituteID'),

				'type'        => $this->input->post('type'),

				'fee_type'     => $this->input->post('feetype'),

				'note'        => $this->input->post('note')

			);



			$this->fee_list_m->insertFee($array);

			$this->session->set_flashdata('result', 'fee_added');

			redirect('fees');

		}

	}

	function feeedit($id){

		

		$fee_listID = base64_decode($id)/169;

		$this->data['listID']     = $this->fee_list_m->get_single_fee(array('fee_listID' => $fee_listID));



		if($_POST){



			if($this->data['listID']->type == 'concession'){



				$array = array(



					'concession_type' =>$this->input->post('concession_type'),

					'discount' =>$this->input->post('discount'),

				);

				$this->fee_list_m->update_list($array,$fee_listID);

				$this->session->set_flashdata('result', 'cons_updated');

				redirect('fees');

			}else{



				$array = array(



					'fee_type' =>$this->input->post('fee_type'),

					'note' =>$this->input->post('note'),

				);

				$this->fee_list_m->update_list($array,$fee_listID);

				$this->session->set_flashdata('result', 'fee_updated');

				redirect('fees');

			}

		}else{

			

			$this->data['title']      = 'Edit List';

			$this->data['subview']    = 'finance/fees/fee_edit';

			$this->data['script']     = 'finance/fees/fee_js';

			$this->data['app_script'] = 'general.js';

			$this->data['li1']        = 'finance';

			$this->data['a1']         = 'finance';

			$this->data['div1']       = 'finance';

			$this->data['li2']        = 'fee';

			$this->data['a2']         = 'fee';

			$this->data['div2']       = 'fee';

			$this->data['li3']        = 'fee_type';

			$this->load->view('main_layout',$this->data);

		}



	}



	function deletefee($id=NULL) {



		$fee_listID = $this->input->post('param');



		$this->fee_list_m->deleteFee($fee_listID);

	}



	function addconcession(){

		if($_POST){

			$array = array(

				'instituteID'=>$this->session->userdata('instituteID'),

				'type'=>$this->input->post('type'),

				'concession_type'=>$this->input->post('concession'),

				'discount'=>$this->input->post('discount')

			);



			$this->fee_list_m->insertFee($array);

			redirect('fees');

		}

	}



	//----------------------------- Fine Statement -----------------------------//



	function fine(){

		if ($_POST) {
			
			$array11 = array(
				'instituteID'=> $this->session->userdata('instituteID'),
				'fee_listID' => $this->input->post('fee_listID'),
				'classesID'  => serialize($this->input->post('classesID')),
				'amount'     => $this->input->post('amount'),
				'fine_type'  => $this->input->post('fine_type'),
				'incrementby'=> $this->input->post('incrementby'),
				'fsf'        => $this->input->post('fsf')
			);

			/*print_r($array1);

			$array2 = array(
				'instituteID' => $this->session->userdata('instituteID'),
			);
			$fee_allocation = $this->fee_allocation_m->get_fee_allocation_by_where($array2);*/

			$this->session->set_flashdata('result', 'fine_added');

			$this->fee_fine_m->fee_fine_insert($array11);
		}

		$array1 = array(

			'instituteID' => $this->session->userdata('instituteID'),
			'type'        => 'fee',
		);

		$array2 = array(

			'instituteID' => $this->session->userdata('instituteID'),
		);

		$this->data['fee_list']   = $this->fee_list_m->get_all_list_where($array1);

		$this->data['class_list'] = $this->classes_m->get_order_by_classes($array2);

		$this->data['fee_fine']   = $this->fee_fine_m->get_fee_fine_by_where($array2);

		$this->data['title']      = 'Fine List';

		$this->data['subview']    = 'finance/fees/fine_list';

		$this->data['script']     = 'finance/fees/fee_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'finance';

		$this->data['a1']         = 'finance';

		$this->data['div1']       = 'finance';

		$this->data['li2']        = 'fee';

		$this->data['a2']         = 'fee';

		$this->data['div2']       = 'fee';

		$this->data['li3']        = 'fine_type';

		$this->load->view('main_layout',$this->data);

	}

	//----------------------------- Fine Edit -----------------------------//


	function fineedit($id){

		if ($_POST) {
			//$id = base64_decode($id)/169;
			$array11 = array(
				'instituteID'=> $this->session->userdata('instituteID'),
				'fee_listID' => $this->input->post('fee_listID'),
				'classesID'  => serialize($this->input->post('classesID')),
				'amount'     => $this->input->post('amount'),
				'fine_type'  => $this->input->post('fine_type'),
				'incrementby'=> $this->input->post('incrementby'),
				'fsf'        => $this->input->post('fsf')
			);
			
			$this->fee_fine_m->update_fee_fine($array11,base64_decode($id)/169);
		}

		$array1 = array(

			'instituteID' => $this->session->userdata('instituteID'),
			'type'        => 'fee',
		);

		$array2 = array(

			'instituteID' => $this->session->userdata('instituteID'),
		);

		$this->data['fine']   = $this->fee_fine_m->get_fee_fine_single(
										array('fee_fineID' => base64_decode($id)/169)
									);

		$this->data['fee_list']   = $this->fee_list_m->get_all_list_where($array1);

		$this->data['class_list'] = $this->classes_m->get_order_by_classes($array2);

		$this->data['fee_fine']   = $this->fee_fine_m->get_fee_fine_by_where($array2);

		$this->data['title']      = 'Fine Update';

		$this->data['subview']    = 'finance/fees/fine_edit';

		$this->data['script']     = 'finance/fees/fee_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'finance';

		$this->data['a1']         = 'finance';

		$this->data['div1']       = 'finance';

		$this->data['li2']        = 'fee';

		$this->data['a2']         = 'fee';

		$this->data['div2']       = 'fee';

		$this->data['li3']        = 'fine_type';

		$this->load->view('main_layout',$this->data);
	}

	//----------------------------- Fine Delete -----------------------------//

	function delete_fee_fine(){

		$fee_fineID = $this->input->post('param');



		$this->fee_fine_m->deleteFeeAlloc($fee_fineID);
	}

	//----------------------------- Payment Balance -----------------------------//


	function balance(){



		$usertype =  $this->session->userdata('loginusertype');



		$where = array(



			'instituteID'=>$this->session->userdata('instituteID')



		);



		$st_years = array();



		$student_year = $this->attendance_stud_m->get_attendance_stud_where($where); 



		foreach($student_year as $student) {



			$y =  date('Y',strtotime($student->month_year));



			array_push($st_years, $y);



		}



		$years = array_unique($st_years);



		$this->data['years'] = $years;



		$this->data['title']      = 'Balance';

		$this->data['subview']    = 'finance/fees/fee_balance';

		$this->data['script']     = 'finance/fees/fee_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'finance';

		$this->data['a1']         = 'finance';

		$this->data['div1']       = 'finance';

		$this->data['li2']        = 'fee';

		$this->data['a2']         = 'fee';

		$this->data['div2']       = 'fee';

		$this->data['li3']        = 'fee_balance';

		$this->load->view('main_layout',$this->data);

	}





	//----------------------------- Payment Invoice -----------------------------//







	function invoice(){



		if($_POST){



			$array = array(

				'instituteID'=>$this->session->userdata('instituteID'),

				'classesID'=>base64_decode($this->input->post('classesID')),

				'sectionID'=>base64_decode($this->input->post('sectionID')),

				'month'=>$this->input->post('month')

			);

			$this->data['student']    = $this->fee_allocation_m->get_fee_allocation_by_where($array);

			$this->data['number']     = 1;



		}else{

			$this->data['number']     = 0;

		}



			$class = array('instituteID'=>$this->session->userdata('instituteID'));



			$this->data['classes']    = $this->classes_m->get_order_by_classes($class);

			$this->data['title']      = 'Fee Invoice';

			$this->data['subview']    = 'finance/fees/fee_invoice';

			$this->data['script']     = 'finance/fees/fee_js';

			$this->data['app_script'] = 'general.js';

			$this->data['li1']        = 'finance';

			$this->data['a1']         = 'finance';

			$this->data['div1']       = 'finance';

			$this->data['li2']        = 'fee';

			$this->data['a2']         = 'fee';

			$this->data['div2']       = 'fee';

			$this->data['li3']        = 'fee_invoice';

			$this->load->view('main_layout',$this->data);	



	}



	function addinvoice() {



		$fee = array(

			'instituteID'=>$this->session->userdata('instituteID'),

			'type'=>'fee'

		);



		$cons = array(

			'instituteID'=>$this->session->userdata('instituteID'),

			'type'=>'concession'

		);



		$class = array('instituteID'=>$this->session->userdata('instituteID'));



		$this->data['classes']    = $this->classes_m->get_order_by_classes($class);

		$this->data['fees']       = $this->fee_list_m->get_order_by_fee($fee);

		$this->data['concession'] = $this->fee_list_m->get_order_by_fee($cons);

		$this->data['title']      = 'Add Invoice';

		$this->data['subview']    = 'finance/fees/invoice_add';

		$this->data['script']     = 'finance/fees/fee_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'finance';

		$this->data['a1']         = 'finance';

		$this->data['div1']       = 'finance';

		$this->data['li2']        = 'fee';

		$this->data['a2']         = 'fee';

		$this->data['div2']       = 'fee';

		$this->data['li3']        = 'fee_invoice';

		$this->load->view('main_layout',$this->data);

	}



	function insert_invoice(){



		$month    = $this->input->post('month');





		$instituteID   = $this->session->userdata('instituteID');

		$institute     = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));



		$fee_listID    = $this->input->post('fee_listID');

		$fee_typeValue = $this->input->post('fee_typeValue');



		$fee_value     = serialize(array_combine($fee_listID, $fee_typeValue));



		$all           = $this->input->post('all_student');



		$total = 0;

		for($i=0; $i<count($fee_typeValue); $i++){

			if($fee_typeValue[$i])

				$total += $fee_typeValue[$i];

		}



		if($all) {



			$invoice = 0;

			$where = array(

				'instituteID' => $this->session->userdata('instituteID'),

				'classesID'   => base64_decode($this->input->post('classesID'))

			);



			$students = $this->student_m->get_order_by_student($where);



			for ($i=0; $i < count($month); $i++) { 



				foreach($students as $student) {

					$array = array(

						'instituteID' => $this->session->userdata('instituteID'),

						'classesID'   => base64_decode($this->input->post('classesID')),

						'month'       => $month[$i],

						'studentID'	  => $student->studentID

					);



					$row = $this->fee_allocation_m->get_fee_allocation_by_where($array);

					

					if ($row) {

						

						$invoice += count($row);



						$this->session->set_flashdata('result', 'assigned');

						redirect('fees/addinvoice');



						break;

					}

				}

			}



			if(! $invoice){



				for ($i=0; $i < count($month); $i++) { 



					foreach($students as $student) {

						$array = array(

							'instituteID'    => $instituteID,

							'academic_yearID'=> $institute->academic_yearID,

							'classesID'      => base64_decode($this->input->post('classesID')),

							'studentID'		 => $student->studentID,

							'concession_type'=> $this->input->post('concession_type'),

							'month'          => $month[$i],

							'fee_value'      => $fee_value,

							'total'          => $total,

							'sectionID'      => $student->sectionID

						);

						$this->fee_allocation_m->allocate_fee_insert($array);



					}

				}



				$this->session->set_flashdata('result', 'invoice_added');

				redirect('fees/addinvoice');

			}

		}

		else{

			$invoice = 0;



			$where = array(

				'instituteID' => $this->session->userdata('instituteID'),

				'classesID'   => base64_decode($this->input->post('classesID'))

			);



			$students = $this->student_m->get_order_by_student($where);



			for ($i=0; $i < count($month); $i++) { 	

				$array = array(

					'instituteID' => $this->session->userdata('instituteID'),

					'classesID'   => base64_decode($this->input->post('classesID')),

					'studentID'		 => base64_decode($this->input->post('studentID')),

					'month'       => $month[$i]

				);

				$row = $this->fee_allocation_m->get_fee_allocation_by_where($array);

				

				if ($row) {

					$invoice += count($row);

					

					$this->session->set_flashdata('result', 'assigned');

					redirect('fees/invoice');

					

					break;

				}

			}

			if(! $invoice){



				for ($i=0; $i < count($month); $i++) { 



					$array = array(

						'instituteID'    => $instituteID,

						'academic_yearID'=> $institute->academic_yearID,

						'classesID'      => base64_decode($this->input->post('classesID')),

						'studentID'		 => base64_decode($this->input->post('studentID')),

						'concession_type'=> $this->input->post('concession_type'),

						'month'          => $month[$i],

						'fee_value'      => $fee_value,

						'total'          => $total,

						'sectionID'      => $student->sectionID

					);

					$this->fee_allocation_m->allocate_fee_insert($array);

				}

				

				$this->session->set_flashdata('result', 'invoice_added');

				redirect('fees/invoice');

			}



		}

	}


	//--------------------------------- Invoice View -------------------------//


	function view($id){



			$array = array('fee_allocationID' => base64_decode($id)/169);

			$this->data['fee']    = $this->fee_allocation_m->get_fee_allocation_single($array);



			$array2 = array('studentID' => $this->data['fee']->studentID);

			$this->data['student'] = $this->student_m->get_single_student($array2);


			$array3 = array('instituteID' => $this->session->userdata('instituteID'));

			$this->data['fee_fine'] = $this->fee_fine_m->get_fee_fine_by_where($array3);



			$this->data['title']      = 'Viewe Invoice';

			$this->data['subview']    = 'finance/fees/fee_invoice_view';

			$this->data['script']     = 'finance/fees/fee_js';

			$this->data['app_script'] = 'general.js';

			$this->data['li1']        = 'finance';

			$this->data['a1']         = 'finance';

			$this->data['div1']       = 'finance';

			$this->data['li2']        = 'fee';

			$this->data['a2']         = 'fee';

			$this->data['div2']       = 'fee';

			$this->data['li3']        = 'fee_invoice';

			$this->load->view('main_layout',$this->data);

		

	}

	//--------------------------------- Pay Amount -------------------------//

	function payamount(){



		$today      = date('Y-m-d');

		$id         = $this->input->post('id');

		$pay_money  = $this->input->post('payamnt');



		$array1 = array( 'fee_allocationID' => $id );



		$getfee = $this->fee_allocation_m->get_fee_allocation_single($array1);

		$total  = $pay_money + $getfee->pay_money;



		$array2 = array();

		array_push($array2, array($today => $pay_money));





		$array3 = array( 

			'pay_money'   => $total,

			'pay_details' => serialize($array2 )

		);



		if (($getfee->pay_details) == '') {

			

			$this->fee_allocation_m->update_fee_allocation($array3,$id);

			$this->session->set_flashdata('result', 'payment_success');

			redirect('fees/view/'.base64_encode($id*169));

		}else{



			$pay_details = unserialize($getfee->pay_details);

			array_push($pay_details, array($today=>$pay_money));



			$array4 = array(

				'pay_money'   => $total,

				'pay_details' => serialize($pay_details) 

			);



			$this->fee_allocation_m->update_fee_allocation($array4,$id);

			$this->session->set_flashdata('result', 'payment_success');

			redirect('fees/view/'.base64_encode($id*169));

		}

	}



	function editinvoice($id) {



		$array = array('fee_allocationID' => base64_decode($id)/169);

		$this->data['fee']    = $this->fee_allocation_m->get_fee_allocation_single($array);



		$array2 = array('studentID' => $this->data['fee']->studentID);

		$this->data['student'] = $this->student_m->get_single_student($array2);



		$array3 = array(

			'instituteID' => $this->session->userdata('instituteID'),

			'type'=>'concession'

		);

		$this->data['concession'] = $this->fee_list_m->get_order_by_fee($array3);



		

		$this->data['title']      = 'Edit Invoice';

		$this->data['subview']    = 'finance/fees/invoice_edit';

		$this->data['script']     = 'finance/fees/fee_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'finance';

		$this->data['a1']         = 'finance';

		$this->data['div1']       = 'finance';

		$this->data['li2']        = 'fee';

		$this->data['a2']         = 'fee';

		$this->data['div2']       = 'fee';

		$this->data['li3']        = 'fee_invoice';

		$this->load->view('main_layout',$this->data);

	}



	function updateinvoice(){



		if ($_POST) {



			$fee_listID    = $this->input->post('fee_listID');

			$fee_typeValue = $this->input->post('fee_typeValue');



			$fee_value     = serialize(array_combine($fee_listID, $fee_typeValue));

			

			$total = 0;

			for($i=0; $i<count($fee_typeValue); $i++){

				if($fee_typeValue[$i])

					$total += $fee_typeValue[$i];

			}

			

			$id = $this->input->post('id');

			$studentID = $this->input->post('studentID');

			

			$array = array(

				'concession_type' =>$this->input->post('concession_type'),

				'total'           =>$total,

				'fee_value'       =>$fee_value

			);



			$this->fee_allocation_m->update_fee_allocation($array,$id);

			$this->session->set_flashdata('result', 'invoice_updated');

			redirect('fees/editinvoice/'.base64_encode($id*169));

		}



		

	}



	function deletefeealloc($id=NULL) {



		$fee_allocationID = $this->input->post('param');



		$this->fee_allocation_m->deleteFeeAlloc($fee_allocationID);

	}



	//----------------------------- Payment History-----------------------------//

	



	function paymenthistory(){



		if ($_POST) {

			

			$array = array(

				'instituteID'=> $this->session->userdata('instituteID'),

				'classesID'  => base64_decode($this->input->post('classesID')),

				'studentID'  => base64_decode($this->input->post('studentID')),

				'month'      => $this->input->post('month')

			);

			$this->data['student']    = $this->fee_allocation_m->get_fee_allocation_single($array);

			$this->data['number']     = 1;

		}else{

			$this->data['number']     = 0;

		}



		$class = array('instituteID'=>$this->session->userdata('instituteID'));

		$this->data['classes']    = $this->classes_m->get_order_by_classes($class);

		

		$this->data['title']      = 'Payment History';

		$this->data['subview']    = 'finance/fees/paymenthistory';

		$this->data['script']     = 'finance/fees/fee_js';

		$this->data['app_script'] = 'general.js';

		$this->data['li1']        = 'finance';

		$this->data['a1']         = 'finance';

		$this->data['div1']       = 'finance';

		$this->data['li2']        = 'fee';

		$this->data['a2']         = 'fee';

		$this->data['div2']       = 'fee';

		$this->data['li3']        = 'paymenthistory';

		$this->load->view('main_layout',$this->data);

	}

}