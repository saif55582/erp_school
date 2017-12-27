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
				redirect('fees');
			}else{

				$array = array(

					'fee_type' =>$this->input->post('fee_type'),
					'note' =>$this->input->post('note'),
				);
				$this->fee_list_m->update_list($array,$fee_listID);
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

	function balance(){

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

	function invoice(){

		if($_POST){

			$array = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'classesID'=>base64_decode($this->input->post('classesID')),
				'studentID'=>base64_decode($this->input->post('studentID')),
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

			foreach($students as $student) {
				$array = array(
					'instituteID' => $this->session->userdata('instituteID'),
					'classesID'   => base64_decode($this->input->post('classesID')),
					'month'       => $this->input->post('month'),
					'studentID'	  => $student->studentID
				);

				$row = $this->fee_allocation_m->get_fee_allocation_by_where($array);
				$invoice += count($row);
			}

			if(! $invoice){

				foreach($students as $student) {
					$array = array(
						'instituteID'    => $instituteID,
						'academic_yearID'=> $institute->academic_yearID,
						'classesID'      => base64_decode($this->input->post('classesID')),
						'studentID'		 => $student->studentID,
						'concession_type'=> $this->input->post('concession_type'),
						'month'          => $this->input->post('month'),
						'fee_value'      => $fee_value,
						'total'          => $total
					);
					$this->fee_allocation_m->allocate_fee_insert($array);

				}
			}
			
			redirect('fees/invoice');
		}
		else{
			$invoice = 0;
			$array = array(
				'instituteID' => $this->session->userdata('instituteID'),
				'classesID'   => base64_decode($this->input->post('classesID')),
				'studentID'		 => base64_decode($this->input->post('studentID')),
				'month'       => $this->input->post('month')
			);
			$row = $this->fee_allocation_m->get_fee_allocation_by_where($array);
			$invoice += count($row);
			
			if(! $invoice){

				$array = array(
					'instituteID'    => $instituteID,
					'academic_yearID'=> $institute->academic_yearID,
					'classesID'      => base64_decode($this->input->post('classesID')),
					'studentID'		 => base64_decode($this->input->post('studentID')),
					'concession_type'=> $this->input->post('concession_type'),
					'month'          => $this->input->post('month'),
					'fee_value'      => $fee_value,
					'total'          => $total
				);
				$this->fee_allocation_m->allocate_fee_insert($array);
			}
			redirect('fees/invoice');				
		}
	}

	function view($id){

			$array = array('fee_allocationID' => base64_decode($id)/169);
			$this->data['fee']    = $this->fee_allocation_m->get_fee_allocation_single($array);

			$array2 = array('studentID' => $this->data['fee']->studentID);
			$this->data['student'] = $this->student_m->get_single_student($array2);

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

	function payamount(){

		$id = $this->input->post('id');

		$array = array(
			'pay_money' =>$this->input->post('payamnt')
		);
		$this->fee_allocation_m->update_fee_allocation($array,$id);
		redirect('fees/view/'.base64_encode($id*169));
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

			redirect('fees/editinvoice/'.base64_encode($id*169));
		}

		
	}
	
}