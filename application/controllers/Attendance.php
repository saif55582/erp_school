<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Attendance extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	function rulesAdd() {
		
	}

	function student() {
		$this->data['title'] = 'Student Attendance';
		$this->data['subview'] = 'attendance/student';
		$this->data['script'] = 'attendance/attendance_js';
		$this->data['active'] = 'attendance';
		$this->data['subactive'] = 'attendance_stud';
		$this->load->view('main_layout', $this->data);

	}

	function student_add() {
		$where = array(
			'instituteID'=>$this->session->userdata('instituteID')
		);
		$this->data['classes'] = $this->classes_m->get_order_by_classes($where);
		$this->data['title'] = 'Add Student Attendance';
		$this->data['subview'] = 'attendance/student_add';
		$this->data['script'] = 'attendance/attendance_js';
		$this->data['app_script'] = 'general.js';
		$this->data['active'] = 'attendance';
		$this->data['subactive'] = 'attendance_stud';
		$this->load->view('main_layout', $this->data);
	}


}