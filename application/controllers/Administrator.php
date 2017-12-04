<?php 

defined('BASEPATH') or exit('No direct scripting allowed');

class Administrator extends MY_Controller {

	function __construct() {
		parent::__construct();
		if($this->mylibrary->isLoggedIn() == FALSE) {
			redirect('signin');
		}
	}

	function academic_year() {
		if(!$_POST) {
			$this->data['title'] = 'Student Attendance';
			$this->data['subview'] = 'administrator/academic_year';
			$this->data['script'] = '';
			$this->data['app_script'] = 'general.js';
			$this->data['li1'] = 'administrator';
			$this->data['a1'] = 'administrator';
			$this->data['div1'] = 'administrator';
			$this->data['li2'] = 'academic_year';
			$this->load->view('main_layout', $this->data);
		}
		else {
			$array = array(
				'instituteID'=>$this->session->userdata('instituteID'),
				'name'=>$this->input->post('name'),
				'start'=>$this->input->post('start'),
				'end'=>$this->input->post('end')
			);

			$aca = $this->academic_year_m->get_academic_year_single($array);
			if(!$aca)
				$this->academic_year_m->insert_academic_year($array);	
			redirect('administrator/academic_year');
		}	
	}

	function ay_dest() {
		$academic_yearID =  $this->input->post('param');
		$instituteID = $this->session->userdata('instituteID');
		$institute = $this->institute_m->get_institute_single(array('instituteID'=>$instituteID));
		$academic_yearID_active = $institute->academic_yearID;
		if($academic_yearID == $academic_yearID_active)
			echo "active";
		else
			$this->academic_year_m->delete_academic_year($academic_yearID);
	}
	
}