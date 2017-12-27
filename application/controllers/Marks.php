<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class Marks extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	
	function index() {
		$where = array('instituteID'=>$this->session->userdata('instituteID'));
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['students'] = $this->student_m->get_order_by_student($where);
		$this->data['title'] = 'Marks';
		$this->data['subview'] = 'marks/mark';
		$this->data['script'] = 'marks/marks_js';
		$this->data['app_script'] = 'general.js';
		$this->data['li1'] = 'marks';
		$this->data['a1'] = 'marks';
		$this->data['div1'] = 'marks';
		$this->data['li2'] = 'mark';
		$this->load->view('main_layout', $this->data);
	}


}