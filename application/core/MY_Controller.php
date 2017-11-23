<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();

	public function __construct() {

		parent::__construct();
		$this->load->model('institute_details_m');
		$this->load->model('signin_m');
		$this->load->model('setting_m');
		$this->load->model('classes_m');
		$this->load->model('teacher_m');
		$this->load->model('section_m');
		$this->load->model('institute_m');
		$this->load->model('admin_m');
		$this->load->model('student_m');
		$this->load->model('attendance_stud_m');

		// $result  = $this->institute_details_m->get();
		// $institute_details = array();
		// foreach($result as $row):
		//  	$institute_details[$row->feild_name] = $row->feild_value;
		// endforeach;
		// print_r($institute_details)
		// $this->data['institute_details'] = $institute_details;

		$this->data = array(
			'active'=>'',
			'app_script'=>'',
			'subactive'=>'',
			'li1'=>'',	
			'a1'=>'',
			'div1'=>'',
			'li2'=>'',
			'a2'=>'',
			'div2'=>'',
			'li3'=>''
		);
		
	}

	function not_found() {
		$this->data['title'] = 'Not Found';
		$this->data['active'] = ' ';
		$this->data['subview'] = 'not_found';
		$this->load->view('main_layout', $this->data);
	}



}

