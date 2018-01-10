<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			
			redirect('signin');
		}
	}
	
	public function index() {
		$where = array(
			'instituteId'=>$this->session->userdata('instituteID')
		);
		
		$this->data['students'] = $this->student_m->get_order_by_student($where);
		$this->data['teachers'] = $this->teacher_m->get_order_by_teacher($where);
		$this->data['subjects'] = $this->subject_m->get_order_by_subject($where);
		$this->data['title'] = 'Dashboard';
		$this->data['li1'] = 'dashboard';
		$this->data['subview'] = 'dashboard/index';
		$this->data['script'] = 'dashboard/index_js';
		$this->load->view('main_layout',$this->data);
	}

	function signout() {
		$this->session->sess_destroy();
		redirect('signin');
	}


}