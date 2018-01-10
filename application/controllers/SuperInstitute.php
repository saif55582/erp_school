<?php

defined('BASEPATH') or exit('No direct scripting allowed');

class Superinstitute extends My_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->mylibrary->isLoggedInSuper()){
			redirect('admin');
		}
	}

	function index() {

		$sql = "select institute.*, count(student.studentID) as students from institute LEFT JOIN student on institute.instituteID=student.instituteID group by student.instituteID";
		$this->data['institutes'] = $this->db->query($sql)->result();
		$this->data['title'] = 'Admin Dashboard';
		$this->data['li1'] = 'institute';
		$this->data['subview'] = 'superadmin/institute/institute';
		$this->data['script'] = 'superadmin/institute/institute_js';
		$this->data['app_script'] = 'general.js';
		$this->load->view('superadmin/main_layout',$this->data);
	}

	function view($id) {

		$instituteID = base64_decode($id)/786786;
		$this->data['institute'] = $this->institute_m->get_institute($instituteID);
		$this->data['admin'] =  $this->admin_m->get_admin_where(array('instituteID'=>$instituteID));
		$this->data['title'] = 'Institute Profile';
		$this->data['li1'] = 'institute';
		$this->data['subview'] = 'superadmin/institute/institute_view';
		$this->data['script'] = 'superadmin/institute/institute_js';
		$this->data['app_script'] = 'general.js';
		$this->load->view('superadmin/main_layout',$this->data);

	}

	function status () {
		$active = $this->input->post('active');
		$instituteID = base64_decode($this->input->post('hash'));
		$array = array(
			'active' => $active
		);
		$success =  $this->institute_m->updateInstitute($array, $instituteID);
		if($success)
			echo 1;
		else
			echo 0;
	}
}