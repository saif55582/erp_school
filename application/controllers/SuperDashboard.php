<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class SuperDashboard extends My_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedInSuper() == FALSE) {
			redirect('admin');
		}
	}

	function index() {

		$this->data['institutes'] = $this->institute_m->get_institute_by();
		$this->data['students'] = $this->student_m->get_order_by_student();
		$this->data['teachers'] = $this->teacher_m->get_order_by_teacher();
		$this->data['title'] = 'Admin Dashboard';
		$this->data['li1'] = 'dashboard';
		$this->data['subview'] = 'superadmin/dashboard/index';
		$this->data['script'] = 'superadmin/dashboard/index_js';
		$this->data['app_js'] = 'general.js';
		$this->load->view('superadmin/main_layout',$this->data);
	}

}